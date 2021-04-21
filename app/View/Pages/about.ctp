<section class="about section">
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href="/<?=$lang?>"><?=__('Главная')?></a></li>
            <li><a href=""><?=__('О проекте')?></a></li>
            <li><a href="/<?=$lang?>about"><?=__('О нас')?></a></li>
        </ul>
        <div class="about-inner">
            <div class="about-inner-left">
                <div class="title"><?=$page['Setting']['about_title_'.$l]?></div>
                <div class="about-inner__p">
                    <?=$page['Setting']['about_desc_'.$l]?>
                </div>
                <a class="btn" href="img/presentation.pptx"><?=__('Cкачать презентацию')?></a>
            </div>
            <?=$this->element('asside') ?>
        </div>
    </div>
</section>
<section class="section inner-adventages">
    <div class="container">
        <div class="title"><?=__('Преимущества')?></div>
        <div class="adventages">
        	<?php foreach ($advantages as $item): ?>
                <div class="adventages__item">
                    <img class="adventages-img" src="/img/advantages/<?=$item['Advantage']['img']?>" alt="">
                    <div class="adventages__title"><?=$item['Advantage']['title']?></div>
                    <div class="adventages__p"><?=$item['Advantage']['body']?></div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<section class="section team">
    <div class="container">
        <div class="title"><?=__('Наша команда')?></div>
        <div class="team-block">
        	<?php foreach ($teams as $item): ?>
        		<div class="team__item">
                    <img class="team__item-img" src="/img/teams/<?=$item['Team']['img']?>" alt="">
                    <div class="team__item-name"><?=$item['Team']['title']?></div>
                    <div class="team__item-position"><?=$item['Team']['position']?></div>
                </div>
        	<?php endforeach ?>
        </div>
    </div>
</section>
<section class="section  inner-partners">
    <div class="container">
        <div class="partners">
            <div class="title"><?=__('Наши партнеры')?></div>
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