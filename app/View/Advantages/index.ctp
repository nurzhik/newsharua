<section class="page full_section">
    <div class="container">
        <div class="title title_left">Вопросы и ответы</div>
        <div class="faq">
            <?php foreach ($data as $item):?>
                <div class="faq_item">
                    <div class="faq_question"><?php echo $item['Faq']['title']; ?></div>
                    <div class="faq_answer">
                        <div class="text_item">
                            <?php echo $item['Faq']['body']; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            
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
