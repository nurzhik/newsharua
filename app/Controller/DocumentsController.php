<?php

class DocumentsController extends AppController{
	public $uses = array('Document', 'Category');
	public function admin_index(){
		
		$data = $this->Document->find('all', array(
			'order' => array('id' => 'desc')
		));
		
		$this->set(compact('data'));
	}

	public function admin_add(){
		$categories = $this->Category->find('all');
		if($this->request->is('post')){
			$this->Document->create();

			$data = $this->request->data['Document'];

			if(!$data['file_ru']['name']){
			 	unset($data['file_ru']);
			}
			if(!$data['file_kz']['name']){
			 	unset($data['file_kz']);
			}
			if($this->Document->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}

		$this->set(compact('id','categories'));
	}
	public function admin_edit($id){
		
		if(is_null($id) || !(int)$id || !$this->Document->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Document->findById($id);
		$categories = $this->Category->find('all');
		if($this->request->is(array('post', 'put'))){
			$this->Document->id = $id;
			$data1 = $this->request->data['Document'];
			if(empty($data1['file_ru']['name']) || !$data1['file_ru']['name']){
				unset($data1['file_ru']);
			}
			if(empty($data1['file_kz']['name']) || !$data1['file_kz']['name']){
				unset($data1['file_kz']);
			}
		
			if($this->Document->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			
			$this->set(compact('id', 'data','categories'));
		}
	}

	public function admin_delete($id){
		if (!$this->Document->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Document->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index() {
		$data = $this->Document->find('all', array(
			'order' => array('id' => 'desc')
		));
		
		$this->set(compact('data'));
	}
	
}