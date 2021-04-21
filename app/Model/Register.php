<?php

class Register extends AppModel {
    public $hasAndBelongsToMany  = array(
        'User' => array(
            'className' => 'User',
            'joinTable' => 'registers',
            'foreignKey' => 'id',
            'associationForeignKey' => 'client_id',
            
           //'unique' => true,
            //'conditions' => array('User.id' => 'client_id'),
            // 'fields' => '',
            // 'order' => '',
            // 'limit' => '1',
            // 'offset' => '-1',
            // 'finderQuery' => '',
            // 'with' => ''
        ),
        'Doc' => array(
            'className' => 'User',
            'joinTable' => 'registers',
            'foreignKey' => 'id',
            'associationForeignKey' => 'doctor_id',
            
           //'unique' => true,
            //'conditions' => array('User.id' => 'client_id'),
            // 'fields' => '',
            // 'order' => '',
            // 'limit' => '1',
            // 'offset' => '-1',
            // 'finderQuery' => '',
            // 'with' => ''
        )
        
    );
   
}