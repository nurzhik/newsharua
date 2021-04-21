<section class="page">
	<div class="container">
		<div class="title title_left">Партнерам</div>
		<!-- <div class="title title_left title_mt">О сервисе</div> -->
		<div class="about about_reverse">
			<div class="about_video">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$page['Setting']['partner_video']?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<!-- <div class="partners_advan">
				<div class="part_advan">
					<div class="part_advan_img">
						<img src="img/part_advan_1.png" alt="">
					</div>
					<div class="part_advan_text">-	полностью свободный график и режим работы.</div>
				</div>
				<div class="part_advan">
					<div class="part_advan_img">
						<img src="img/part_advan_2.png" alt="">
					</div>
					<div class="part_advan_text">-	наработка постоянной клиентуры врача консультанта.</div>
				</div>
				<div class="part_advan">
					<div class="part_advan_img">
						<img src="img/part_advan_3.png" alt="">
					</div>
					<div class="part_advan_text">-	возможность зарабатывать.</div>
				</div>
			</div> -->
			<div class="about_text">
				<div class="title title_left"><?=$page['Setting']['partner_title']?></div>
				<div class="text_item">
					<?=$page['Setting']['partner_text']?>
				</div>
				<a class="yellow_btn about_btn" href="/<?=$lang?>users/docregistration">Регистрация врача</a>
			</div>
		</div>
	</div>
</section>

<section class="gray">
	<div class="container">
		<div class="title">Как стать консультантом ONTER?</div>
		<div class="part_steps_list">
			<?php foreach ($advantages as $item): ?>
				<div class="part_step">
					<div class="part_step_img">
						<img src="/img/advantages/<?=$item['Advantage']['img']?>" alt="">
					</div>
					<div class="part_step_text">
						<div class="part_step_name"><?=$item['Advantage']['title']?></div>
						<div class="text_item"><?=$item['Advantage']['body']?> </div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="title">Отзывы врачей о сервисе</div>
		<div class="comment_block">
			<div class="comment">
				<div class="comment_text">
					<div class="comment_text_slider">
						<?php foreach ($reviews as $item): ?>
							<div>
								<div class="comment_text_item">
									<div class="comment_text_img">
										<div class="comment_img_item">
											<img src="/img/reviews/<?=$item['Review']['img']?>" alt="">
										</div>
									</div>
									<div class="comment_text_right">
										<div class="comment_text_head">
											<div class="comment_doctor"><?=$item['Review']['position']?></div>
											<div class="comment_name"><?=$item['Review']['title']?></div>
										</div>
										<div class="text_item">
											<?=$item['Review']['body']?>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach ?>
						
					</div>
					<div class="comment_control">
						<div class="comment_arrows"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="gray">
	<div class="container">
		<div class="title">Поделиться в социальных сетях</div>
		<div class="page_share">
			<div class="share_list">
				<a class="share_link telegram_share" href="javascript:;" rel="nofollow noopener" target="_blank" title="Telegram">
					<div class="share_img">
						<img src="img/telegram.svg" alt="">
					</div>
					<div class="share_text">Telegram</div>
				</a>
				<a class="share_link wp_share" href="javascript:;" rel="nofollow noopener" target="_blank" title="WhatsApp">
					<div class="share_img">
						<img src="img/whatsapp.svg" alt="">
					</div>
					<div class="share_text">WhatsApp</div>
				</a>
				<a class="share_link vk_share" href="javascript:;" rel="nofollow noopener" target="_blank" title="ВКонтакте">
					<div class="share_img">
						<img src="img/vk.svg" alt="">
					</div>
					<div class="share_text">VKontakte</div>
				</a>
				<a class="share_link facebook_share" href="javascript:;" rel="nofollow noopener" target="_blank" title="Facebook">
					<div class="share_img">
						<img src="img/facebook_white.svg" alt="">
					</div>
					<div class="share_text">Facebook</div>
				</a>
			</div>
			<script src="https://yastatic.net/share2/share.js"></script>
			<div class="ya-share2" data-curtain data-services="vkontakte,facebook,telegram,whatsapp"></div>
		</div>
	</div>
</section>