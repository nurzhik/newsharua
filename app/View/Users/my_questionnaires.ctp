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
                        <?php if($userLogin['User']['active'] == 'activate'): ?>
                            <form class="personal-select" action="/users/selectmoderator" method="POST">
                                <div class="person_item">
                                    <span>Отвественные лица:</span>
                                    <select class="select-slide" name="data[Moderator][id]">
                                    <?php if (!empty($check_moderators)): ?>
                                         <option value="0">Выбрать себя</option>
                                        <?php foreach ($moderators as $item): ?>
                                            <option value="<?=$item['User']['id'] ?>" <?=($check_moderators['Responsible']['moderator_id'] == $item['User']['id']) ? 'selected' : ''?>><?=$item['User']['fio'] ?></option>
                                        <?php endforeach ?>
                                    <?php else: ?>
                                         <option value="0">Выбрать себя</option>
                                         <?php foreach ($moderators as $item): ?>
                                            <option value="<?=$item['User']['id'] ?>" >
                                                <?=$item['User']['fio'] ?>
                                            </option>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                    </select>

                                </div>
                                <button type="submit">Выбрать</button>
                            </form>
                        <?php endif ?>
                        <?php if($userLogin['User']['active'] == 'activate'): ?>
                        <div class="oprosnik-block">
                            <?php foreach ($questionnaires as $item): ?>
                                <div class="oprosnik__item">
                                    <div class="oprosnik-data"><?php echo $this->Time->format($item['Questionnaire']['date'], '%d.%m.%Y', 'invalid'); ?></div>
                                    <div class="oprosnik__name"><?=$item['Questionnaire']['title_'.$l] ?></div>
                                    <a href="/users/my_question/<?=$item['Questionnaire']['id'] ?>" class="oprosnik__more"> Подробнее </a>
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