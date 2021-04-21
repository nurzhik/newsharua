<section class="partners">
        <div class="container">
            <h1>наши партнеры</h1>
            <div class="partners_wrapper">
            	<?php foreach ($partners as $item): ?>
            		<div>
	                    <a href="<?=$item['Partner']['link']?>" class="partners_blog" target="_blank"><img src="/img/partners/<?=$item['Partner']['img']?>" alt=""></a>
	                </div>
            	<?php endforeach ?>
                
            </div>
            <div class="part_blog">
                <div class="part_arrow"></div>
                <div class="slider_number" role="toolbar">
                    <span class="count part_total">1</span>
                    <span >/</span>
                    <span class="coun part_current">4</span>
                </div>
            </div> 
        </div>
</section>