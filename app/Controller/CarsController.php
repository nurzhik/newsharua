<?php

class CarsController extends AppController{
	public function admin_index(){
		
			$data = $this->Car->find('all', array(
				'order' => array('Car.id' => 'desc')
			));
			
		$this->set(compact('data'));
	}

	public function admin_add(){
		$users = $this->User->find('all',array(
			'conditions' => array('User.role' =>'user'),
		));
		$car =$this->Car->find('first',array(
			'order' => array('Car.id' =>'desc'),
			'recursive' => -1,
		));

		if($this->request->is('post')){
			$this->Car->create();


			$data = $this->request->data['Car'];

			if(!empty($car)) {
				$data['order_num'] = $car['Car']['order_num'] + 1;
			}else {
				$data['order_num'] =1;
			}
			
 			
			if($this->Car->save($data)){
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
		
		if(is_null($id) || !(int)$id || !$this->Car->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Car->findById($id);
	
		if($this->request->is(array('post', 'put'))){
			$this->Car->id = $id;
			$data1 = $this->request->data['Car'];
		
			if($this->Car->save($data1)){
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
		
		if(is_null($id) || !(int)$id || !$this->Car->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Car->findById($id);
	
		if($this->request->is(array('post', 'put'))){
			$this->Car->id = $id;
			$q = "INSERT INTO change_cars (user_id,date,entrance,initial,remainder,year,price,title,status,created) VALUES ('".$data['Car']['user_id']."' ,  '".$data['Car']['date']."',  '".$data['Car']['entrance']."',  '".$data['Car']['initial']."',  '".$data['Car']['remainder']."',  '".$data['Car']['year']."',  '".$data['Car']['price']."',  '".$data['Car']['title']."',  '".$data['Car']['status']."',CURRENT_TIMESTAMP)";
			$this->Car->query($q);
			$data1 = $this->request->data['Car'];
			
			if($this->Car->save($data1)){
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
				$id = $this->request->data['Extradition']['car_id'];
				$car = $this->Car->find('first',array(
					'conditions' => array('Car.id' =>$id),
				));
				$q = "INSERT INTO extradition_cars (user_id,date,entrance,initial,remainder,year,price,title,status,created) VALUES ('".$car['Car']['user_id']."' ,  '".$car['Car']['date']."',  '".$car['Car']['entrance']."',  '".$car['Car']['initial']."',  '".$car['Car']['remainder']."',  '".$car['Car']['year']."',  '".$car['Car']['price']."',  '".$car['Car']['title']."',  '".$car['Car']['status']."',CURRENT_TIMESTAMP)";
				//$this->Car->query($q);
				
				
			
				$this->Car->query($q);

					$this->Car->delete($id);
					$cars =  $this->Car->find('all',array(
						'recursive' => -1,
					));
					$i= 1;
					foreach ($cars as $item) {
						$id = $item['Car']['id'];
						$update = $this->Car->query("UPDATE cars SET order_num='{$i}' WHERE id='{$id}'");
						$i++;
						# code...
					}
					$this->Session->setFlash('Сохранено', 'default', array(), 'good');
					return $this->redirect('/admin/cars');
				
			}
	}

	public function admin_delete($id){
		if (!$this->Car->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		
		if($this->Car->delete($id)){
			$cars =  $this->Car->find('all',array(
				'recursive' => -1,
			));
			$i= 1;
			foreach ($cars as $item) {
				$id = $item['Car']['id'];
				$update = $this->Car->query("UPDATE cars SET order_num='{$i}' WHERE id='{$id}'");
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
		$this->Car->locale = Configure::read('Config.language');
		$title_for_layout = 'Новости';
		$order = array('Car.date DESC');
		$paginator = array();
		$paginator['per_page'] = 9;
		$paginator['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
		$paginator['offset'] = ($paginator['current_page'] * $paginator['per_page']) - $paginator['per_page'];
		$paginator['link'] = (isset($_GET['cat'])) ? '?cat='.(int)$_GET['cat'].'&page=' : '?page=';
		$paginator['count'] = $this->Car->find('count') - 1;
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
		$data = $this->Car->find('all', array(
			'conditions' => array('Car.type ' => 'car'),
			'order' => array('Car.date DESC, Car.id DESC'),
			'offset' => $paginator['offset'],
			'limit' => $paginator['per_page'],
		));
		$this->set(compact('data', 'title_for_layout','paginator'));
	}
	

	public function view($id){
		$this->Car->locale = Configure::read('Config.language');
		$data = $this->Car->findById($id);
	
		if(!$data){
			throw new NotFoundException('Такой страницы нет...');
		}

		$other_car = $this->Car->find('all', array(
			'conditions' => array(array('Car.type' => $data['Car']['type']),array('Car.id !=' => $id)),
			'order' => array('Car.date' => 'desc'),
			'limit' => 6,
		));
		$title_for_layout = $data['Car']['title'];
		$meta['keywords'] = $data['Car']['keywords'];
		$meta['description'] = $data['Car']['description'];

		$this->set(compact('data', 'title_for_layout', 'other_car', 'meta'));
	}

	public function request() {
		$this->autoRender = false;

		if($this->request->is(array('post', 'put'))){
			$data = $this->request->data['CarRequest'];
			//debug($data);die;
			$q = "INSERT INTO request_cars (fio,phone,iin,car_id,car,price,created) VALUES ('".$data['fio']."' ,  '".$data['phone']."',  '".$data['iin']."',  '".$data['car_id']."', '".$data['car']."', '".$data['price']."',CURRENT_TIMESTAMP)";
		
			$this->Car->query($q);
			$this->Session->setFlash('Заявка успешно отправлено', 'default', array(), 'good');
			return $this->redirect($this->referer());
			
		}
	}
}