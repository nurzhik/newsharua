<section class="section news-section-inner">
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href="/<?=$lang?>"> <?=__('Главная')?> </a></li>
            <li><a href="/<?=$lang?>news"> <?=__('Новости')?></a></li>
        </ul>
        <div class="news-section-inner">
            <div class="title"><?=$data['News']['title']?></div>
            <div class="left-news">
                    <div class="news__text"> <?=$data['News']['short_text']?> </div>
            </div>
            <div class="news-inner-block">
                <div class="left-news">
                    <img  src="/img/news/<?=$data['News']['img']?>" alt="">
                    <div class="left-news-block">
                        <div class="share">  
                            <script src="https://yastatic.net/share2/share.js"></script>
                            <div class="ya-share2" data-curtain data-size="l" data-shape="round" data-services="vkontakte,facebook,telegram,whatsapp"></div>
                        </div>
                        <div class="news-content">
                            <?=$data['News']['body']?>
                        </div>
                    </div>
                </div>
                <div class="right-news">
                    <div class="news-r-title"><?=__('Другие новости')?></div>
                    <div class="other-news">
                        <?php foreach ($other_news as $item): ?>
                            <div class="item-other-news__item">
                                <img class="other-news__img" src="/img/news/<?=$item['News']['img']?>" alt="">
                                <div class="right-other">
                                    <div class="title-other"><?=$item['News']['title']?></div>
                                    <a class="other-more" href="/<?=$lang?>news/view/<?=$item['News']['id']?>"><?=__('Читать новость полностью')?></a>
                                </div>
                            </div>
                        <?php endforeach ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

