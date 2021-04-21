 <section class="section cabinet-section">
        <div class="container">
          
            <ul class="breadcrumbs">
                <li><a href=""> Главная </a></li>
                <li><a href=""> Личный кабинет </a></li>
            </ul>
            <div class="title">Личный кабинет</div>
            <div class="cabinet-block">
                 <?=$this->element('sidebar') ?>
                <div class="links-body">
                    <div class="links-title-block">
                        <div class="links-title">опросник</div>
                    </div>
                    <div class="links-content">
                        <div class="oprosnik-block">
                            <?php if (!empty($check_moderators)): ?>
                                
                                <?php foreach ($questionnaires as $item): ?>
                                    <div class="oprosnik__item">
                                        <div class="oprosnik-data"><?php echo $this->Time->format($item['Questionnaire']['date'], '%d.%m.%Y', 'invalid'); ?></div>
                                        <div class="oprosnik__name"><?=$item['Questionnaire']['title_'.$l] ?></div>
                                        <a href="/users/moderator_question/<?=$item['Questionnaire']['id'] ?>" class="oprosnik__more"> Подробнее </a>
                                    </div>
                                <?php endforeach ?>
                            <?php endif ?>
                            
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>