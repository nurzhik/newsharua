<?php
App::uses('CakeEmail', 'Network/Email');

class ChatsController extends AppController {

    public $uses = array('User','Message');
    public function admin_welcome(){
    }
    public function admin_index(){
    }
    public function mysql_datesort($a, $b)
    {
        if ($a == $b) {
            return 0;
        }

        return ($a->date_field < $b->date_field) ? -1 : 1; //custom check here
    }
    public function index(){
        if(!$this->Auth->user() ){
            $lang = $this->Auth->locale = Configure::read('Config.language');
            return $this->redirect('/'.$lang.'/users/login');
        }
        $chat_id = $this->request->query['user'];

        $data = $this->Auth->user();

        $messages_from =$this->Message->find('all', array(
            'conditions' => array(
                array('Message.to_user' => $chat_id),
                array('Message.from_user' =>  $data['id']),

        )));
        $messages_to =$this->Message->find('all', array(
            'conditions' => array(
                array('Message.to_user' => $data['id']),
                array('Message.from_user' => $chat_id),

        )));
        foreach ($messages_from as $item) {
            $message[]= $item;
        }
        foreach ($messages_to as $item) {
            $message[]= $item;
        }
       asort($message);
       // debug($message);die;
        $id = $data['id'];
        $user_id = $data['id'];
        $data = $this->User->find('first', array(
            'conditions' => array('User.id' => $id),
            'recursive' => -1));

        if($data['User']['role'] == 'doctor') {
            $user_to=$this->User->find('first', array(
                'conditions' => array('User.id' => $chat_id),
                'recursive' => -1));
            $users = $this->User->find('all', array(
                'conditions' => array('User.role' => 'user'),
                'recursive' => -1));
        }else{
            $user_to=$this->User->find('first', array(
                'conditions' => array('User.id' => $chat_id),
                'recursive' => 2));
                  
            $users = $this->User->find('all', array(
                'conditions' => array('User.role' => 'doctor'),
                'recursive' => -1));
        }
        
        $this->set(compact('data','user_id','id','users','user_to','chat_id','message'));
    }

    public function sendmessage(){
        $this->autoRender = false;
        if($this->request->is('ajax')){
     
            $data = $this->data;
           
            $q= ("INSERT INTO messages (from_user,to_user,body,created) VALUES('".$data['from']."','".$data['to']."','".$data['text']."',CURRENT_TIMESTAMP)");
           $this->User->query($q);
           return  $data['text'];
           
            
            
        }
    }


     public function send(){
        $this->autoRender = false;
        if($this->request->is('ajax')){
     
            $data = $this->data;
           
           foreach ($_FILES as $key => $value) {
                $img_name = $this->uploadFile($value);
                // if($img_name) {
                //     $this->About->saveField($key, $img_name);
                // }
            }
           return  $img_name;
           
            
            
        }
    }
    public function uploadFile($file = array()){
        // debug($file);die;
        if(!is_uploaded_file($file['tmp_name'])){
            return false;
        }
        $ext = strtolower(preg_replace("#.+\.([a-z]+)$#", "$1", $file['name']));
        $fileName = $this->genNameFile($ext);
        $path = WWW_ROOT . 'files/messages/' . $fileName;
        if(!move_uploaded_file($file['tmp_name'], $path)){
            return false;
        }
        // debug($fileName);die;
        return $fileName;
    }

    public function genNameFile($ext){
        $name = md5(microtime()) . ".{$ext}";
        if(is_file(WWW_ROOT . 'files/messages/' . $name)){
            $name = $this->genNameFile($ext);
        }
        return $name;
    }



}
