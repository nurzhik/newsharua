<?php

class FaqsController extends AppController{
	public $uses = array('Category', 'Faq');
	public function admin_index(){
		$this->Faq->locale = array('en', 'kz');
		$this->Faq->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Faq->find('all', array(
			'order' => array('id' => 'desc')
		));
		
		$this->set(compact('data'));
	}

	public function admin_add(){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Faq->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Faq->locale = 'en';
		}else{
			$this->Faq->locale = 'ru';
		}
	
		if($this->request->is('post')){
			$this->Faq->create();

			
			$data = $this->request->data['Faq'];
			
		
			
			if($this->Faq->save($data)){
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
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Faq->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Faq->locale = 'en';
		}else{
			$this->Faq->locale = 'ru';
		}
		
		if(is_null($id) || !(int)$id || !$this->Faq->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Faq->findById($id);
		
		if($this->request->is(array('post', 'put'))){
			$this->Faq->id = $id;
			$data1 = $this->request->data['Faq'];
			
		
			if($this->Faq->save($data1)){
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
		if (!$this->Faq->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Faq->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		$this->Faq->locale = Configure::read('Config.language');
		$title_for_layout = 'Вопросы и ответы';
	
		$faqs = $this->Faq->find('all', array(
			'order' => array('Faq.sort_order DESC'),
			
		));
		$this->set(compact('faqs', 'title_for_layout','paginator'));
	}
	

	public function view($id){
		$this->Faq->locale = Configure::read('Config.language');
		$data = $this->Faq->findById($id);
	
		if(!$data){
			throw new NotFoundException('Такой страницы нет...');
		}

		$other_faq = $this->Faq->find('all', array(
			'conditions' => array(array('Faq.id !=' => $id)),
			'limit' => 6,
		));
		$title_for_layout = $data['Faq']['title'];
		$meta['keywords'] = $data['Faq']['keywords'];
		$meta['description'] = $data['Faq']['description'];

		$this->set(compact('data', 'title_for_layout', 'other_faq', 'meta'));
	}

	
}