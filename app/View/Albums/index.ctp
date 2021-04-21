<div class="page">
<section class="gallery">
    <div class="container">
        <h1>галерея</h1>
        <div class="gallery_wrapper">
            <?php foreach ($data as $item): ?>
                <div class="gallery_blog">
                    <a href="/albums/view/<?=$item['Album']['id'] ?>" class="gallery_img"><img src="/img/albums/<?=$item['Album']['img'] ?>" alt=""></a>
                    <div class="gallery_item">
                        <div class="news_data"><?php echo $this->Time->format($item['Album']['date'], '%d.%m.%Y', 'invalid'); ?></div>
                        <div class="gallery_title"><?=$item['Album']['title'] ?></div>
                        <a href="/albums/view/<?=$item['Album']['id'] ?>" class="gall_more">Смотреть альбом</a>
                    </div>
                </div>
            <?php endforeach ?>
            
            
        </div>
        
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
</section>
 <?=$this->element('partners') ?>
</div>