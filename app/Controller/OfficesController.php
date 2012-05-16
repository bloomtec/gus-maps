<?php
App::uses('AppController', 'Controller');
/**
 * Offices Controller
 *
 * @property Office $Office
 */
class OfficesController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> Office -> recursive = 0;
		$this -> set('offices', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> layout = "mapas";
		$this -> Office -> id = $id;
		if (!$this -> Office -> exists()) {
			throw new NotFoundException(__('Oficina no válida'));
		}
		$this -> set('office', $this -> Office -> read(null, $id));
	}
	
	public function csvUpload() {
		if($this -> request -> is('post')) {
			if(isset($this -> request -> data['Office']['csv']['error']) && $this -> request -> data['Office']['csv']['error'] > 0) {
				$this -> Session -> setFlash('Ha ocurrido un error con la subida del archivo. Por favor, intente de nuevo.');
				$this -> redirect(array('action' => 'add'));
			} else {
				if($this -> request -> data['Office']['csv']['type'] != 'text/csv') {
					$this -> Session -> setFlash('El archivo que ha subido no es formato CSV. Por favor, intente de nuevo.');
					$this -> redirect(array('action' => 'add'));
				} else {
					$message = $this -> csvFileRead($this -> request -> data['Office']['csv']['tmp_name']);
					$this -> Session -> setFlash($message['message'], $message['crud']);
					if($message['crud'] == 'crud/success') {
						$this -> redirect(array('action' => 'index'));
					} else {
						$this -> redirect(array('action' => 'add'));
					}
				}
			}
		} else {
			$this -> redirect(array('action' => 'index'));
		}
	}
	
	private function csvFileRead($path = null) {
		App::uses('File', 'Utility');
		$message = array();
		if($path) {
			$file = new File($path, false, 0644);
			$data = null;
			if ($file -> exists() && $file -> readable()) {
				$data = $file -> read();
			}
			$file -> close();
			$registroCreado = false;
			if ($data) {
				$data = explode(chr(10), $data);
				$tmpData = array();
				foreach($data as $key => $value) {
					if(!empty($value)) $tmpData[] = $value;
				}
				$data = $tmpData;
				$delimiter = ',';
				$headers = explode($delimiter, $data[0]);
				unset($data[0]);
				foreach($data as $key => $value) {
					$datosOficina = explode($delimiter, $value);
					$oficina = array('Office' => array());
					for($i = 0; $i < count($headers); $i+=1) {
						$oficina['Office'][$headers[$i]] = $datosOficina[$i];
					}
					$this -> Office -> create();
					if(!$this -> Office -> save($oficina)) {
						$tmpError = $this -> Office -> invalidFields();
						$errorMessage = '<p>Para la oficina "' . $oficina['Office']['nombre'] . '" ocurrio lo siguiente:</p>';
						foreach ($tmpError as $field => $error) {
							$errorMessage .= '<p>' . $field . ' > ' . $error[0] . '</p>';
						}
						$message['message'] = '<p>Error al tratar de crear un registro</p>' . '<p><< Información del error >></p><p>' . $errorMessage . '</p>';
						$message['crud'] = 'crud/error';
						return $message;
					} else {
						$registroCreado = true;
					}
				}
			}
			if($registroCreado) {
				$message['message'] = 'Se registraron las oficinas.';
				$message['crud'] = 'crud/success';
			} else {
				$message['message'] = 'No se creó al menos una de las oficinas o no habia registros.';
				$message['crud'] = 'crud/error';
			}
			return $message;
		}
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		$this -> layout = "mapas";
		if ($this -> request -> is('post')) {
			$this -> Office -> create();
			$this -> request -> data['Office']['page_created'] = true;
			if ($this -> Office -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se guardó la oficina'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar la oficina. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
		$officeTypes = $this -> Office -> OfficeType -> find('list');
		$cities = $this -> Office -> City -> find('list');
		$this -> set(compact('officeTypes', 'cities'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> layout = "mapas";
		$this -> Office -> id = $id;
		if (!$this -> Office -> exists()) {
			throw new NotFoundException(__('Oficina no válida'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Office -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se guardó la oficina'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar la oficina. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Office -> read(null, $id);
		}
		$officeTypes = $this -> Office -> OfficeType -> find('list');
		$cities = $this -> Office -> City -> find('list');
		$this -> set(compact('officeTypes', 'cities'));
	}

	/**
	 * delete method
	 *
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		if (!$this -> request -> is('post')) {
			throw new MethodNotAllowedException();
		}
		$this -> Office -> id = $id;
		if (!$this -> Office -> exists()) {
			throw new NotFoundException(__('Oficina no válida'));
		}
		if ($this -> Office -> delete()) {
			$this -> Session -> setFlash(__('Oficina eliminada'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('No se eliminó la oficina'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

}
