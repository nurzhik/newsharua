<?php

class TeamsController extends AppController{
	public $uses = array('Category', 'Team');
	public function admin_index(){
		$this->Team->locale = array('en', 'kz');
		$this->Team->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Team->find('all', array(
			'order' => array('id' => 'desc')
		));
		
		$this->set(compact('data'));
	}

	public function admin_add(){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Team->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Team->locale = 'en';
		}else{
			$this->Team->locale = 'ru';
		}
	
		if($this->request->is('post')){
			$this->Team->create();

			
			$data = $this->request->data['Team'];
			if(!$data['img']['name']){
			 	unset($data['img']);
			}
		
			
			if($this->Team->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		$this->set(compact('id'));
	}
	public function admin_edit($id){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Team->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Team->locale = 'en';
		}else{
			$this->Team->locale = 'ru';
		}
		
		if(is_null($id) || !(int)$id || !$this->Team->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Team->findById($id);
		
		if($this->request->is(array('post', 'put'))){
			$this->Team->id = $id;
			$data1 = $this->request->data['Team'];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
		
			if($this->Team->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			
			$this->set(compact('id', 'data'));
		}
	}

	public function admin_delete($id){
		if (!$this->Team->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Team->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	

	
}