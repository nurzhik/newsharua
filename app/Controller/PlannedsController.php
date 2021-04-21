<?php

class PlannedsController extends AppController{
	public function admin_index(){
		$data = $this->Planned->find('all', array(
			'order' => array('Planned.id' => 'desc')
		));
		$this->set(compact('data'));
	}

	public function admin_add(){
		$users = $this->User->find('all',array(
			'conditions' => array('User.role' =>'user'),
		));
		$planned =$this->Planned->find('first',array(
			'order' => array('Planned.id' =>'desc'),
			'recursive' => -1,
		));

		if($this->request->is('post')){
			$this->Planned->create();
			$data = $this->request->data['Planned'];
			if($this->Planned->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		if(!$this->request->data){
			
			$this->set(compact('id', 'users'));
		}
	}
	public function admin_edit($id){
		
		if(is_null($id) || !(int)$id || !$this->Planned->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Planned->findById($id);
	
		if($this->request->is(array('post', 'put'))){
			$this->Planned->id = $id;
			$data1 = $this->request->data['Planned'];
		
			if($this->Planned->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$users = $this->User->find('all',array(
				'conditions' => array('User.role' =>'user'),
			));
			$this->set(compact('id', 'data','users'));
		}
	}
	public function admin_change($id){
		
		if(is_null($id) || !(int)$id || !$this->Planned->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Planned->findById($id);
	
		if($this->request->is(array('post', 'put'))){
			$this->Planned->id = $id;
			$q = "INSERT INTO change_planneds (user_id,date,entrance,initial,remainder,year,price,title,status,created) VALUES ('".$data['Planned']['user_id']."' ,  '".$data['Planned']['date']."',  '".$data['Planned']['entrance']."',  '".$data['Planned']['initial']."',  '".$data['Planned']['remainder']."',  '".$data['Planned']['year']."',  '".$data['Planned']['price']."',  '".$data['Planned']['title']."',  '".$data['Planned']['status']."',CURRENT_TIMESTAMP)";
			$this->Planned->query($q);
			$data1 = $this->request->data['Planned'];
			
			if($this->Planned->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$users = $this->User->find('all',array(
				'conditions' => array('User.role' =>'user'),
			));
			$this->set(compact('id', 'data','users'));
		}
	}
	public function admin_extradition() {
			$this->autoRender = false;

			if($this->request->is(array('post', 'put'))){
				$id = $this->request->data['Extradition']['planned_id'];
				$planned = $this->Planned->find('first',array(
					'conditions' => array('Planned.id' =>$id),
				));
				$q = "INSERT INTO extradition_planneds (user_id,date,entrance,initial,remainder,year,price,title,status,created) VALUES ('".$planned['Planned']['user_id']."' ,  '".$planned['Planned']['date']."',  '".$planned['Planned']['entrance']."',  '".$planned['Planned']['initial']."',  '".$planned['Planned']['remainder']."',  '".$planned['Planned']['year']."',  '".$planned['Planned']['price']."',  '".$planned['Planned']['title']."',  '".$planned['Planned']['status']."',CURRENT_TIMESTAMP)";
				//$this->Planned->query($q);
				
				
			
				$this->Planned->query($q);

					$this->Planned->delete($id);
					$planneds =  $this->Planned->find('all',array(
						'recursive' => -1,
					));
					$i= 1;
					foreach ($planneds as $item) {
						$id = $item['Planned']['id'];
						$update = $this->Planned->query("UPDATE planneds SET order_num='{$i}' WHERE id='{$id}'");
						$i++;
						# code...
					}
					$this->Session->setFlash('Сохранено', 'default', array(), 'good');
					return $this->redirect('/admin/planneds');
				
			}
	}

	public function admin_delete($id){
		if (!$this->Planned->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Planned->delete($id)){

			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		$this->Planned->locale = Configure::read('Config.language');
		$title_for_layout = 'Новости';
		$order = array('Planned.date DESC');
		$paginator = array();
		$paginator['per_page'] = 9;
		$paginator['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
		$paginator['offset'] = ($paginator['current_page'] * $paginator['per_page']) - $paginator['per_page'];
		$paginator['link'] = (isset($_GET['cat'])) ? '?cat='.(int)$_GET['cat'].'&page=' : '?page=';
		$paginator['count'] = $this->Planned->find('count') - 1;
		$paginator['count_pages'] = ceil($paginator['count'] / $paginator['per_page']);
		$paginator['start'] = '';
		$paginator['end'] = '';
		$paginator['prev'] = '';
		$paginator['next'] = '';


		if($paginator['current_page'] != 1 && $paginator['current_page'] != 2) {
			$paginator['start'] = 1;
		}
		if($paginator['current_page'] != 1 ) {
			$paginator['prev'] = $paginator['current_page'] - 1;
		}
		if($paginator['current_page'] != $paginator['count_pages'] ) {
			$paginator['next'] = $paginator['current_page'] + 1;
		}
		if($paginator['current_page'] != $paginator['count_pages'] && $paginator['current_page'] != $paginator['count_pages']-1) {
			$paginator['end'] = $paginator['count_pages'];
		}
		$data = $this->Planned->find('all', array(
			'conditions' => array('Planned.type ' => 'planned'),
			'order' => array('Planned.date DESC, Planned.id DESC'),
			'offset' => $paginator['offset'],
			'limit' => $paginator['per_page'],
		));
		$this->set(compact('data', 'title_for_layout','paginator'));
	}
	

	public function view($id){
		$this->Planned->locale = Configure::read('Config.language');
		$data = $this->Planned->findById($id);
	
		if(!$data){
			throw new NotFoundException('Такой страницы нет...');
		}

		$other_planned = $this->Planned->find('all', array(
			'conditions' => array(array('Planned.type' => $data['Planned']['type']),array('Planned.id !=' => $id)),
			'order' => array('Planned.date' => 'desc'),
			'limit' => 6,
		));
		$title_for_layout = $data['Planned']['title'];
		$meta['keywords'] = $data['Planned']['keywords'];
		$meta['description'] = $data['Planned']['description'];

		$this->set(compact('data', 'title_for_layout', 'other_planned', 'meta'));
	}

	public function request() {
		$this->autoRender = false;

		if($this->request->is(array('post', 'put'))){
			$data = $this->request->data['PlannedRequest'];
			//debug($data);die;
			$q = "INSERT INTO request_planneds (fio,phone,iin,planned_id,planned,price,created) VALUES ('".$data['fio']."' ,  '".$data['phone']."',  '".$data['iin']."',  '".$data['planned_id']."', '".$data['planned']."', '".$data['price']."',CURRENT_TIMESTAMP)";
		
			$this->Planned->query($q);
			$this->Session->setFlash('Заявка успешно отправлено', 'default', array(), 'good');
			return $this->redirect($this->referer());
			
		}
	}
}