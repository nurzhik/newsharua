     <section class="section cabinet-section">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href=""> Главная </a></li>
                <li><a href=""> Личный кабинет </a></li>
            </ul>
            <div class="title">Личный кабинет</div>
            <div class="cabinet-block">
               <?=$this->element('sidebar') ?>

                <div class="links-body">
                    <div class="links-title-block">
                        <div class="links-title">Новость</div>
                    </div>
                    <div class="links-content links-content--left">
                        <div class="cab_content_body">
                            <div class="news-inner">
                                <div class="news-inner__img">
                                    <img src="/img/news/<?=$data['News']['img']?>">
                                </div>
                                <h1 class="news-inner__heading"><?=$data['News']['title']?></h1>    
                                <?=$data['News']['body']?>
                                <div class="ya-share2" data-curtain data-size="l" data-shape="round" data-services="vkontakte,facebook,telegram,whatsapp"></div>
                                <script src="https://yastatic.net/share2/share.js"></script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
