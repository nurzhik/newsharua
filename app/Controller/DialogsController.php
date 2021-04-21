<?php
//kazchem
App::uses('CakeEmail', 'Network/Email');
class DialogsController extends AppController{
	public $components = array('Paginator');

	public $uses = array('Dialog', 'Message', 'User');

	public function admin_index(){

		$this->Paginator->settings = array(
			'limit' => 10,
			'order' => array('Dialog.id' => 'DESC')
		);
		$data = $this->Paginator->paginate('Dialog');
		// debug($data);die;
		// $data = $this->Dialog->find('all', array(
			////'conditions' => array('Dialog.active' => 1),
			//// 'order' => array('Dialog.id' => 'desc')
		// ));
		// $ads = $this->Ad->find('all');
		// foreach($ads as $item){
		// 	$ad[$item['Ad']['id']] = $item['Ad'];
		// }
		$users = $this->User->find('all');
		foreach($users as $item){
			$user[$item['User']['id']] = $item['User'];
		}
		// debug($user);
		// debug($data);
		$title_for_layout = __('Сообщения');
		$this->set(compact('data', 'title_for_layout', 'ad', 'user'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Dialog->create();
			$data = $this->request->data['Dialog'];
			$slug = Inflector::slug(mb_strtolower($this->request->data['Dialog']['title']), '-');
			$data[] = $this->request->data['Dialog'];
			$data[] = array('alias'=>$slug);
			$data = array_merge($data[0],$data[1]);
			if(!isset($data['img']['name']) || empty($data['img']['name'])){
				unset($data['img']);
			}
			
			// debug($data);die;
			//Проверка на уникальность alias	
			$check_alias = $this->Dialog->findByAlias($data['alias']);
			if(!empty($check_alias)) $data['alias'] = $data['alias'] . '-' . date("YmdHis");
			if($this->Dialog->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		$cat_t = $this->Category->find('threaded');
		// debug($categories);
		$this->set(compact('cat_t'));
	}

	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->Dialog->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Dialog->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Dialog->id = $id;
			$data1 = $this->request->data['Dialog'];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->Dialog->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$title_for_layout = 'Редактирование';
			
		}
		$cat_t = $this->Category->find('threaded');
		// debug($cats);
		$this->set(compact('id', 'data', 'title_for_layout', 'cat_t'));
	}

	public function admin_delete($id){
		if (!$this->Dialog->exists($id)) {
			throw new NotFoundException('Такой статьи нет');
		}
		if($this->Dialog->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		$l = $this->Session->read('lang');
		if(!$l) $l = 'ru';

		$this->checkAuth();
		
		
		// if (!$this->Dialog->exists($id)) {
		// 	throw new NotFoundException('Такой статьи нет');
		// }

		$user = $this->Auth->user();
		$user_id = $user['id'];
		// $type = 'Dialog.' . $user['type'];
		$data = $this->Dialog->find('all', array(
			'conditions' => array('Dialog.user_id' => $user_id),
			'order' => array('Dialog.modified' => 'desc')
		));
		
		

		// debug($data);
		$title_for_layout = __('Сообщения');
		$this->set(compact('data', 'title_for_layout', 'user_id'));
	}

	public function add_message(){
		$this->autoRender = false;
		$l = $this->Session->read('lang');
		if(!$l) $l = 'ru';

		$this->checkAuth();

		if($this->request->is('post')){
			$this->Dialog->create();
			$user = $this->Auth->user();

			$data = $this->request->data['Dialog'];
			//if($user['type'] == 'pokupatel') $status = 'status_pokupatel';
			// $data_dialog = array(
			// 	'id' => $data['dialog_id'],
			// 	'status_pokupatel' => 'status_pokupatel + 1';
			// );
			$message['dialog_id'] = $data['id'];
			$message['body'] = h($data['body']);
			$message['user_id'] = $data['user_id'];
			
			$data['admin_id'] = 1;
			$this->Dialog->id = $data['id'];
			// $this->Dialog->last_message = $data['body'];
			if($user['role'] == 'user'){
				$this->Dialog->saveField('status_admin', $this->Dialog->field('status_admin') + 1);
			}
			if($user['role'] == 'admin'){
				$this->Dialog->saveField('status_user', $this->Dialog->field('status_user') + 1);
			}
			
			$this->Dialog->saveField('last_message', $data['body']);

			

			//$this->Dialog->updateAll(array('Dialog.id' => $data['dialog_id']), array('Dialog.status_pokupatel' => 'Dialog.status_pokupatel+1'));
			// $this->Dialog->query("UPDATE ")
			// $this->Dialog->save($data_dialog);
			// debug($data);die;
		
			

			// $user_data = $this->Auth->user();
			// $user_id = $user_data['id'];
			// $data['user_id'] = $user_id;
			// debug($data);die;
			
			if($this->Message->save($message)){
				
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		$title_for_layout = __('Новое объявление');
		$this->set(compact('title_for_layout'));
	}

	public function add(){
		$this->autoRender = false;
		$l = $this->Session->read('lang');
		if(!$l) $l = 'ru';

		$this->checkAuth();
		$user_data = $this->Auth->user();
		$user_id = $user_data['id'];

		// debug($id);die;
		
		$admin_id = 1;

		
		$data = $this->Dialog->find('first', array(
			'conditions' => array(array('Dialog.admin_id' => $admin_id), array('Dialog.user_id' => $user_id)),
			// 'order' => array('Dialog.id' => 'desc')
		));
		// debug($data);die;
		if(!$data){
			$data['admin_id'] = $admin_id;
			$data['user_id'] = $user_id;
			$data['created'] = date('Y-m-d H:i:s');
			$data['modified'] = date('Y-m-d H:i:s');
			// debug($data);die;
			if($this->Dialog->save($data)){
				// $this->Session->setFlash('Сохранено', 'default', array(), 'good');
				
				$last_id = $this->Dialog->getLastInsertID();
				
				return $this->redirect("/dialogs/view/" . $last_id);
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}

		}else{
			return $this->redirect("/dialogs/view/" . $data['Dialog']['id']);
		}
		

		// debug($data);
		$title_for_layout = __('Сообщения');
		$this->set(compact('data', 'title_for_layout'));
	}

	public function view($id){
		$l = $this->Session->read('lang');
		if(!$l) $l = 'ru';

		$this->checkAuth();

		$user = $this->Auth->user();
		$user_id = $user['id'];

		$data = $this->Dialog->findById($id);
		

		if(!$data){
			throw new NotFoundException('Такого диалога нет...');
		}
		$messages = $this->Message->find('all', array(
			'conditions' => array('Message.dialog_id' => $data['Dialog']['id'])
		));
		// debug($messages);die;
		
			// $this->Dialog->saveField('status_pokupatel', 0);
		$q = "UPDATE `dialogs` SET `status_" . $user['role'] . "` = 0 WHERE `" . $user['role'] . "_id` = " . $user_id;
		$this->Dialog->query($q);
		
		
		// $user = $this->User->findById($data['Dialog']['user_id']);
		
		// $user_id = $data['Category']['user_id'];
		// $ui = $this->Dialog->Category->User->findById($user_id);
		
		if(isset($_GET['nur']) && $_GET['nur'] == 'hide'){
			$this->Dialog->query("UPDATE `ads` SET `active` = 0 WHERE `alias`='" . $alias . "'");
		}
		// $title_for_layout = $data['Dialog']['title'];
		// $this->Dialog->query("UPDATE `ads` SET `views` = `views` + 1 WHERE `alias`='" . $alias . "'");
		// $category['child'] = $this->Category->findById($data['Dialog']['category_id']);
		// $category['parent'] = $this->Category->findById($category['child']['Category']['parent_id']);
		// $meta['keywords'] = $data['Dialog']['keywords'];
		// $meta['description'] = $data['Dialog']['description'];
		$this->set(compact('id','data', 'title_for_layout', 'messages', 'user', 'user_id'));
	}

	public function admin_view($id){
		//$l = $this->Session->read('lang');
		//if(!$l) $l = 'ru';

		//$this->checkAuth();

		//$user = $this->Auth->user();

		$data = $this->Dialog->findById($id);
		// debug($data);die;
		
		if(!$data){
			throw new NotFoundException('Такого диалога нет...');
		}
		$messages = $this->Message->find('all', array(
			'conditions' => array('Message.dialog_id' => $data['Dialog']['id'])
		));
		
		
		$this->set(compact('data', 'title_for_layout', 'messages', 'id'));
	}

	public function delete($id){
		if(!$this->Auth->user()){
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			return $this->redirect('/users/login');
		}

		if (!$this->Dialog->exists($id)) {
			throw new NotFoundException('Такой статьи нет');
		}

		$user_data = $this->Auth->user();
		$user_id = $user_data['id'];
		
		$ad = $this->Dialog->findById($id);
		if($ad['Dialog']['user_id'] != $user_id){
			$this->Session->setFlash('Вы не имеете доступа к данному материалу', 'default', array(), 'bad');
			return $this->redirect($this->referer());
		}

		if($this->Dialog->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function edit($id){
		if(!$this->Auth->user()){
			return $this->redirect('/users/login');
		}

		if(is_null($id) || !(int)$id || !$this->Dialog->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}

		$user_data = $this->Auth->user();
		$user_id = $user_data['id'];
		
		$product = $this->Dialog->findById($id);
		if($product['Dialog']['user_id'] != $user_id){
			$this->Session->setFlash('Вы не имеете доступа к данному материалу', 'default', array(), 'bad');
			return $this->redirect($this->referer());
		}
		
		$data = $this->Dialog->findById($id);
	
		if($this->request->is(array('post', 'put'))){
			$this->Dialog->id = $id;
			$data1 = $this->request->data['Dialog'];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->Dialog->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$categories = $this->Category->find('all');
			$this->set(compact('id', 'data', 'categories'));
		}
	}

	public function checkAuth(){
		$l = $this->Session->read('lang');
		if(!$l) $l = 'ru';
		if(!$this->Auth->user()){
			$this->Session->setFlash(__('Ошибка! Необходимо войти на сайт'), 'default', array(), 'bad');
			return $this->redirect('/' . $l . '/users/login');
		}
	}

	public function test(){
		$this->autoRender = false;

		$cDay = date('j');
		$cMonth = date('n');
		$cYear = date('Y');
		$today = date("Y-m-d H:i:s");
		debug($today);
		$date3Day = new DateTime('-3 days');
		debug($date3Day);
		$threeDay = $date3Day->format('Y-m-d H:i:s');
		debug($threeDay);
		$threeDayAds = $this->Book->find('all', array(
			'conditions' => array('Book.created  <' => $threeDay),
			// 'limit' => 7,
			// 'order' => array('views' => 'desc'),
		));
		foreach($threeDayAds as $item){
			$this->Book->deleteAll(array('Book.id' => $item['Book']['id']), false);
			// $this->Book->deleteAll(array('Book.id' => 6), false);
			// $this->Dialog->saveField('last_message', $data['body']);
			$this->Dialog->query("UPDATE `ads` SET `booked` = 0 WHERE `id`= " . $item['Book']['ad_id'] . " AND `bought` = 0");
		}
		debug($threeDayAds);
		// $this->Dialog->query("UPDATE `dialogs` SET `status_pokupatel` = 0 WHERE `id`= 3");
	}
	
}