<?php
App::uses('AppModel', 'Model');
/**
 * OfficeType Model
 *
 * @property Office $Office
 */
class OfficeType extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nombre';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Debe ingresar un nombre',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'icono_image' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Debe ingresar una imagen de ícono',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'validarUpdate' => array(
				'rule' => array('validarUpdate'),
				//'message' => 'Debe ingresar una imagen de ícono',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'update', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	public function validarUpdate() {
		if(isset($this -> data['OfficeType']['icono_image']['error']) && $this -> data['OfficeType']['icono_image']['error'] > 0) {
			unset($this -> data['OfficeType']['icono_image']);
		}
		return true;
	}

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Office' => array(
			'className' => 'Office',
			'foreignKey' => 'office_type_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
