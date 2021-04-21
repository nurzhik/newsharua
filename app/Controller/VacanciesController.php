<?php
App::uses('CakeEmail', 'Network/Email');
class VacanciesController extends AppController{

	public $uses = array('Vacancy', 'City');

	public function admin_index(){
		$this->Vacancy->locale = array('en', 'kz');
		$this->Vacancy->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Vacancy->find('all');
		// $cities = $this->City->find('all');
		// foreach($cities as $item){
		// 	$city[$item['City']['id']] = $item['City'];
		// }
		$title_for_layout = __('Вакансии');
		$this->set(compact('data', 'title_for_layout', 'city'));
	}

	public function index(){
		$this->Vacancy->locale = Configure::read('Config.language');
		$data = $this->Vacancy->find('all');
		$cities = $this->City->find('all');
	
		// $partners = $this->Partner->find('all', array(
		// 	'order' => array('Partner.id' => 'desc')
		// ));
		// $about = $data['Vacancy'];
		// debug($data);
		$title_for_layout = __('Вакансии');
		// $meta['keywords'] = $data['Vacancy']['keywords'];
		// $meta['description'] = $data['Vacancy']['description'];
		$this->set(compact('title_for_layout','cities','data'));
	}
	public function admin_add(){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Vacancy->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Vacancy->locale = 'en';
		}else{
			$this->Vacancy->locale = 'ru';
		}
		if($this->request->is('post')){
			$this->Vacancy->create();
			$data = $this->request->data['Vacancy'];
			
			// $files_array = array('img' => $data['img'],'block_img'=>$data['block_img']);
			// foreach($files_array as $key => $v){
			// 	unset($data[$key]);
			// }
			// foreach ($files_array as $key => $value) {
			// 	$img_name = $this->uploadFile($value);
			// 	if($img_name) {
			// 		$this->Vacancy->saveField($key, $img_name);
			// 	}
			// }
			if($this->Vacancy->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		// $cities = $this->City->find('all');
		// $this->set(compact('cities'));
	}
	public function admin_edit($id){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Vacancy->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Vacancy->locale = 'en';
		}else{
			$this->Vacancy->locale = 'ru';
		}
		if(is_null($id) || !(int)$id || !$this->Vacancy->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Vacancy->findById($id);
		if(!$data){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Vacancy->id = $id;
			$data1 = $this->request->data['Vacancy'];
			// $files_array = array('img' => $data1['img'],'block_img'=>$data1['block_img']);
			// foreach($files_array as $key => $v){
			// 	unset($data1[$key]);
			// }
			// foreach ($files_array as $key => $value) {
			// 	$img_name = $this->uploadFile($value);
			// 	if($img_name) {
			// 		$this->Vacancy->saveField($key, $img_name);
			// 	}
			// }
			if($this->Vacancy->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$cities = $this->City->find('all');
			$this->set(compact('id', 'data', 'cities'));
		}
	}
	public function uploadFile($file = array()){
		// debug($file);die;
		if(!is_uploaded_file($file['tmp_name'])){
			return false;
		}
		$ext = strtolower(preg_replace("#.+\.([a-z]+)$#", "$1", $file['name']));
		$fileName = $this->genNameFile($ext);
		$path = WWW_ROOT . 'img/abouts/' . $fileName;
		if(!move_uploaded_file($file['tmp_name'], $path)){
			return false;
		}
		// debug($fileName);die;
		return $fileName;
	}

	public function genNameFile($ext){
		$name = md5(microtime()) . ".{$ext}";
		if(is_file(WWW_ROOT . 'img/abouts/' . $name)){
			$name = $this->genNameFile($ext);
		}
		return $name;
	}
	// public function admin_add(){
	// 	if($this->request->is('post')){
	// 		$this->Vacancy->create();
	// 		$data = $this->request->data['Vacancy'];
	// 		/*ws begin*/
	// 		if($data["imgsource"]){
	// 			$getmime = getimagesize(WWW_ROOT . trim($data["imgsource"], '/'));
	// 			$r = explode("/",  $data["imgsource"]);
	// 			$file= end($r);

	// 			$data["img"]= array(
	// 				"name"=> $file,
	// 				"tmp_name" => WWW_ROOT . trim($data["imgsource"], '/'),
	// 				"error"=> 0,
	// 				"mime"=>$getmime['mime'],
	// 				"size"=>filesize (WWW_ROOT . trim($data["imgsource"], '/'))
	// 			);
	// 			if(empty($data['img']['name']) || !$data['img']['name']){
	// 				unset($data['img']);
	// 			}

	// 			if($this->Vacancy->save($data)){
	// 				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
	// 				// debug($data);
	// 				return $this->redirect($this->referer());
	// 			}else{
	// 				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
	// 			}
	// 			}else{
	// 				$this->Session->setFlash('Ошибка! Выберите файл и обрежте его (зеленая кнопка)', 'default', array(), 'bad');
	// 			}
	// 			/*ws end*/
	// 		}
		
	// 	$title_for_layout = 'Добавление нового материала';
	// 	$this->set(compact('title_for_layout'));
	// }

	// public function admin_edit($id){
	// 	if(is_null($id) || !(int)$id || !$this->Vacancy->exists($id)){
	// 		throw new NotFoundException('Not found...');
	// 	}
	// 	$data = $this->Vacancy->findById($id);
	
	// 	if(!$id){
	// 		throw new NotFoundException('Not found...');
	// 	}
	// 	if($this->request->is(array('post', 'put'))){
	// 		$this->Vacancy->id = $id;
	// 		$data1 = $this->request->data['Vacancy'];
	// 		/*ws begin*/
	// 		if(isset($data1['imgsource']) && !empty($data1['imgsource'])){
	// 			$getmime = getimagesize(WWW_ROOT . trim($data1["imgsource"], '/'));
	// 			// $file= end(explode("/",  $data1["imgsource"]));
	// 			$r = explode("/",  $data1["imgsource"]);
	// 			$file= end($r);
	// 			$data1["img"]= array(
	// 				"name"=> $file,
	// 				"tmp_name" => WWW_ROOT . trim($data1["imgsource"], '/'),
	// 				"error"=> 0,
	// 				"mime"=>$getmime['mime'],
	// 				"size"=>filesize (WWW_ROOT . trim($data1["imgsource"], '/'))
	// 			);
	// 		}
	// 		/*ws end*/
	// 		if(!isset($data1['img']['name']) || !$data1['img']['name']){
	// 			unset($data1['img']);
	// 		}
	// 		if($this->Vacancy->save($data1)){
	// 			$this->Session->setFlash('Сохранено', 'default', array(), 'good');
	// 			return $this->redirect($this->referer());
	// 		}else{
	// 			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
	// 		}
	// 	}
	// 	//Заполняем данные в форме
	// 	if(!$this->request->data){
	// 		$this->request->data = $data;
	// 		$title_for_layout = 'Редактирование материала';
	// 		$this->set(compact('id', 'data', 'title_for_layout'));
	// 	}
	// }

	public function admin_delete($id){
		if (!$this->Vacancy->exists($id)) {
			throw new NotFounddException('This material is not');
		}
		if($this->Vacancy->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function send(){
		
	
		$this->autoRender = false;
		if($this->request->is(array('post', 'put'))){
			$data = $this->request->data['Vacancy'];

			$img_name = $this->customUploadDoc($data['file']);
				// die;
			$email = new CakeEmail('smtp');
			$mail = array('office@kazchem.kz', 'assistant@kazchem.kz');
			$email->from(array('info@kazchem.kz' => 'kazchem.kz'))
			->to($mail)
			->subject('Новое письмо с сайта kazchem.kz');
			$message = '<p> ФИО: ' . $data['name'] ."<br>". 
			'Вакансия: ' . $data['vacancy'] ."<br>". 
			'Контактный телефон: ' . $data['phone'] ."<br>". 
			'Электронная почта: ' . $data['email']."<br>". 
 			'Резюме: ' . ' <a href="https://kazchem.kz/files/vacancies/'.$img_name .'">Скачать резюме</a></p>'."<br>";
 			$email->viewVars(array('content' => $message));
			$email->template('welcome','default');
			$email->emailFormat('html');
 			
		
			
			if($email->send($message)){
				$this->Session->setFlash('Спасибо ваша заявка принята! <br>', 'default', array(), 'good');
				return $this->redirect("/");
				
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		
	}
	public function customUploadDoc($file = array()){
		if(!is_uploaded_file($file['tmp_name'])){
			return false;
		}
		$ext = strtolower(preg_replace("#.+\.([a-z]+)$#", "$1", $file['name']));
		$fileName = $this->genNameFileMail($ext);
		$path = WWW_ROOT . 'files/vacancies/' . $fileName;
		if(!move_uploaded_file($file['tmp_name'], $path)){
			return false;
		}
		return $fileName;
	}

	public function genNameFileMail($ext){
		$name = md5(microtime()) . ".{$ext}";
		if(is_file(WWW_ROOT . 'files/vacancies/' . $name)){
			$name = $this->genNameFileMail($ext);
		}
		return $name;
	}
}