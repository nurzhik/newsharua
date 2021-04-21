<section class="section project-section">
    <div class="container">
      
        <ul class="breadcrumbs">
            <li><a href="/<?=$lang?>"><?=__('Главная')?></a></li>
            <li><a href=""><?=__('Проекты')?></a></li>
        </ul>
        <div class="project-block">
            <div class="title"><?=__('Наши проекты')?></div>
            <div class="about-inner">   
                <div class="projects about-inner-left">
					<?php foreach($data as $item):?>
                    <div class="project__item">
                        <a class="projectsa" href="/<?=$lang?>projects/view/<?=$item['Project']['id']?>"><img src="/img/projects/thumbs/<?=$item['Project']['img']?>" alt="<?=$item['Project']['title']?>"></a>
                        <div class="project__title"><?=$item['Project']['title']?></div>
                        <a href="/<?=$lang?>projects/view/<?=$item['Project']['id']?>" class="more-news-link"><?=__('Подробнее о проекте')?> <span class="news-arrow"></span> </a>
                    </div>
                    <?php endforeach ?>
                </div>

               <?=$this->element('asside') ?>
            </div>
        </div>
       
    </div>
</section>