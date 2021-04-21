<section class="section news-section-inner">
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href="/<?=$lang?>">Главная</a></li>
            <li><a href="/<?=$lang?>projects">Проекты</a></li>
            <li><span><?=$data['Project']['title']?></span></li>
        </ul>

        <div class="news-section-inner">
            <div class="title"><?=$data['Project']['title']?></div>
           
            <div class="news-inner-block">
                <div class="left-news">
                    <?php if($data['Project']['img']): ?>
                        <img class="news-inner__img" src="/img/projects/<?=$data['Project']['img']?>" alt="<?=$data['Project']['title']?>">
                    <?php endif ?>
                    <div class="left-news-block">
                        <div class="share">  
                            <script src="https://yastatic.net/share2/share.js"></script>
                            <div class="ya-share2" data-curtain data-size="l" data-shape="round" data-services="vkontakte,facebook,telegram,whatsapp"></div>
                        </div>
                        <div class="news-content">
                            <?=$data['Project']['body']?>
                        </div>
                    </div>
                </div>

                <div class="right-news">
                    <div class="news-r-title">Другие проекты</div>
                    <div class="other-news">
                        <?php foreach($other_news as $item): ?>
                        <div class="item-other-news__item">
                            <img class="other-news__img" src="/img/projects/thumbs/<?=$item['Project']['img']?>" alt="<?=$item['Project']['title']?>">
                            <div class="right-other">
                                <div class="title-other"><?=$item['Project']['title']?></div>
                                <a class="other-more" href="/<?=$lang?>projects/view/<?=$item['Project']['id']?>">Подробное</a>
                            </div>
                        </div>
                    <?php endforeach ?>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>