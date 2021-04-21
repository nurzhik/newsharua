<section class="content">
	<div class="content-header">
		<h1>Мои сообщения</h1>
	</div>
	<div class="card card-primary">
		<div class="card-header">Данные</div>
		<div class="card-body">			
			<div class="set_block chat_block">
				<div class="set_body">
					<div class="admin-chat-body">
						<?php foreach($messages as $item): ?>
							<?php if($item['User']['role'] == 'user'): ?>
								<div class="admin-chat-item">
							<?php else: ?>
								
								<div class="admin-chat-item admin-chat-item--admin">
							<?php endif; ?>
									<?php $user = $this->Common->get_user($item['Message']['user_id']); ?>
									<p><b><?=$user['User']['fio']?></b></p>
									<p><?=$item['Message']['body']?></p>
									<div class="chat_time"><?php echo $this->Time->format($item['Message']['created'], '%H:%M', 'invalid') ?></div>
									<div class="chat_time" style="display: none;"><?php echo $this->Time->format($item['Message']['created'], '%d-%m-%Y %H:%M', 'invalid') ?></div>	
								</div>
							<?php endforeach ?>
						</div>
					</div>	
				</div>
				<form class="form-massage" action="/<?=$lang?>dialogs/add_message" method="POST">
					<div>
					<textarea placeholder="Текст ответа" name="data[Dialog][body]" class="chat_message" rows="1" cols="5"></textarea>
					</div>
					<input type="hidden" value="1" name="data[Dialog][user_id]">
					<input type="hidden" value="<?=$id?>" name="data[Dialog][id]">
					<button class="btn btn-success" type="submit">Отправить</button>
				</form>
			</div>
			
		</div>		
	</div>
</section>
<style>
	.admin-chat-item{
		margin-bottom:20px;
		border-bottom:1px solid #ccc;
	}
	.admin-chat-item p{
		margin-bottom:3px;
	}
</style>