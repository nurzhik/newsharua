<section class="section cabinet-section">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href=""> Главная </a></li>
                <li><a href=""> Личный кабинет </a></li>
            </ul>
            <div class="title">Личный кабинет</div>
            <div class="cabinet-block">
                <?php echo $this->element('sidebar') ?>
                <div class="links-body">
                    <div class="links-title-block">
                        <div class="links-title">Cообщения</div>
                    </div>
                    <div class="links-content links-content--left">
                    	<?php if($userLogin['User']['active'] == 'activate'): ?>
	                    <div class="cab_content_body">
							<div class="chat">
								<div class="chat_body">
									<?php foreach($messages as $item): ?>
									<div class="chat_item chat_item_<?=($item['User']['role'] == 'user') ? 'left': 'right'?>">
										<div class="chat_item_top">
											<div class="chat_item_name"><?=$item['User']['fio']?></div>
											<div class="chat_item_date"><?php echo $this->Time->format($item['Dialog']['created'], '%d.%m.%Y', '-'); ?></div>
										</div>
										<div class="chat_item_text">
											<p><?=$item['Message']['body']?></p>
										</div>
									</div>
									<?php endforeach ?>
								</div>
									<form class="chat_bottom" action="/<?=$lang?>dialogs/add_message" method="POST">
										<!-- <input  type="text" name=""> -->
										<textarea placeholder="Ваше сообщение" name="data[Dialog][body]" class="chat_message" rows="1" cols="5"></textarea>
										<input type="hidden" value="<?=$user_id?>" name="data[Dialog][user_id]">
										<input type="hidden" value="<?=$id?>" name="data[Dialog][id]">
										<button class="chat_send_btn" type="submit">Отправить</button>
									</form>
							</div>
						</div>
						 <?php else: ?>
                          Ваш личный кабинет находится на рассмотрении у администратора. Чтобы личный кабинет был у вас доступен, администратор должен вас одобрить
                      <?php endif ?>
					</div>

                </div>
            </div>
        </div>
    </section>