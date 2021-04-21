
<section class="page gray">
    <div class="container">
        <div class="title title_left"><?=$data['News']['title']?></div>
        <div class="news_inner">
            <div class="news_inner_content">
                <div class="news_inner_img">
                    <img src="/img/news/<?=$data['News']['img']?>" alt="">
                </div>
                <div class="text_item">
                    <?=$data['News']['short_desc']?>
                    <?=$data['News']['body']?>
                </div>
                <div class="news_share">
                    <div class="news_share_text">Поделиться</div>
                    <script src="https://yastatic.net/share2/share.js"></script>
                    <div class="ya-share2" data-curtain data-services="vkontakte,facebook,telegram,whatsapp"></div>
                </div>
            </div>
            <div class="news_inner_sidebar">
                <div class="sidebar_news">
                    <?php foreach ($other_news as $item):?>
                        <div class="news_item">
                            <a class="news_img" href="/<?=$lang?>news/view/<?=$item['News']['id']?>">
                                <img src="/img/news/<?=$item['News']['img']?>" alt="">
                            </a>
                            <div class="news_text">
                                <div class="news_type"><?php echo $this->Common->get_category($item['News']['category_id']);?> </div>
                                <a class="news_name" href="/<?=$lang?>news/view/<?=$item['News']['id']?>">      <?php echo $item['News']['title']; ?>
                                </a>
                                <div class="text_item">
                                    <?php echo $item['News']['short_text']; ?>
                                </div>
                                <a class="news_more" href="/<?=$lang?>news/view/<?=$item['News']['id']?>"><?=__('Подробнее')?></a>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <div class="title title_left">Другие новости</div>
        <div class="news news_inner_list">
            <?php foreach ($other_news as $item):?>
                <div class="news_item">
                    <a class="news_img" href="/<?=$lang?>news/view/<?=$item['News']['id']?>">
                        <img src="/img/news/<?=$item['News']['img']?>" alt="">
                    </a>
                    <div class="news_text">
                        <div class="news_type"><?php echo $this->Common->get_category($item['News']['category_id']);?> </div>
                        <a class="news_name" href="/<?=$lang?>news/view/<?=$item['News']['id']?>">      <?php echo $item['News']['title']; ?>
                        </a>
                        <div class="text_item">
                            <?php echo $item['News']['short_text']; ?>
                        </div>
                        <a class="news_more" href="/<?=$lang?>news/view/<?=$item['News']['id']?>"><?=__('Подробнее')?></a>
                    </div>
                </div>
            <?php endforeach ?>
            
            <!--  -->
        </div>
    </div>
</section>
