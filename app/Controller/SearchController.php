<?php 

class SearchController extends AppController{
	public $uses = array('Page', 'News', 'Event', 'Album', 'Video', 'Audio');

	public function index(){
		if(isset($this->request->query['q']) && !empty($this->request->query['q'])){
			$q = $this->request->query['q'];
			// $this->News->locale = 'kz';
			
			$l = Configure::read('Config.language');
			$this->News->locale = $l;
			
			
			// $res['News'] = $this->News->find('all', array(
			// 	'conditions' => array(
			// 	'OR' => array(
			// 		'News.title LIKE ' => '%'.$q.'%',
			// 		'News.body LIKE' => '%'.$q.'%',
			// 		)),
			// 	'limit' => 20,
			// 	'order' => array('News.date' => 'DESC')
			// 	));
			// $res['Event'] = $this->Event->find('all', array(
			// 	'conditions' => array(
			// 	'OR' => array(
			// 		'Event.title LIKE ' => '%'.$q.'%',
			// 		'Event.body LIKE ' => '%'.$q.'%',
			// 		)),
			// 	'limit' => 20,
			// 	'order' => array('Event.date' => 'DESC')
			// 	));
			// $res['Album'] = $this->Album->find('all', array(
			// 	'conditions' => array(
			// 		'Album.title LIKE' => '%'.$q.'%',
			// 		),
			// 	'limit' => 20,
				
			// 	));
		
			$res['News'] = $this->Page->query('SELECT * FROM i18n WHERE i18n.model="News" AND i18n.locale="'.$l.'" AND i18n.content LIKE "%'.$q.'%" AND (`field` LIKE "title" OR `field` LIKE "body") GROUP BY foreign_key');
  			$res['Project'] = $this->Page->query('SELECT * FROM i18n WHERE i18n.model="Project" AND i18n.locale="'.$l.'" AND i18n.content LIKE "%'.$q.'%" AND (`field` LIKE "title" OR `field` LIKE "body") GROUP BY foreign_key');
  
			
		
		
			// $res['News'] = $this->News->query('SELECT * FROM `news` WHERE `title` LIKE "%'.$q.'%" OR `body` LIKE "%'.$q.'%" OR `tags` LIKE "%'.$q.'%"');
			// $res['Article'] = $this->Article->query('SELECT * FROM `articles` WHERE `title` LIKE "%'.$q.'%" OR `body` LIKE "%'.$q.'%" OR `tags` LIKE "%'.$q.'%"');
			// $res['Question'] = $this->Question->query('SELECT * FROM `questions` WHERE `title` LIKE "%'.$q.'%" OR `body` LIKE "%'.$q.'%" OR `tags` LIKE "%'.$q.'%"');
			// $res['Video'] = $this->Page->query('SELECT * FROM `videos` WHERE `title` LIKE "%'.$q.'%" OR `body` LIKE "%'.$q.'%" OR `tags` LIKE "%'.$q.'%"');
			// $res['Audio'] = $this->Page->query('SELECT * FROM `audios` WHERE `title` LIKE "%'.$q.'%" OR `body` LIKE "%'.$q.'%" OR `tags` LIKE "%'.$q.'%" AND `parent_id`=0');

			// debug($t);
			// die;
			// $res = $this->Page->query('SELECT * FROM i18n WHERE ( i18n.model="Page" || i18n.model="News" || i18n.model="Article" ||  i18n.model="Question" || i18n.model="Gallery" || i18n.model="Audio" || i18n.model="Video" || i18n.model="Library") AND i18n.field="title" AND i18n.content LIKE "%'.$q.'%"');
			//$res = $this->Page->query('SELECT * FROM i18n WHERE i18n.field="title" OR i18n.content LIKE "%'.$q.'%"');
			// $res = $this->_unique($res);
			$nr = array();
			$res_count = count($res['News']) + count($res['Project']);
			
			// debug($res);die;
			// die;

		}else{
			$res = __('Введите запрос...');
		}
		$title_for_layout = __('Поиск');
		$this->set(compact('res', 'title_for_layout', 'q', 'res_count'));
	}

	protected function _unique($array){
		if(is_array($array)){
			foreach ($array as $item) {
				$list[] = $item['i18n']['foreign_key'].$item['i18n']['model'];
			}
			return $list;
		}else{
			return 'Ошибка';
		}
	}
}