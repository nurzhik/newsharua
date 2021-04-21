<?php

class CitiesController extends AppController{
	public $uses = array('Category', 'City');
	public function admin_index(){

		$data = $this->City->find('all', array(
			'order' => array('id' => 'desc')
		));
		
		$this->set(compact('data'));
	}

	public function admin_add(){
		
		if($this->request->is('post')){
			$this->City->create();

			
			$data = $this->request->data['City'];
		
			$data['title_ru'] = json_encode($data,JSON_FORCE_OBJECT);;
			if($this->City->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		// $data1 = $this->City->find('all');
	
		// foreach ($data1 as $key => $value ) {
		// 	$data1[$key]['City']['title_ru'] = json_decode($value['City']['title_ru'],true );;
		// }
		//debug($data1);die;
		//$data['City']['title_ru']= $peoples;
		
		$this->set(compact('id','data1'));
	}
	public function admin_edit($id){
	
		
		if(is_null($id) || !(int)$id || !$this->City->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->City->findById($id);
		
		if($this->request->is(array('post', 'put'))){
			$this->City->id = $id;
			$data1 = $this->request->data['City'];
			
			
			if($this->City->save($data1)){
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
		if (!$this->City->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->City->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	

	
}