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
		$this->OfficeType->recursive = 0;
		$this->set('officeTypes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->OfficeType->id = $id;
		if (!$this->OfficeType->exists()) {
			throw new NotFoundException(__('Invalid office type'));
		}
		$this->set('officeType', $this->OfficeType->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OfficeType->create();
			if ($this->OfficeType->save($this->request->data)) {
				$this->Session->setFlash(__('The office type has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The office type could not be saved. Please, try again.'),'crud/error');
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
		$this->OfficeType->id = $id;
		if (!$this->OfficeType->exists()) {
			throw new NotFoundException(__('Invalid office type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OfficeType->save($this->request->data)) {
				$this->Session->setFlash(__('The office type has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The office type could not be saved. Please, try again.'),'crud/error');
			}
		} else {
			$this->request->data = $this->OfficeType->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->OfficeType->id = $id;
		if (!$this->OfficeType->exists()) {
			throw new NotFoundException(__('Invalid office type'));
		}
		if ($this->OfficeType->delete()) {
			$this->Session->setFlash(__('Office type deleted'),'crud/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Office type was not deleted'),'crud/error');
		$this->redirect(array('action' => 'index'));
	}
}
