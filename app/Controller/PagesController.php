<?php
App::uses('CakeEmail', 'Network/Email');

class PagesController extends AppController {

	public $uses = array('Page','News','Slide','Setting','Review','Advantage','Partner','User','Team');
	public function admin_welcome(){
		
	}
	public function admin_index(){
		$this->Page->locale = array('en', 'kz');
		$this->Page->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Page->find('all');

		$title_for_layout = 'Pages';
		$this->set(compact('data', 'title_for_layout'));
	}
	public function admin_requestcars(){
		
		$data = $this->RequestCar->find('all');
		//debug($data);die;
		$title_for_layout = 'Pages';
		$this->set(compact('data', 'title_for_layout'));
	}
	public function admin_requesthomes(){
		
		$data = $this->RequestHome->find('all');
		//debug($data);die;
		$title_for_layout = 'Pages';
		$this->set(compact('data', 'title_for_layout'));
	}
	
	public function index($page_alias = null){
		$this->Page->locale = Configure::read('Config.language');
		
		if(is_null($page_alias)){
			throw new NotFoundException("Такой страницы нету");
		}
		
		$page = $this->Page->findByAlias($page_alias);
		
		
		$title_for_layout = $page['Page']['title'];
		$meta['keywords'] = $page['Page']['keywords'];
		$meta['description'] = $page['Page']['description'];
		$this->set(compact('page_alias', 'page', 'title_for_layout', 'meta','faqs','docs','slides','teams'));
	}

	
	public function home(){
		$this->Advantage->locale = Configure::read('Config.language');
		$this->Slide->locale = Configure::read('Config.language');
		$this->News->locale = Configure::read('Config.language');
		$page = $this->Setting->findById(1);
		$slides =$this->Slide->find('all');
		$advantages = $this->Advantage->find('all');
		$partners = $this->Partner->find('all');


		$news = $this->News->find('all',array(
			'limit' =>4,
			'order'=>'News.id',
			'contidions'=>array('News.general' =>1),
		));
		
		$title_for_layout ='Главная';
		$this->set(compact('title_for_layout' ,'news','advantages','page','slides','partners'));
	}

	public function about(){
		$this->Advantage->locale = Configure::read('Config.language');
		$this->Team->locale = Configure::read('Config.language');
		$page = $this->Setting->findById(1);
		$advantages = $this->Advantage->find('all');
		//debug($advantages);die;
		$teams = $this->Team->find('all');
		$partners = $this->Partner->find('all');
		$title_for_layout ='О нас';
		$this->set(compact('title_for_layout' ,'page','advantages','teams'));
	}
	public function products(){
			
		$this->Setting->locale = Configure::read('Config.language');
		$this->Review->locale = Configure::read('Config.language');
		$this->Advantage->locale = Configure::read('Config.language');
		$page = $this->Setting->findById(1);
		$reviews = $this->Review->find('all', array(
			'order' => array('Review.id' => 'desc'),
		));
		$advantages = $this->Advantage->find('all', array(
			'conditions' => array('Advantage.type_id' => 3),
		));
		$title_for_layout ='Партнерам';
		$this->set(compact('title_for_layout' ,'page','reviews','advantages'));
	}
	public function registration_page(){
			
		$title_for_layout ='Регистраиця';
		$this->set(compact('title_for_layout' ,'page','infographics','videos','npas','branches','partners','reports','information','plan','vacancy'));
	}
	
	public function contacts(){
		
		$title_for_layout = 'Контакты';
		$page = $this->Setting->findById(1);
		
		
		//debug($branches);die;
		
		// $meta['keywords'] = $page['Page']['keywords'];
		// $meta['description'] = $page['Page']['description'];
		$this->set(compact('title_for_layout', 'meta','page'));
	}
	
	
	public function admin_add(){

		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Page->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Page->locale = 'en';
		}else{
			$this->Page->locale = 'ru';
		}

		if($this->request->is('post')){
			$this->Page->create();
			//Создаем alias

			$slug = Inflector::slug(mb_strtolower($this->request->data['Page']['title']), '-');
			$data[] = $this->request->data['Page'];
			$data[] = array('alias'=>$slug);
			$data = array_merge($data[0],$data[1]);
			
			if(!$data['img']['name']){
			 	unset($data['img']);
			}
			//Проверка на уникальность alias	
			$check_alias = $this->Page->findByAlias($data['alias']);
			if(!empty($check_alias)) $data['alias'] = $data['alias'] . '-' . date("YmdHis");

			if($this->Page->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}

	public function admin_edit($id){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Page->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Page->locale = 'en';
		}else{
			$this->Page->locale = 'ru';
		}

		if(is_null($id) || !(int)$id || !$this->Page->exists($id)){
			throw new NotFoundException('Not found...');
		}
		$data = $this->Page->findById($id);
		if(!$id){
			throw new NotFoundException('Not found...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Page->id = $id;
			$data1 = $this->request->data['Page'];
			if(!isset($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->Page->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$title_for_layout = 'Editing material';
			$this->set(compact('id', 'data', 'title_for_layout'));
		}
	}
public function admin_delete($id){
		if (!$this->Page->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Page->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function contactus(){

		if( !empty($this->request->data) ){
			$email = new CakeEmail('smtp');
			$email->from(array('info@uxui.kz' => 'Usability Lab'))
			->to('info@uxui.kz')
			->subject('New letter');
			$message = 'Name: '. $this->request->data['Page']['name'] . ' Телефон: '. $this->request->data['Page']['phone'];
			if( $email->send($message) ){
				$this->Session->setFlash('Письмо успешно отправлено', 'default', array(), 'good');
				//unset($message);
				// return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка!', 'default', array(), 'bad');
				return $this->redirect($this->referer());
			}
		}
	}
	public function callback(){
		if($this->request->is(array('post', 'put'))){
			$data = $this->request->data['Callback'];
				
				// die;
			// $email = new CakeEmail('smtp');
			// $email->from(array('st-kotel.kz@yandex.ru' => 'realklimat.kz'))
			// // ->to('nurzhananuarbek@mail.ru')
			// ->to('nurzhananuarbek@mail.ru')
			// ->subject('realklimat.kz');
			
			// $message = "<p>Заявка</p>";
			// if(isset($_POST['name']) && !empty($_POST['name'])){
			// 	$message .= "<p>ФИО: " . $_POST['name'] . "</p>";
			// }
			// if(isset($_POST['phone']) && !empty($_POST['phone'])){
			// 	$message .= "<p>Телефон: " . $_POST['phone'] . "</p>";
			// }
			// if(isset($_POST['email']) && !empty($_POST['email'])){
			// 	$message .= "<p>Почта: " . $_POST['email'] . "</p>";
			// }
		
			// if(isset($_POST['body']) && !empty($_POST['body'])){
			// 	$message .= "<p>Текст: " . $_POST['body'] . "</p>";
			// }
		
			// // debug($message);die;
			// $email->viewVars(array('content' => $message));
			// $email->template('welcome','default');
			// $email->emailFormat('html');
			$query = "INSERT INTO callbacks (fio,mail,created) VALUES('".$data['fio']."','".$data['mail']."',CURRENT_TIMESTAMP)";
			$this->Page->query($query);
			// $this->bitrix($data['name'], $data['phone'],$data['email'],$data['body']);
			$this->Session->setFlash('Спасибо за заявку', 'default', array(), 'good');
					return $this->redirect("/");
			// if($email->send($message) ){
			// 		$this->Session->setFlash('Спасибо за заявку', 'default', array(), 'good');
			// 		// $_SESSION['Message']['test'] = '123';
			// 		return $this->redirect("/?status=1");
			// }else{
			// 	$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
				
			// }
		}
	}

	
}
