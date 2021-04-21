<div class="title admin_t">Добавление пользователя</div>

<div class="model_info">
<?php 
echo $this->Form->create('User', array('type' => 'file'));
//echo $this->Form->input('img', array('label' => '', 'type' => 'file'));
echo $this->Form->input('username', array('label' => 'Логин'));
echo $this->Form->input('password', array('label' => 'Пароль:'));
echo $this->Form->input('password_repeat', array('label' => 'Повторите пароль:'));?>
<input type="hidden" name="data[User][role]"  value="moderator">

<?php

echo $this->Form->input('fio', array('label' => 'ФИО:'));



?>
</div>
<?
echo $this->Form->end('Создать');
?>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>