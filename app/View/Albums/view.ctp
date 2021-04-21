<section class="gallery_inner page">
    <div class="container">
        <ul class="breadcrumbs">
            <li class="bread_bg">
                <a href="/<?=$lang?>">Главная</a>
            </li>
            <li class="bread_bg">
                <a href="/<?=$lang?>albums">Галерея</a>
            </li>
            <li class="bg_bread">
                <span><?=$data['Album']['title']?></span>
            </li>
        </ul>
    </div>
    <div class="container">
        <h1><?=$data['Album']['title']?></h1>
        <div class="gallery_inner_wrapper">
            <?php foreach ($galleries as $item): ?>
                <?php if($item['Gallery']['video']): ?>
                 <div class="gallery_inner_blog" data-fancybox  href="<?=$item['Gallery']['video']?>"><img src="/img/galleries/<?=$item['Gallery']['img']?>" alt=""></div>
                 <?php else: ?>
                      <div class="gallery_inner_blog" data-fancybox="gall" data-src="/img/galleries/<?=$item['Gallery']['img']?>"><img src="/img/galleries/<?=$item['Gallery']['img']?>" alt=""></div>
                 <?php endif ?>
            <?php endforeach ?>
        </div>
        <div class="gallery_inner_unit">
            <a href="/<?=$lang?>albums" class="main_btn">назад к альбому</a>
            <ul class="pagination">     
                <li><?php echo $this->Paginator->first('<<'); ?></li>
                <!-- <ul class="pag_list"> -->
                <?php echo $this->Paginator->numbers(
                    array(
                        'separator' => '',
                        'tag' => 'li',
                        'modulus' => 4
                        )
                ); ?>
                <!-- </ul> -->
                <li><?php echo $this->Paginator->last('>>'); ?></li>
            </ul>
        </div>
    </div>
</section>
    <!-- our partners -->
 <?=$this->element('partners') ?>