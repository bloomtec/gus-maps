<?php
App::uses('AppController', 'Controller');
/**
 * Roles Controller
 *
 * @property Role $Role
 */
class RolesController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> Role -> recursive = 0;
		$this -> set('roles', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> Role -> id = $id;
		if (!$this -> Role -> exists()) {
			throw new NotFoundException(__('Rol no válido'));
		}
		$this -> set('role', $this -> Role -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> Role -> create();
			if ($this -> Role -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se guardó el rol'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el rol. Por favor, intente de nuevo.'), 'crud/error');
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
		$this -> Role -> id = $id;
		if (!$this -> Role -> exists()) {
			throw new NotFoundException(__('Rol no válido'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Role -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se guardó el rol'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el rol. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Role -> read(null, $id);
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
		$this -> Role -> id = $id;
		if (!$this -> Role -> exists()) {
			throw new NotFoundException(__('Rol no válido'));
		}
		if ($this -> Role -> delete()) {
			$this -> Session -> setFlash(__('Se eliminó el rol'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('No se eliminó el rol'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this -> Role -> recursive = 0;
		$this -> set('roles', $this -> paginate());
	}

	/**
	 * admin_view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		$this -> Role -> id = $id;
		if (!$this -> Role -> exists()) {
			throw new NotFoundException(__('Rol no válido'));
		}
		$this -> set('role', $this -> Role -> read(null, $id));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this -> request -> is('post')) {
			$this -> Role -> create();
			if ($this -> Role -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se guardó el rol'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el rol. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
	}

	/**
	 * admin_edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		$this -> Role -> id = $id;
		if (!$this -> Role -> exists()) {
			throw new NotFoundException(__('Rol no válido'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Role -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se guardó el rol'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el rol. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Role -> read(null, $id);
		}
	}

	/**
	 * admin_delete method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null) {
		if (!$this -> request -> is('post')) {
			throw new MethodNotAllowedException();
		}
		$this -> Role -> id = $id;
		if (!$this -> Role -> exists()) {
			throw new NotFoundException(__('Rol no válido'));
		}
		if ($this -> Role -> delete()) {
			$this -> Session -> setFlash(__('Se eliminó el rol'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('No se eliminó el rol'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

}
