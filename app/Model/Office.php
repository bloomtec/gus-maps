<?php
App::uses('AppModel', 'Model');
/**
 * Office Model
 *
 * @property OfficeType $OfficeType
 * @property City $City
 */
class Office extends AppModel {
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
		'latitud' => array(
			'validarLatitudNoVacia' => array(
				'rule' => array('validarLatitudNoVacia'),
				'message' => 'Debe ingresar la latitud',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'decimal' => array(
				'rule' => array('decimal'),
				'message' => 'El valor debe ser númerico y contener al menos un decimal (por ejemplo: 75.0)',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'longitud' => array(
			'validarLongitudNoVacia' => array(
				'rule' => array('validarLongitudNoVacia'),
				'message' => 'Debe ingresar la longitud',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'decimal' => array(
				'rule' => array('decimal'),
				'message' => 'El valor debe ser númerico y contener al menos un decimal (por ejemplo: 75.0)',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	public function validarLatitudNoVacia() {
		if(isset($this -> data['Office']['page_created']) && $this -> data['Office']['page_created']) {
			// Creado desde la página, requerir lat y lon
			$this -> data['Office']['latitud'] = trim($this -> data['Office']['latitud']);
			if(empty($this -> data['Office']['latitud'])) {
				return false;
			} else {
				return true;
			}
		} else {
			// Creado por CSV, no requerir lat ni lon
			return true;
		}
	}
	
	public function validarLongitudNoVacia() {
		if(isset($this -> data['Office']['page_created']) && $this -> data['Office']['page_created']) {
			// Creado desde la página, requerir lat y lon
			$this -> data['Office']['longitud'] = trim($this -> data['Office']['longitud']);
			if(empty($this -> data['Office']['longitud'])) {
				return false;
			} else {
				return true;
			}
		} else {
			// Creado por CSV, no requerir lat ni lon
			return true;
		}
	}

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'OfficeType' => array(
			'className' => 'OfficeType',
			'foreignKey' => 'office_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'City' => array(
			'className' => 'City',
			'foreignKey' => 'city_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
