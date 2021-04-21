<?php
//ncass
App::uses('CakeEmail', 'Network/Email');
class MessagesController extends AppController{
	public $components = array('Paginator');

	public $uses = array('Message', 'User');

	public function index(){
		$l = $this->Session->read('lang');
		if(!$l) $l = 'ru';

		$this->checkAuth();
		
		
		// if (!$this->Message->exists($id)) {
		// 	throw new NotFoundException('Такой статьи нет');
		// }

		$user = $this->Auth->user();
		$user_id = $user['id'];
		// $type = 'Message.' . $user['type'];
		$data = $this->Message->find('all', array(
			'conditions' => array('Message.user_id' => $user_id),
			'order' => array('Message.modified' => 'desc')
		));
		
		

		// debug($data);die;
		$title_for_layout = __('Сообщения');
		$this->set(compact('data', 'title_for_layout', 'user_id'));
	}

	public function add_message(){
		$l = $this->Session->read('lang');
		if(!$l) $l = 'ru';

		$this->checkAuth();

		if($this->request->is('post')){
			$this->Message->create();
			$user = $this->Auth->user();

			$data = $this->request->data['Message'];
			// $this->Message->id = $data['dialog_id'];
			// $this->Message->last_message = $data['body'];
			
			
			// $this->Message->saveField('last_message', $data['body']);
			
			
			if($this->Message->save($data)){
				$this->Session->setFlash(__('Сообщение отправлено!'), 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		$title_for_layout = __('Новое сообщение');
		$this->set(compact('title_for_layout'));
	}

	public function admin_index(){
		$d = $this->Message->find('all', array(
			'fields'=>array('DISTINCT user_id'),
			'recursive' => -1
		));
		//debug($d);die;
		$this->Paginator->settings = array(
			//'fields'=>array('Message.id','DISTINCT (Message.user_id) AS user_id'),
			'limit' => 10,
			'order' => array('Message.id' => 'DESC')
		);
		$data = $this->Paginator->paginate('Message');

		// $data = $this->Message->find('all', array(
			////'conditions' => array('Message.active' => 1),
			//// 'order' => array('Message.id' => 'desc')
		// ));
		// $ads = $this->Ad->find('all');
		// foreach($ads as $item){
		// 	$ad[$item['Ad']['id']] = $item['Ad'];
		// }
		// $users = $this->User->find('all');
		// foreach($users as $item){
		// 	$user[$item['User']['id']] = $item['User'];
		// }
		debug($data);die;
		
		$title_for_layout = __('Сообщения');
		$this->set(compact('data', 'title_for_layout', 'ad', 'user'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Message->create();
			$data = $this->request->data['Message'];
			$slug = Inflector::slug(mb_strtolower($this->request->data['Message']['title']), '-');
			$data[] = $this->request->data['Message'];
			$data[] = array('alias'=>$slug);
			$data = array_merge($data[0],$data[1]);
			if(!isset($data['img']['name']) || empty($data['img']['name'])){
				unset($data['img']);
			}
			
			// debug($data);die;
			//Проверка на уникальность alias	
			$check_alias = $this->Message->findByAlias($data['alias']);
			if(!empty($check_alias)) $data['alias'] = $data['alias'] . '-' . date("YmdHis");
			if($this->Message->save($data)){
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
		if(is_null($id) || !(int)$id || !$this->Message->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Message->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Message->id = $id;
			$data1 = $this->request->data['Message'];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->Message->save($data1)){
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
		if (!$this->Message->exists($id)) {
			throw new NotFoundException('Такой статьи нет');
		}
		if($this->Message->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	

	public function add($id){
		$l = $this->Session->read('lang');
		if(!$l) $l = 'ru';

		$this->checkAuth();
		$user_data = $this->Auth->user();
		$pokupatel = $user_data['id'];

		// debug($id);die;
		
		$postavshik = $this->Ad->findById($id);
		$postavshik = $postavshik['Ad']['user_id'];

		
		$data = $this->Message->find('first', array(
			'conditions' => array(array('Message.postavshik' => $postavshik), array('Message.pokupatel' => $pokupatel), array('Message.ad_id' => $id)),
			// 'order' => array('Message.id' => 'desc')
		));
		// debug($data);die;
		if(!$data){
			
			$data['ad_id'] = $id;
			$data['postavshik'] = $postavshik;
			$data['pokupatel'] = $pokupatel;
			$data['created'] = date('Y-m-d H:i:s');
			$data['modified'] = date('Y-m-d H:i:s');
			// debug($data);die;
			if($this->Message->save($data)){
				// $this->Session->setFlash('Сохранено', 'default', array(), 'good');
				
				$last_id = $this->Message->getLastInsertID();
				
				return $this->redirect("/dialogs/view/" . $last_id);
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}

		}else{
			return $this->redirect("/dialogs/view/" . $data['Message']['id']);
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

		$data = $this->Message->findById($id);

		// debug($user);
		// debug($data);

		if(($user['type'] == 'pokupatel' && $user['id'] = $data['Message']['pokupatel']) || ($user['type'] == 'postavshik' && $user['id'] = $data['Message']['postavshik'])){
			// debug('OK');
		}else{
			// debug('ERROR');
			throw new NotFoundException(__('Ошибка'));
			die;
		}
		// die;
		if(!$data){
			throw new NotFoundException('Такого диалога нет...');
		}
		$messages = $this->Message->find('all', array(
			'conditions' => array('Message.dialog_id' => $data['Message']['id'])
		));
		// $this->Message->id = $id;
		if($user['type'] == 'pokupatel' && $data['Message']['status_pokupatel'] > 0){
			// $this->Message->saveField('status_pokupatel', 0);
			$this->Message->query("UPDATE `dialogs` SET `status_pokupatel` = 0 WHERE `id`='" . $id . "'");
		}
		if($user['type'] == 'postavshik' && $data['Message']['status_postavshik'] > 0){
			// $this->Message->saveField('status_postavshik', 0);
			$this->Message->query("UPDATE `dialogs` SET `status_postavshik` = 0 WHERE `id`='" . $id . "'");
		}
		
		// $user = $this->User->findById($data['Message']['user_id']);
		
		// $user_id = $data['Category']['user_id'];
		// $ui = $this->Message->Category->User->findById($user_id);
		
		if(isset($_GET['nur']) && $_GET['nur'] == 'hide'){
			$this->Message->query("UPDATE `ads` SET `active` = 0 WHERE `alias`='" . $alias . "'");
		}
		// $title_for_layout = $data['Message']['title'];
		// $this->Message->query("UPDATE `ads` SET `views` = `views` + 1 WHERE `alias`='" . $alias . "'");
		// $category['child'] = $this->Category->findById($data['Message']['category_id']);
		// $category['parent'] = $this->Category->findById($category['child']['Category']['parent_id']);
		// $meta['keywords'] = $data['Message']['keywords'];
		// $meta['description'] = $data['Message']['description'];
		$this->set(compact('data', 'title_for_layout', 'messages', 'user'));
	}

	public function admin_view($id){
		//$l = $this->Session->read('lang');
		//if(!$l) $l = 'ru';

		//$this->checkAuth();

		//$user = $this->Auth->user();

		$data = $this->Message->findById($id);

		
		if(!$data){
			throw new NotFoundException('Такого диалога нет...');
		}
		$messages = $this->Message->find('all', array(
			'conditions' => array('Message.dialog_id' => $data['Message']['id'])
		));
		
		
		$this->set(compact('data', 'title_for_layout', 'messages'));
	}

	public function delete($id){
		if(!$this->Auth->user()){
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			return $this->redirect('/users/login');
		}

		if (!$this->Message->exists($id)) {
			throw new NotFoundException('Такой статьи нет');
		}

		$user_data = $this->Auth->user();
		$user_id = $user_data['id'];
		
		$ad = $this->Message->findById($id);
		if($ad['Message']['user_id'] != $user_id){
			$this->Session->setFlash('Вы не имеете доступа к данному материалу', 'default', array(), 'bad');
			return $this->redirect($this->referer());
		}

		if($this->Message->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	

	public function checkAuth(){
		$l = $this->Session->read('lang');
		if(!$l) $l = 'ru';
		if(!$this->Auth->user()){
			$this->Session->setFlash(__('Ошибка! Необходимо войти на сайт'), 'default', array(), 'bad');
			return $this->redirect('/' . $l . '/users/login');
		}
	}

	
}