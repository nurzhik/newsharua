<section class="about section">
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href="/<?=$lang?>">Главная</a></li>
            <li><a href="">О проекте</a></li>
            <li><a href=""><?=$page['Page']['title']?></a></li>
        </ul>
        <div class="about-inner">
            <div class="about-inner-left about-rules">
                <img class="about-inner-left__img" src="/img/pages/<?=$page['Page']['img']?>" alt="">
                <div class="title"><?=$page['Page']['title']?></div>
                <div class="about-inner__p aina-p">
                   <?=$page['Page']['body']?>
                </div>
            </div>

            <?=$this->element('asside') ?>
        </div>
    </div>
</section>
