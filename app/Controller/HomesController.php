<?php

class HomesController extends AppController{
	public function admin_index(){
		
			$data = $this->Home->find('all', array(
				'order' => array('Home.id' => 'desc')
			));
			
		$this->set(compact('data'));
	}

	public function admin_add(){
		$users = $this->User->find('all',array(
			'conditions' => array('User.role' =>'user'),
		));
		$home =$this->Home->find('first',array(
			'order' => array('Home.id' =>'desc'),
			'recursive' => -1,
		));

		if($this->request->is('post')){
			$this->Home->create();
			$data = $this->request->data['Home'];
			
			if(!empty($home)) {
				$data['order_num'] = $home['Home']['order_num'] + 1;
			}else {
				$data['order_num'] =1;
			}
			
 			
			if($this->Home->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
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
		
		if(is_null($id) || !(int)$id || !$this->Home->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Home->findById($id);
	
		if($this->request->is(array('post', 'put'))){
			$this->Home->id = $id;
			$data1 = $this->request->data['Home'];
		
			if($this->Home->save($data1)){
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
		
		if(is_null($id) || !(int)$id || !$this->Home->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Home->findById($id);
	
		if($this->request->is(array('post', 'put'))){
			$this->Home->id = $id;
			$q = "INSERT INTO change_homes (user_id,date,entrance,initial,remainder,developer,price,title,status,created) VALUES ('".$data['Home']['user_id']."' ,  '".$data['Home']['date']."',  '".$data['Home']['entrance']."',  '".$data['Home']['initial']."',  '".$data['Home']['remainder']."',  '".$data['Home']['developer']."',  '".$data['Home']['price']."',  '".$data['Home']['title']."',  '".$data['Home']['status']."',CURRENT_TIMESTAMP)";
			$this->Home->query($q);
			$data1 = $this->request->data['Home'];
			
			if($this->Home->save($data1)){
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
				$id = $this->request->data['Extradition']['home_id'];

				$home = $this->Home->find('first',array(
					'conditions' => array('Home.id' =>$id),
				));
				$q = "INSERT INTO extradition_homes (user_id,date,entrance,initial,remainder,developer,price,title,status,created) VALUES ('".$home['Home']['user_id']."' ,  '".$home['Home']['date']."',  '".$home['Home']['entrance']."',  '".$home['Home']['initial']."',  '".$home['Home']['remainder']."',  '".$home['Home']['developer']."',  '".$home['Home']['price']."',  '".$home['Home']['title']."',  '".$home['Home']['status']."',CURRENT_TIMESTAMP)";
				//$this->Home->query($q);
				
				
			
				$this->Home->query($q);

					$this->Home->delete($id);
					$homes =  $this->Home->find('all',array(
						'recursive' => -1,
					));
					$i= 1;
					foreach ($homes as $item) {
						$id = $item['Home']['id'];
						$update = $this->Home->query("UPDATE homes SET order_num='{$i}' WHERE id='{$id}'");
						$i++;
						# code...
					}
					$this->Session->setFlash('Сохранено', 'default', array(), 'good');
					return $this->redirect('/admin/homes');
				
			}
	}
	public function admin_delete($id){
		if (!$this->Home->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		
		if($this->Home->delete($id)){
			$homes =  $this->Home->find('all',array(
				'recursive' => -1,
			));
			$i= 1;
			foreach ($homes as $item) {
				$id = $item['Home']['id'];
				$update = $this->Home->query("UPDATE homes SET order_num='{$i}' WHERE id='{$id}'");
				$i++;
				# code...
			}

			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		$this->Home->locale = Configure::read('Config.language');
		$title_for_layout = 'Новости';
		$order = array('Home.date DESC');
		$paginator = array();
		$paginator['per_page'] = 9;
		$paginator['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
		$paginator['offset'] = ($paginator['current_page'] * $paginator['per_page']) - $paginator['per_page'];
		$paginator['link'] = (isset($_GET['cat'])) ? '?cat='.(int)$_GET['cat'].'&page=' : '?page=';
		$paginator['count'] = $this->Home->find('count') - 1;
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
		$data = $this->Home->find('all', array(
			'conditions' => array('Home.type ' => 'home'),
			'order' => array('Home.date DESC, Home.id DESC'),
			'offset' => $paginator['offset'],
			'limit' => $paginator['per_page'],
		));
		$this->set(compact('data', 'title_for_layout','paginator'));
	}
	

	public function view($id){
		$this->Home->locale = Configure::read('Config.language');
		$data = $this->Home->findById($id);
	
		if(!$data){
			throw new NotFoundException('Такой страницы нет...');
		}

		$other_home = $this->Home->find('all', array(
			'conditions' => array(array('Home.type' => $data['Home']['type']),array('Home.id !=' => $id)),
			'order' => array('Home.date' => 'desc'),
			'limit' => 6,
		));
		$title_for_layout = $data['Home']['title'];
		$meta['keywords'] = $data['Home']['keywords'];
		$meta['description'] = $data['Home']['description'];

		$this->set(compact('data', 'title_for_layout', 'other_home', 'meta'));
	}

	public function request() {
		$this->autoRender = false;

		if($this->request->is(array('post', 'put'))){
			$data = $this->request->data['HomeRequest'];
			//debug($data);die;
			$q = "INSERT INTO request_homes (fio,phone,iin,home_id,home,price,created) VALUES ('".$data['fio']."' ,  '".$data['phone']."',  '".$data['iin']."',  '".$data['home_id']."', '".$data['home']."', '".$data['price']."',CURRENT_TIMESTAMP)";
			$this->Home->query($q);
		
			$this->Session->setFlash('Заявка успешно отправлено', 'default', array(), 'good');
			return $this->redirect($this->referer());
			
		}
	}
}