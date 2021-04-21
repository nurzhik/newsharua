<?php

class CategoriesController extends AppController{
	public $uses = array('Category', 'Category');
	public function admin_index(){
		
		$data = $this->Category->find('all', array(
			'order' => array('id' => 'desc')
		));
		
		$this->set(compact('data'));
	}

	public function admin_add(){
		$categorys = $this->Category->find('all');
		if($this->request->is('post')){
			$this->Category->create();

			$data = $this->request->data['Category'];
			
			if($this->Category->save($data)){
				

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
		
		if(is_null($id) || !(int)$id || !$this->Category->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Category->findById($id);
		
		if($this->request->is(array('post', 'put'))){
			$this->Category->id = $id;
			$data1 = $this->request->data['Category'];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
		
			if($this->Category->save($data1)){
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
		if (!$this->Category->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Category->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		$this->Category->locale = Configure::read('Config.language');
		$title_for_layout = 'Новости';
		$order = array('Category.date DESC');
		$paginator = array();
		$paginator['per_page'] = 9;
		$paginator['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
		$paginator['offset'] = ($paginator['current_page'] * $paginator['per_page']) - $paginator['per_page'];
		$paginator['link'] = (isset($_GET['cat'])) ? '?cat='.(int)$_GET['cat'].'&page=' : '?page=';
		$paginator['count'] = $this->Category->find('count') - 1;
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
		$data = $this->Category->find('all', array(
			'conditions' => array('Category.type ' => 'category'),
			'order' => array('Category.date DESC, Category.id DESC'),
			'offset' => $paginator['offset'],
			'limit' => $paginator['per_page'],
		));
		$this->set(compact('data', 'title_for_layout','paginator'));
	}
	

	public function view($id){
		$this->Category->locale = Configure::read('Config.language');
		$data = $this->Category->findById($id);
	
		if(!$data){
			throw new NotFoundException('Такой страницы нет...');
		}

		$other_category = $this->Category->find('all', array(
			'conditions' => array(array('Category.type' => $data['Category']['type']),array('Category.id !=' => $id)),
			'order' => array('Category.date' => 'desc'),
			'limit' => 6,
		));
		$title_for_layout = $data['Category']['title'];
		$meta['keywords'] = $data['Category']['keywords'];
		$meta['description'] = $data['Category']['description'];

		$this->set(compact('data', 'title_for_layout', 'other_category', 'meta'));
	}

	
}