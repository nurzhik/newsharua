<?php 

class Message extends AppModel{
	// public $actsAs = array(
	// 	'Translate' => array(
	// 		'title',
	// 		'description',
	// 		'advantage',	
	// 		'application',
	// 		'composition',
	// 		)
	// );
	

    public $belongsTo = array('User', 'Dialog'); 

	public $validate = array(
		'body' => array(
			'rule' => 'notEmpty',
			'message' => 'Введите текст'
		)
		
	);

	
}