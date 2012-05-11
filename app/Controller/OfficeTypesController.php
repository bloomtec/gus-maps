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
			if ($this -> OfficeType -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se guardó el tipo de oficina'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el tipo de oficina. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> OfficeType -> read(null, $id);
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
