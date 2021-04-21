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
                        <div class="links-title">Фин.отчетность</div>
                    </div>                    
                    <div class="links-content">
                       
                        <?php if($userLogin['User']['active'] == 'activate'): ?>
                        <div class="oprosnik-block">
                            <?php foreach ($data as $item): ?>
                                <div class="oprosnik__item">
                                    <div class="oprosnik__name"><?=$item['Document']['title_'.$l] ?></div>
                                    <a href="/files/documents/<?=$item['Document']['file_'.$l] ?>" class="oprosnik__more"> Скачать </a>
                                </div>
                            <?php endforeach ?>
                         
                        </div>
                        <?php else: ?>
                          Ваш личный кабинет находится на рассмотрении у администратора. Чтобы личный кабинет был у вас доступен, администратор должен вас одобрить
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </section>