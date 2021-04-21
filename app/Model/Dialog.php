<?php 

class Dialog extends AppModel{

	public $hasMany = array('Message');
    public $belongsTo = array('User'); 

	public $validate = array(
		'body' => array(
			'rule' => 'notEmpty',
			'message' => 'Введите текст'
		)
		
	);

	
}