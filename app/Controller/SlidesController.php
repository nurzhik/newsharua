<?php

class SlidesController extends AppController{
	public $uses = array('Category', 'Slide');
	public function admin_index(){
		$this->Slide->locale = array('en', 'kz');
		$this->Slide->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Slide->find('all', array(
			'order' => array('id' => 'desc')
		));
		
		$this->set(compact('data'));
	}

	public function admin_add(){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Slide->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Slide->locale = 'en';
		}else{
			$this->Slide->locale = 'ru';
		}
	
		if($this->request->is('post')){
			$this->Slide->create();

			
			$data = $this->request->data['Slide'];
			if(!$data['img']['name']){
			 	unset($data['img']);
			}
		
			
			if($this->Slide->save($data)){
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
			$this->Slide->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Slide->locale = 'en';
		}else{
			$this->Slide->locale = 'ru';
		}
		
		if(is_null($id) || !(int)$id || !$this->Slide->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Slide->findById($id);
		
		if($this->request->is(array('post', 'put'))){
			$this->Slide->id = $id;
			$data1 = $this->request->data['Slide'];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
		
			if($this->Slide->save($data1)){
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
		if (!$this->Slide->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Slide->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	

	
}