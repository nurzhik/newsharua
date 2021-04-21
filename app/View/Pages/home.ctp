<section class="main">
    <div class="main-block">
        <?php foreach ($slides as $item): ?>
            <div class="main__item">
                <div class="container">
                    <div class="main__title"><?=$item['Slide']['title']?></div>
                    <!-- <div class="main-advent">
                        <div class="m-advent__item">
                            <span class="m-ad-digits">3 <div class="bg-top"></div></span>
                            <div class="m-right width-1">
                                года окупаемость
                            </div>
                        </div>

                        <div class="m-advent__item">
                            <span class="m-ad-digits">1,2 <div class="bg-top"></div></span>
                            <div class="m-right width-2">
                                млн. тенге доход за первые 2 года
                            </div>
                        </div>

                        <div class="m-advent__item">
                            <span class="m-ad-digits">706 <div class="bg-top"></div></span>
                            <div class="m-right width-3">
                                млн. тенге прибыль за первые 2 года
                            </div>
                        </div>
                    </div> -->
                    <a data-fancybox="" data-src="#zayavka" href="javascript:;" class="button"> Оставить заявку </a>
                </div>
                <img class="main-img-bg" src="/img/slides/<?=$item['Slide']['img']?>" alt="">
                <div class="bg-white-m"></div>
            </div>
        <?php endforeach ?>
        </div>
    </section>
    <section class="section about-advent">  
        <div class="container">
            <div class="about-block">
                <div class="about-left">
                    <div class="title"><?=$page['Setting']['about_title_'.$l]?></div>
                    <div class="text_p">
                       <?=$page['Setting']['about_desc_'.$l]?>
                    </div>
                    <a href="/<?=$lang?>about" class="button"> подробнее о компании </a>
                </div>

                <div class="about-right">
                    <img src="/img/img-min.jpg" alt="">
                </div>
            </div>

            <div class="advent-block">
                <div class="title">преимущества</div>
                <div class="adventages">
                    <?php foreach ($advantages as $item): ?>
                        <div class="adventages__item">
                        	<div class="adventages-img">
                        		<img  src="/img/advantages/<?=$item['Advantage']['img']?>" alt="">
                        	</div>
                            <div class="adventages__title"><?=$item['Advantage']['title']?></div>
                            <div class="adventages__p"><?=$item['Advantage']['body']?></div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </section>

    <section class="section main-news-partner">
        <div class="container">
            <div class="title">новости кооператива</div>
            <?php if(!empty($news)): ?>
                <div class="main-news-block">
                    <div class="main-news__item">
                        <a href="/<?=$lang?>news/view/<?=$news[0]['News']['id']?>" class="main-news-img">
                            <img src="/img/news/<?=$news[0]['News']['img']?>" alt="">
                        </a>
                        <div class="main-news-bot">
                            <a href="#" class="main-news__title"><?=$news[0]['News']['title']?></a>
                            <div class="main-news-p">
                               <?=$news[0]['News']['short_text']?>
                            </div>

                            <a href="/<?=$lang?>news/view/<?=$news[0]['News']['id']?>" class="more-news-link">Читать новость полностью  <span class="news-arrow"></span> </a>
                        </div>
                    </div>

                    <div class="main-news__item">
                        <a href="/<?=$lang?>news/view/<?=$news[1]['News']['id']?>" class="main-news-img">
                            <img src="/img/news/<?=$news[1]['News']['img']?>" alt="">
                        </a>
                        <div class="main-news-bot">
                            <a href="#" class="main-news__title"><?=$news[1]['News']['title']?></a>
                            <div class="main-news-p">
                              <?=$news[1]['News']['short_text']?>
                            </div>
                            <a href="/<?=$lang?>news/view/<?=$news[1]['News']['id']?>" class="more-news-link">Читать новость полностью  <span class="news-arrow"></span> </a>
                        </div>
                    </div>

                    <div class="main-news__item">
                        <a href="/<?=$lang?>news/view/<?=$news[2]['News']['id']?>" class="main-news-img">
                            <img src="/img/news/<?=$news[2]['News']['img']?>" alt="">
                        </a>
                        <div class="main-news-bot">
                            <a href="#" class="main-news__title"><?=$news[2]['News']['title']?></a>
                            <div class="main-news-p">
                                <?=$news[2]['News']['short_text']?>
                            </div>
                            <a href="/<?=$lang?>news/view/<?=$news[2]['News']['id']?>" class="more-news-link">Читать новость полностью  <span class="news-arrow"></span> </a>
                        </div>
                    </div>

                    <div class="main-news__item">
                        <a href="/<?=$lang?>news/view/<?=$news[3]['News']['id']?>" class="main-news-img">
                            <img src="/img/news/<?=$news[3]['News']['img']?>" alt="">
                        </a>
                        <div class="main-news-bot">
                            <a href="#" class="main-news__title"><?=$news[3]['News']['title']?></a>
                            <div class="main-news-p">
                              <?=$news[3]['News']['short_text']?>
                            </div>
                            <a href="/<?=$lang?>news/view/<?=$news[3]['News']['id']?>" class="more-news-link">Читать новость полностью  <span class="news-arrow"></span> </a>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <div class="partners">
                <div class="title"> наши партнеры </div>

                <div class="partner-block">
                    <?php foreach ($partners as $item): ?>
                        <a class="partner__item" href="<?=$item['Partner']['link']?>">
                            <img src="/img/partners/<?=$item['Partner']['img']?>" alt="">
                        </a>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </section>


