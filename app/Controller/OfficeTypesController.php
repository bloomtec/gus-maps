<?php
App::uses('AppController', 'Controller');
/**
 * OfficeTypes Controller
 *
 * @property OfficeType $OfficeType
 */
class OfficeTypesController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> OfficeType -> recursive = 0;
		$this -> set('officeTypes', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> OfficeType -> id = $id;
		if (!$this -> OfficeType -> exists()) {
			throw new NotFoundException(__('Tipo de oficina no válido'));
		}
		$this -> set('officeType', $this -> OfficeType -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			if (!empty($this -> request -> data['OfficeType']['icono_image']['name']) && !$this -> request -> data['OfficeType']['icono_image']['error']) {
				$now = new DateTime('now');
				$filename = $now -> format('Y-m-d_H-i-s') . '_' . str_replace(' ', '_', $this -> request -> data['OfficeType']['icono_image']['name']);
				if ($this -> uploadFile($this -> request -> data['OfficeType']['icono_image']['tmp_name'], $filename)) {
					$this -> request -> data['OfficeType']['icono_image'] = 'img' . DS . 'uploads' . DS . $filename;
				}
			}
			$this -> OfficeType -> create();
			if ($this -> OfficeType -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se guardó el tipo de oficina'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el tipo de oficina. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
	}
	
	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> OfficeType -> id = $id;
		if (!$this -> OfficeType -> exists()) {
			throw new NotFoundException(__('Tipo de oficina no válido'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if (!empty($this -> request -> data['OfficeType']['icono_image']['name']) && !$this -> request -> data['OfficeType']['icono_image']['error']) {
				$now = new DateTime('now');
				$filename = $now -> format('Y-m-d_H-i-s') . '_' . str_replace(' ', '_', $this -> request -> data['OfficeType']['icono_image']['name']);
				if ($this -> uploadFile($this -> request -> data['OfficeType']['icono_image']['tmp_name'], $filename)) {
					$this -> request -> data['OfficeType']['icono_image'] = 'img' . DS . 'uploads' . DS . $filename;
				}
			}
			$this -> OfficeType -> create();
			if ($this -> OfficeType -> save($this -> request -> data)) {
				//debug($this -> request -> data);
				$this -> Session -> setFlash(__('Se guardó el tipo de oficina'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el tipo de oficina. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> OfficeType -> read(null, $id);
		}
	}
	
	private function uploadFile($tmp_name = null, $filename = null) {
		$this -> cleanupFiles();
		if ($tmp_name && $filename) {
			$url = 'img' . DS .'uploads' . DS . DS . $filename;
			return move_uploaded_file($tmp_name, $url);
		}
	}

	private function cleanupFiles() {
		$officeTypes = $this -> OfficeType -> find('all', array('recursive' => -1));
		$db_files = array();
		foreach ($officeTypes as $key => $officeType) {
			$db_files[] = $officeType['OfficeType']['icono_image'];
		}
		$dir_files = array();
		$dir_path = APP . 'webroot' . DS . 'img' . DS . 'uploads';
		if ($handle = opendir($dir_path)) {
			while (false !== ($entry = readdir($handle))) {
				if ($entry != 'empty' && is_file($dir_path . DS . $entry))
					$dir_files[] = 'img'. DS . 'uploads' . DS . $entry;
			}
			closedir($handle);
		}
		foreach ($dir_files as $file) {
			if (!in_array($file, $db_files)) {
				$file = explode(DS, $file);
				$file = $file[count($file) - 1];
				$tmp_file_path = $dir_path . DS . $file;
				unlink($tmp_file_path);
			}
		}
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
		$this -> OfficeType -> id = $id;
		if (!$this -> OfficeType -> exists()) {
			throw new NotFoundException(__('Tipo de oficina no válido'));
		}
		if ($this -> OfficeType -> delete()) {
			$this -> Session -> setFlash(__('Tipo de oficina eliminada'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('No se eliminó el tipo de oficina'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

}
