<section class="section page page--full">
    <div class="container">
        <!-- <div class="title title_border__bottom blue_border">Присвоение разрядов и званий</div> -->

        <ul class="breadcrumbs">
            <li><a href="/<?=$lang?>"><?=__('Главная')?></a></li>
            <li><a><?=__('Поиск')?></a></li>
        </ul>
        <h1 class="title"><?=__('Результаты поиска')?></h1>
        <ul class="search-list">
	       
	        <?php foreach($res['News'] as $item): ?>
	            <li>
	            	<a href="/<?=$lang?>news/view/<?=$item['i18n']['foreign_key']?>" class="news-item-second__title">
	                    <?= $this->Text->truncate(strip_tags($item['i18n']['content']), 125, array('ellipsis' => '...', 'exact' => true)) ?>
	            	</a>
	        	</li>
	        <?php endforeach ?>
	       <?php foreach($res['Project'] as $item): ?>
	            <li><a href="/<?=$lang?>projects/view/<?=$item['i18n']['foreign_key']?>" class="news-item-second__title">
	                    <?= $this->Text->truncate(strip_tags($item['i18n']['content']), 125, array('ellipsis' => '...', 'exact' => true)) ?>
	            </a></li>
	        <?php endforeach ?>
		</ul>
        <?php if(!$res['News'] && !$res['Project']  ): ?>
            <p><?=__('К сожалению по вашему запросу ничего не найдено...')?></p>
        <?php endif ?>
    </div>
</section>