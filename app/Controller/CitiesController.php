<?php
App::uses('AppController', 'Controller');
/**
 * Cities Controller
 *
 * @property City $City
 */
class CitiesController extends AppController {

	public function beforeFilter() {
		$this -> Auth -> allow('getCoordinates', 'getOffices');
	}

	public function getCoordinates($id = null) {
		if (!$id) {
			echo false;
			exit(0);
		}
		$this -> City -> recursive = -1;
		$city = $this -> City -> read(null, $id);
		$latLgn = array('lat' => $city['City']['latitud'], 'lng' => $city['City']['longitud']);
		echo json_encode($latLgn);
		exit(0);
	}

	public function getOffices($id = null, $officeTypeId = null) {
		$offices = null;
		if (!$id) {// decuelve las oficinas sin filtrar por ciudad
			if ($officeTypeId) {
				$offices = $this -> City -> Office -> find('all', array('conditions' => array('office_type_id' => $officeTypeId)));
			} else {
				$offices = $this -> City -> Office -> find('all');
			}
		} else {
			if ($officeTypeId) {
				$offices = $this -> City -> Office -> find('all', array('conditions' => array('city_id' => $id, 'office_type_id' => $officeTypeId)));
			} else {
				$offices = $this -> City -> Office -> find('all', array('conditions' => array('city_id' => $id)));
			}
		}
		echo json_encode($offices);
		exit(0);
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> City -> recursive = 0;
		$this -> set('cities', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> City -> id = $id;
		if (!$this -> City -> exists()) {
			throw new NotFoundException(__('Ciudad no válida'));
		}
		$this -> set('city', $this -> City -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		$this -> layout = "mapas";
		if ($this -> request -> is('post')) {
			$this -> City -> create();
			if ($this -> City -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se guardó la ciudad'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar la ciudad. Por favor, intente de nuevo.'), 'crud/error');
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
		$this -> layout = "mapas";
		$this -> City -> id = $id;
		if (!$this -> City -> exists()) {
			throw new NotFoundException(__('Ciudad no válida'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> City -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se guardó la ciudad'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar la ciudad. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> City -> read(null, $id);
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
		$this -> City -> id = $id;
		if (!$this -> City -> exists()) {
			throw new NotFoundException(__('Ciudad no válida'));
		}
		if ($this -> City -> delete()) {
			$this -> Session -> setFlash(__('Ciudad eliminada'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('No se eliminó la ciudad'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

}
