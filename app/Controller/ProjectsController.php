<?php

class ProjectsController extends AppController{
// 	public $uses = array('Category', 'Project');
	public function admin_index(){
		$this->Project->locale = array('en', 'kz');
		$this->Project->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Project->find('all', array(
			'order' => array('id' => 'desc')
		));
		
		$this->set(compact('data'));
	}

	public function admin_add(){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Project->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Project->locale = 'en';
		}else{
			$this->Project->locale = 'ru';
		}
		
		if($this->request->is('post')){
			$this->Project->create();

			$slug = Inflector::slug($this->request->data['Project']['title'], '-');
			$slug = mb_strtolower($slug);
			$data[] = $this->request->data['Project'];
			$data[] = array('alias'=>$slug);
			$data = array_merge($data[0],$data[1]);

		
			if(!$data['img']['name']){
			 	unset($data['img']);
			}
			//debug($data);
			//$result = $this->Project->save($data);
			//debug($result);die;
			if($this->Project->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		
	}
	public function admin_edit($id){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Project->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Project->locale = 'en';
		}else{
			$this->Project->locale = 'ru';
		}
		
		if(is_null($id) || !(int)$id || !$this->Project->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Project->findById($id);
		
		if($this->request->is(array('post', 'put'))){
			$this->Project->id = $id;
			$data1 = $this->request->data['Project'];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
		
			if($this->Project->save($data1)){
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
		if (!$this->Project->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Project->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		$this->Project->locale = Configure::read('Config.language');
		$title_for_layout = 'Новости';
		$order = array('Project.id'=>'DESC');
		$paginator = array();
		$paginator['per_page'] = 9;
		$paginator['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
		$paginator['offset'] = ($paginator['current_page'] * $paginator['per_page']) - $paginator['per_page'];
		$paginator['link'] = (isset($_GET['cat'])) ? '?cat='.(int)$_GET['cat'].'&page=' : '?page=';
		$paginator['count'] = $this->Project->find('count') - 1;
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
		$data = $this->Project->find('all', array(
			'order' => array('Project.id' => 'DESC'),
			'offset' => $paginator['offset'],
			'limit' => $paginator['per_page'],
		));
		//debug($data);
		$this->set(compact('data', 'title_for_layout','paginator'));
	}
	

	public function view($id){
		$this->Project->locale = Configure::read('Config.language');
		$data = $this->Project->findById($id);
	
		if(!$data){
			throw new NotFoundException('Такой страницы нет...');
		}
		$this->Project->query("UPDATE `projects` SET `view` = `view` + 1 WHERE `id`='" . $id . "'");
		$other_news = $this->Project->find('all', array(
			'conditions' => array(array('Project.id !=' => $data['Project']['id'])),
			'limit' => 6,
		));
		$title_for_layout = ($data['Project']['meta_title']) ? $data['Project']['meta_title'] : $data['Project']['title'];
		$meta['keywords'] = $data['Project']['keywords'];
		$meta['description'] = $data['Project']['description'];

		$this->set(compact('data', 'title_for_layout', 'other_news', 'meta'));
	}

	
}