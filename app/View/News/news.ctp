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
                        <div class="links-title">новости кооператива</div>
                    </div>
                    <div class="links-content">
                    <?php if($userLogin['User']['active'] == 'activate'): ?>
                        <div class="cab-news-block">
                            <?php foreach ($data as $item): ?>
                                <div class="cab-news-item">
                                    <div class="cab-item-left">
                                        <img src="/img/news/thumbs/<?=$item['News']['img']?>" alt="">
                                    </div>
                                    <div class="cab-item-right">
                                        <div class="cab-news-title"><?=$item['News']['title']?></div>
                                        <div class="cab-news-p"><?=$item['News']['short_text']?></div>
                                        <div class="cab-bottom">
                                            <div class="cab-data">17.02.2021</div>
                                            <a class="cab-link" href="/<?=$lang?>users/news/view/<?=$item['News']['id']?>">Читать новость полностью</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                            

                             <?php if($data): ?>
                                <div class="pagination">
                                    <?php if($paginator['start']): ?>
                                        <a href="<?=$paginator['link']?>1" class="p_start pag_btn "> << </a>
                                    <?php endif ?>

                                    <?php if($paginator['prev']): ?>
                                        <a href="<?=$paginator['link']?><?=$paginator['prev']?>" class="p_prev pag_btn"> < </a>
                                    <?php endif ?>
                                    <span class="p_pages"><?=__('Страница')?> <?=$paginator['current_page']?> <?=__('из')?> <?=$paginator['count_pages']?></span>
                                    <?php if($paginator['next']): ?>
                                        <a href="<?=$paginator['link']?><?=$paginator['next']?>" class="p_next pag_btn"> > </a>
                                    <?php endif ?>

                                    <?php if($paginator['end']): ?>
                                        <a href="<?=$paginator['link']?><?=$paginator['count_pages']?>" class="p_end pag_btn "> >> </a>
                                    <?php endif ?>
                                </div>
                            <?php endif ?>

                          <!--   <div class="pagination">
                                <ul class="pagination-block">
                                    <li><a href="#">p</a></li>
                                    <li><a href="#">1</a></li>
                                    <li class="active-pag"><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">n</a></li>
                                </ul>
                            </div> -->
                        </div>
                    <?php else: ?>
                      Ваш личный кабинет находится на рассмотрении у администратора. Чтобы личный кабинет был у вас доступен, администратор должен вас одобрить
                    <?php endif ?>
                    </div>

                </div>
            </div>
        </div>
    </section>
