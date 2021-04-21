<?php 

class Branche extends AppModel{
	public $belongsTo   = array(
        'City' => array(
			'className' => 'City',
			'joinTable' => 'cities',
			'foreignKey' => 'city_id',
			'associationForeignKey' => 'id',
			'fields' => array('title_ru'),
			'offset'=>'2'
        ),
        
       
        
    );
}