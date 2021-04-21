<?php

class AlbumsController extends AppController{
	public $uses = array('Category', 'Album','Gallery');
	public $components = array('Paginator');
	public function admin_index(){
		$this->Album->locale = array('en', 'kz');
		$this->Album->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Album->find('all', array(
			'order' => array('id' => 'desc')
		));
		
		$this->set(compact('data'));
	}

	public function admin_add(){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Album->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Album->locale = 'en';
		}else{
			$this->Album->locale = 'ru';
		}
	
		if($this->request->is('post')){
			$this->Album->create();

			
			$data = $this->request->data['Album'];
			if(!$data['img']['name']){
			 	unset($data['img']);
			}
		
			
			if($this->Album->save($data)){
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
			$this->Album->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Album->locale = 'en';
		}else{
			$this->Album->locale = 'ru';
		}
		
		if(is_null($id) || !(int)$id || !$this->Album->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Album->findById($id);
		
		if($this->request->is(array('post', 'put'))){
			$this->Album->id = $id;
			$data1 = $this->request->data['Album'];
			
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			
			if($this->Album->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$images = $this->Gallery->find('all', array(
			'conditions' => array('Gallery.album_id' =>$id)
		));
			$this->set(compact('id', 'data','images'));
		}
	}
	public function admin_addimage(){
		$this->autoRender = false;
		if($this->request->is('post')){

			$data = $this->request->data['Gallery'];
			
			$video_link = $data['video'];
			$album_id = $data['album_id'];
			$img_name = $this->customUploadImg($data['img']);
			
			$q = "INSERT INTO galleries (video,img,album_id ) VALUES ('".$video_link."' ,  '".$img_name."',  '".$album_id."')";
			$this->Gallery->query($q);
			
			$this->Session->setFlash('Сохранено', 'default', array(), 'good');

			return $this->redirect($this->referer());
		}
	}
	public function admin_editimage(){
		if($this->request->is('post')){

			$data = $this->request->data['Gallery'];
			$img_name = $this->customUploadImg($data['img']);
			
			//$player_id = $data['player_id'];
			$id = $data['id'];

			if($img_name) {
				
				$q = "UPDATE galleries SET video='".$data['video']."',img='".$img_name."' WHERE id='{$id}'";
			}else {
				$q = "UPDATE galleries SET video='".$data['video']."' WHERE id='{$id}'";
			}
			

			$this->Gallery->query($q);

			$this->Session->setFlash('Сохранено', 'default', array(), 'good');

			return $this->redirect($this->referer());
		}
	}
	public function admin_deleteimage($id){
		
		if($this->Gallery->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}
	public function customUploadImg($file = array()){
		// debug($file);die;
		if(!is_uploaded_file($file['tmp_name'])){
			return false;
		}
		$ext = strtolower(preg_replace("#.+\.([a-z]+)$#", "$1", $file['name']));
		$fileName = $this->genNameFileImg($ext);
		$path = WWW_ROOT . 'img/galleries/' . $fileName;
		$path_th = WWW_ROOT . 'img/galleries/thumbs/' . $fileName;
		if(!move_uploaded_file($file['tmp_name'], $path)){
			return false;
		}
		$this->resizeImg($path, $path_th, 420, 420, $ext);
		// debug($fileName);die;
		return $fileName;
	}
	public function genNameFileImg($ext){
		$name = md5(microtime()) . ".{$ext}";
		if(is_file(WWW_ROOT . 'img/galleries/' . $name)){
			$name = $this->genNameFileImg($ext);
		}
		return $name;
	}
	public function resizeImg($target, $dest, $wmax = 269, $hmax = 178, $ext){
		/*
		$target - путь к оригинальному файлу
		$dest - путь сохранения обработанного файла
		$wmax - максимальная ширина
		$hmax - максимальная высота
		$ext - расширение файла
		*/
		list($w_orig, $h_orig) = getimagesize($target);
		$ratio = $w_orig / $h_orig; // =1 - квадрат, <1 - альбомная, >1 - книжная

		if(($wmax / $hmax) > $ratio){
			$wmax = $hmax * $ratio;
		}else{
			$hmax = $wmax / $ratio;
		}
		
		$img = "";
		// imagecreatefromjpeg | imagecreatefromgif | imagecreatefrompng
		switch($ext){
			case("gif"):
				$img = imagecreatefromgif($target);
				break;
			case("png"):
				$img = imagecreatefrompng($target);
				break;
			default:
				$img = imagecreatefromjpeg($target);    
		}
		$newImg = imagecreatetruecolor($wmax, $hmax); // создаем оболочку для новой картинки
		
		if($ext == "png"){
			imagesavealpha($newImg, true); // сохранение альфа канала
			$transPng = imagecolorallocatealpha($newImg,0,0,0,127); // добавляем прозрачность
			imagefill($newImg, 0, 0, $transPng); // заливка  
		}
		
		imagecopyresampled($newImg, $img, 0, 0, 0, 0, $wmax, $hmax, $w_orig, $h_orig); // копируем и ресайзим изображение
		switch($ext){
			case("gif"):
				imagegif($newImg, $dest);
				break;
			case("png"):
				imagepng($newImg, $dest);
				break;
			default:
				imagejpeg($newImg, $dest);    
		}
		imagedestroy($newImg);
	}
	public function admin_delete($id){
		if (!$this->Album->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Album->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		$this->Album->locale = Configure::read('Config.language');
		$title_for_layout = 'Новости';
	
		$this->Paginator->settings = array(
		
			'limit' => 12,
		);
		$data = $this->Paginator->paginate('Album');	
		$this->set(compact('data', 'title_for_layout','paginator'));
	}
	

	public function view($id){
		$this->Album->locale = Configure::read('Config.language');
		$data = $this->Album->findById($id);
	
		if(!$data){
			throw new NotFoundException('Такой страницы нет...');
		}
		$this->Paginator->settings = array(
			'conditions' => array('Gallery.album_id' => $id),
			'limit' => 12,
		);
		$galleries = $this->Paginator->paginate('Gallery');	
		//debug($galleries);die;
		$title_for_layout = $data['Album']['title'];
		$meta['keywords'] = $data['Album']['keywords'];
		$meta['description'] = $data['Album']['description'];

		$this->set(compact('data', 'title_for_layout', 'galleries', 'meta'));
	}

	
}