<?php

class NewsController extends AppController{
	public $uses = array('Category', 'News');
	public function admin_index(){
		$this->News->locale = array('en', 'kz');
		$this->News->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->News->find('all', array(
			'order' => array('id' => 'desc')
		));
		
		$this->set(compact('data'));
	}

	public function admin_add(){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->News->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->News->locale = 'en';
		}else{
			$this->News->locale = 'ru';
		}
		
		if($this->request->is('post')){
			$this->News->create();

			$slug = Inflector::slug($this->request->data['News']['title']);
			$slug = mb_strtolower($slug);
			$data[] = $this->request->data['News'];
			$data[] = array('alias'=>$slug);
			$data = array_merge($data[0],$data[1]);

		
			if(!$data['img']['name']){
			 	unset($data['img']);
			}
			if($this->News->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		$this->set(compact('id', 'categories'));
	}
	public function admin_edit($id){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->News->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->News->locale = 'en';
		}else{
			$this->News->locale = 'ru';
		}
		$categories = $this->Category->find('all');
		if(is_null($id) || !(int)$id || !$this->News->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->News->findById($id);
		
		if($this->request->is(array('post', 'put'))){
			$this->News->id = $id;
			$data1 = $this->request->data['News'];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}	
			// debug($data1);die;
			if(!isset($data1['general']) || empty($data1['general'])){
				$data1['general'] = 0;
			}
			if(!isset($data1['cabinet']) || empty($data1['cabinet'])){
				$data1['cabinet'] = 0;
			}
			if($this->News->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			
			$this->set(compact('id', 'data','categories'));
		}
	}

	public function admin_delete($id){
		if (!$this->News->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->News->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		$this->News->locale = Configure::read('Config.language');
		$title_for_layout = 'Новости';
		$order = array('News.date DESC');
		$paginator = array();
		$paginator['per_page'] = 9;
		$paginator['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
		$paginator['offset'] = ($paginator['current_page'] * $paginator['per_page']) - $paginator['per_page'];
		$paginator['link'] = (isset($_GET['cat'])) ? '?cat='.(int)$_GET['cat'].'&page=' : '?page=';
		$paginator['count'] = $this->News->find('count') - 1;
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
		$data = $this->News->find('all', array(
			'order' => array('News.date DESC, News.id DESC'),
			'conditions' => array('News.general ' =>1),
			'offset' => $paginator['offset'],
			'limit' => $paginator['per_page'],
		));
		//debug($data);
		$this->set(compact('data', 'title_for_layout','paginator'));
	}
	
	public function news(){
		$this->News->locale = Configure::read('Config.language');
		$title_for_layout = 'Новости';
		$order = array('News.date DESC');
		$paginator = array();
		$paginator['per_page'] = 9;
		$paginator['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
		$paginator['offset'] = ($paginator['current_page'] * $paginator['per_page']) - $paginator['per_page'];
		$paginator['link'] = (isset($_GET['cat'])) ? '?cat='.(int)$_GET['cat'].'&page=' : '?page=';
		$paginator['count'] = $this->News->find('count') - 1;
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
		$data = $this->News->find('all', array(
			'order' => array('News.date DESC, News.id DESC'),
			'offset' => $paginator['offset'],
			'conditions' => array('News.cabinet ' =>1),
			'limit' => $paginator['per_page'],
		));
		//debug($data);
		$this->set(compact('data', 'title_for_layout','paginator'));
	}
	public function view($id){
		$this->News->locale = Configure::read('Config.language');
		$data = $this->News->findById($id);
	
		if(!$data){
			throw new NotFoundException('Такой страницы нет...');
		}
		
		$other_news = $this->News->find('all', array(
			'conditions' => array(array('News.id !=' => $data['News']['id'])),
			'limit' => 6,
		));
		$title_for_layout = ($data['News']['meta_title']) ? $data['News']['meta_title'] : $data['News']['title'];
		$meta['keywords'] = $data['News']['keywords'];
		$meta['description'] = $data['News']['description'];

		$this->set(compact('data', 'title_for_layout', 'other_news', 'meta'));
	}
	public function news_view($id){
		$this->News->locale = Configure::read('Config.language');
		$data = $this->News->findById($id);
	
		if(!$data){
			throw new NotFoundException('Такой страницы нет...');
		}
		
		// $other_news = $this->News->find('all', array(
		// 	'conditions' => array(array('News.id !=' => $data['News']['id'])),
		// 	'limit' => 6,
		// ));
		$title_for_layout = ($data['News']['meta_title']) ? $data['News']['meta_title'] : $data['News']['title'];
		$meta['keywords'] = $data['News']['keywords'];
		$meta['description'] = $data['News']['description'];

		$this->set(compact('data', 'title_for_layout', 'other_news', 'meta'));
	}
	
}