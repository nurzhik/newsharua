<?php

class ProductsController extends AppController{
	public $uses = array('Product', 'Category');
	public function admin_index(){
		
		$data = $this->Product->find('all', array(
			'order' => array('id' => 'desc')
		));
		
		$this->set(compact('data'));
	}

	public function admin_add(){
		$categories = $this->Category->find('all');
		if($this->request->is('post')){
			$this->Product->create();

			$data = $this->request->data['Product'];

			if(!$data['img']['name']){
			 	unset($data['img']);
			}
			if($this->Product->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}

		$this->set(compact('id','categories'));
	}
	public function admin_edit($id){
		
		if(is_null($id) || !(int)$id || !$this->Product->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Product->findById($id);
		$categories = $this->Category->find('all');
		if($this->request->is(array('post', 'put'))){
			$this->Product->id = $id;
			$data1 = $this->request->data['Product'];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
		
			if($this->Product->save($data1)){
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
		if (!$this->Product->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Product->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		$this->Product->locale = Configure::read('Config.language');
		$title_for_layout = 'Новости';
		$order = array('Product.date DESC');
		$paginator = array();
		$paginator['per_page'] = 9;
		$paginator['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
		$paginator['offset'] = ($paginator['current_page'] * $paginator['per_page']) - $paginator['per_page'];
		$paginator['link'] = (isset($_GET['cat'])) ? '?cat='.(int)$_GET['cat'].'&page=' : '?page=';
		$paginator['count'] = $this->Product->find('count') - 1;
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
		$data = $this->Product->find('all', array(
			'conditions' => array('Product.type ' => 'product'),
			'order' => array('Product.date DESC, Product.id DESC'),
			'offset' => $paginator['offset'],
			'limit' => $paginator['per_page'],
		));
		$this->set(compact('data', 'title_for_layout','paginator'));
	}
	

	public function view($id){
		
		$data = $this->Category->findById($id);
		$categories =$this->Category->find('all');
		if(!$data){
			$products = $this->Product->find('all');
		}else{
			$products = $this->Product->find('all', array(
				'conditions' => array('Product.category_id =' => $id),
			));
		}
		// $other_product = $this->Product->find('all', array(
		// 	'conditions' => array(array('Product.type' => $data['Product']['type']),array('Product.id !=' => $id)),
		// 	'order' => array('Product.date' => 'desc'),
		// 	'limit' => 6,
		// ));
		$title_for_layout = "Продукты";
	

		$this->set(compact('data', 'title_for_layout', 'other_product', 'meta','products','categories','id'));
	}

	
}