<?php 

class Vacancy extends AppModel{
	public $actsAs = array(
		'Translate' => array(
			'title',
			'body',
			'terms',
		 )
	);
	
}