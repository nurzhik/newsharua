<?php

class ActualsController extends AppController{
	public function admin_index(){
		$data = $this->Actual->find('all', array(
			'order' => array('Actual.id' => 'desc')
		));
		$this->set(compact('data'));
	}

	public function admin_add(){
		$users = $this->User->find('all',array(
			'conditions' => array('User.role' =>'user'),
		));
		$actual =$this->Actual->find('first',array(
			'order' => array('Actual.id' =>'desc'),
			'recursive' => -1,
		));

		if($this->request->is('post')){
			$this->Actual->create();
			$data = $this->request->data['Actual'];
			if($this->Actual->save($data)){
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
		
		if(is_null($id) || !(int)$id || !$this->Actual->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Actual->findById($id);
	
		if($this->request->is(array('post', 'put'))){
			$this->Actual->id = $id;
			$data1 = $this->request->data['Actual'];
		
			if($this->Actual->save($data1)){
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
		
		if(is_null($id) || !(int)$id || !$this->Actual->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Actual->findById($id);
	
		if($this->request->is(array('post', 'put'))){
			$this->Actual->id = $id;
			$q = "INSERT INTO change_actuals (user_id,date,entrance,initial,remainder,year,price,title,status,created) VALUES ('".$data['Actual']['user_id']."' ,  '".$data['Actual']['date']."',  '".$data['Actual']['entrance']."',  '".$data['Actual']['initial']."',  '".$data['Actual']['remainder']."',  '".$data['Actual']['year']."',  '".$data['Actual']['price']."',  '".$data['Actual']['title']."',  '".$data['Actual']['status']."',CURRENT_TIMESTAMP)";
			$this->Actual->query($q);
			$data1 = $this->request->data['Actual'];
			
			if($this->Actual->save($data1)){
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
				$id = $this->request->data['Extradition']['actual_id'];
				$actual = $this->Actual->find('first',array(
					'conditions' => array('Actual.id' =>$id),
				));
				$q = "INSERT INTO extradition_actuals (user_id,date,entrance,initial,remainder,year,price,title,status,created) VALUES ('".$actual['Actual']['user_id']."' ,  '".$actual['Actual']['date']."',  '".$actual['Actual']['entrance']."',  '".$actual['Actual']['initial']."',  '".$actual['Actual']['remainder']."',  '".$actual['Actual']['year']."',  '".$actual['Actual']['price']."',  '".$actual['Actual']['title']."',  '".$actual['Actual']['status']."',CURRENT_TIMESTAMP)";
				//$this->Actual->query($q);
				
				
			
				$this->Actual->query($q);

					$this->Actual->delete($id);
					$actuals =  $this->Actual->find('all',array(
						'recursive' => -1,
					));
					$i= 1;
					foreach ($actuals as $item) {
						$id = $item['Actual']['id'];
						$update = $this->Actual->query("UPDATE actuals SET order_num='{$i}' WHERE id='{$id}'");
						$i++;
						# code...
					}
					$this->Session->setFlash('Сохранено', 'default', array(), 'good');
					return $this->redirect('/admin/actuals');
				
			}
	}

	public function admin_delete($id){
		if (!$this->Actual->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		
		if($this->Actual->delete($id)){
		
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		$this->Actual->locale = Configure::read('Config.language');
		$title_for_layout = 'Новости';
		$order = array('Actual.date DESC');
		$paginator = array();
		$paginator['per_page'] = 9;
		$paginator['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
		$paginator['offset'] = ($paginator['current_page'] * $paginator['per_page']) - $paginator['per_page'];
		$paginator['link'] = (isset($_GET['cat'])) ? '?cat='.(int)$_GET['cat'].'&page=' : '?page=';
		$paginator['count'] = $this->Actual->find('count') - 1;
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
		$data = $this->Actual->find('all', array(
			'conditions' => array('Actual.type ' => 'actual'),
			'order' => array('Actual.date DESC, Actual.id DESC'),
			'offset' => $paginator['offset'],
			'limit' => $paginator['per_page'],
		));
		$this->set(compact('data', 'title_for_layout','paginator'));
	}
	

	public function view($id){
		$this->Actual->locale = Configure::read('Config.language');
		$data = $this->Actual->findById($id);
	
		if(!$data){
			throw new NotFoundException('Такой страницы нет...');
		}

		$other_actual = $this->Actual->find('all', array(
			'conditions' => array(array('Actual.type' => $data['Actual']['type']),array('Actual.id !=' => $id)),
			'order' => array('Actual.date' => 'desc'),
			'limit' => 6,
		));
		$title_for_layout = $data['Actual']['title'];
		$meta['keywords'] = $data['Actual']['keywords'];
		$meta['description'] = $data['Actual']['description'];

		$this->set(compact('data', 'title_for_layout', 'other_actual', 'meta'));
	}

	public function request() {
		$this->autoRender = false;

		if($this->request->is(array('post', 'put'))){
			$data = $this->request->data['ActualRequest'];
			//debug($data);die;
			$q = "INSERT INTO request_actuals (fio,phone,iin,actual_id,actual,price,created) VALUES ('".$data['fio']."' ,  '".$data['phone']."',  '".$data['iin']."',  '".$data['actual_id']."', '".$data['actual']."', '".$data['price']."',CURRENT_TIMESTAMP)";
		
			$this->Actual->query($q);
			$this->Session->setFlash('Заявка успешно отправлено', 'default', array(), 'good');
			return $this->redirect($this->referer());
			
		}
	}
}