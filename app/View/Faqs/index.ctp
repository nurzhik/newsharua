<section class="section faq-section">
        <div class="container">
        <ul class="breadcrumbs">
            <li><a href="/<?=$lang?>">  <?=__('Главная')?>  </a></li>
            <li><a href="/<?=$lang?>faqs">  <?=__('Вопросы и ответы')?> </a></li>
        </ul>
        <div class="title"><?=__('Вопросы и ответы')?> </div>
        <div class="faq-block">
            <?php foreach ($faqs as $item): ?>
                <div class="faq-item">
                    <div class="faq-top">
                        <div class="faq__title"><?=$item['Faq']['title']?></div>
                         <div class="faq-arrow">
                            <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.02734 7.66016C6.34375 7.97656 6.87109 7.97656 7.1875 7.66016L11.9688 2.87891C12.3203 2.52734 12.3203 2 11.9688 1.68359L11.1953 0.875C10.8438 0.558594 10.3164 0.558594 10 0.875L6.58984 4.28516L3.21484 0.875C2.89844 0.558594 2.37109 0.558594 2.01953 0.875L1.24609 1.68359C0.894531 2 0.894531 2.52734 1.24609 2.87891L6.02734 7.66016Z" fill="#676B73"/>
                            </svg>    
                         </div>
                    </div>
                    <div class="faq-bottom" style="display: none;">
                        <?=$item['Faq']['body']?>
                    </div>
                </div>
            <?php endforeach ?>
           
        </div>
       
    </div>
</section>

