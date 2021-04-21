<?php 

class Result extends AppModel{
	
	public $belongsTo   = array(
        'User' => array(
			'className' => 'User',
			'joinTable' => 'users',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'id',
			'fields' => array('fio','iin'),
			'offset'=>'2'
        ),
         'Moderator' => array(
			'className' => 'User',
			'joinTable' => 'users',
			'foreignKey' => 'moderator_id',
			'associationForeignKey' => 'id',
			'fields' => array('fio','iin'),
			'offset'=>'2'
        ),
       
        
    );
	
}