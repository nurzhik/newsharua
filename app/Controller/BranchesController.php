<?php

class BranchesController extends AppController{
	public $uses = array('Category', 'Branche','City');
	public function admin_index(){

		$data = $this->Branche->find('all', array(
			'order' => array('id' => 'desc')
		));
		
		$this->set(compact('data'));
	}

	public function admin_add(){
		$cities = $this->City->find('all');
		if($this->request->is('post')){
			$this->Branche->create();

			
			$data = $this->request->data['Branche'];
			//debug($data);die;
			$data['managers'] = json_encode($data['managers'],JSON_FORCE_OBJECT);;
			if($this->Branche->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		// $data1 = $this->Branche->find('all');
	
		// foreach ($data1 as $key => $value ) {
		// 	$data1[$key]['Branche']['title_ru'] = json_decode($value['Branche']['title_ru'],true );;
		// }
		//debug($data1);die;
		//$data['Branche']['title_ru']= $peoples;
		
		$this->set(compact('id','cities'));
	}
	public function admin_edit($id){
		
		
		if(is_null($id) || !(int)$id || !$this->Branche->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$cities = $this->City->find('all');
		$data = $this->Branche->find('first', array(
			'conditions' => array('Branche.id' => $id),
			'recursive' => -1,
		));
		
		if($this->request->is(array('post', 'put'))){
			$this->Branche->id = $id;
			$data1 = $this->request->data['Branche'];
			$data1['managers'] = json_encode($data1['managers'],JSON_FORCE_OBJECT);;
			
			if($this->Branche->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
		
				$data['Branche']['managers'] = json_decode($data['Branche']['managers'],true );;
			// debug($data);die;
			$this->set(compact('id', 'data','cities'));
		}
	}

	public function admin_delete($id){
		if (!$this->Branche->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Branche->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	

	
}