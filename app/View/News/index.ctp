<section class="section news-section">
    <div class="container">
      
        <ul class="breadcrumbs">
            <li><a href="/<?=$lang?>"> <?=__('Главная')?> </a></li>
            <li><a href="/<?=$lang?>news"> <?=__('Новости')?></a></li>
        </ul>
        <div class="news-block">
            <div class="title"> <?=__('Новости')?></div>
            <div class="news">
                <?php foreach ($data as $item): ?>
                    <div class="main-news__item">
                        <a href="/<?=$lang?>news/view/<?=$item['News']['id']?>" class="main-news-img">
                            <img src="/img/news/<?=$item['News']['img']?>" alt="">
                        </a>
                        <div class="main-news-bot">
                            <a href="/<?=$lang?>news/view/<?=$item['News']['id']?>" class="main-news__title"><?=$item['News']['title']?></a>
                            <div class="main-news-p">
                               <?=$item['News']['short_text']?>
                            </div>
                            <a href="/<?=$lang?>news/view/<?=$item['News']['id']?>" class="more-news-link"> <?=__('Читать новость полностью')?>  <span class="news-arrow"></span> </a>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <?php if($data): ?>
            <div class="pagination">
                <?php if($paginator['start']): ?>
                    <a href="<?=$paginator['link']?>1" class="p_start pag_btn "> << </a>
                <?php endif ?>

                <?php if($paginator['prev']): ?>
                    <a href="<?=$paginator['link']?><?=$paginator['prev']?>" class="p_prev pag_btn"> < </a>
                <?php endif ?>
                <span class="p_pages"><?=__('Страница')?> <?=$paginator['current_page']?> <?=__('из')?> <?=$paginator['count_pages']?></span>
                <?php if($paginator['next']): ?>
                    <a href="<?=$paginator['link']?><?=$paginator['next']?>" class="p_next pag_btn"> > </a>
                <?php endif ?>

                <?php if($paginator['end']): ?>
                    <a href="<?=$paginator['link']?><?=$paginator['count_pages']?>" class="p_end pag_btn "> >> </a>
                <?php endif ?>
            </div>
        <?php endif ?>
     <!--    <div class="pagination">
                            <ul class="pagination-block">
                                <li><a href="#">p</a></li>
                                <li><a href="#">1</a></li>
                                <li class="active-pag"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">n</a></li>
                            </ul>
                        </div> -->
       
    </div>
</section>
