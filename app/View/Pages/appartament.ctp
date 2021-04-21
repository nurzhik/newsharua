<section class="main auto">
    <div class="main_blog auto">
        <div class="container">
            <div class="main_unit">
                <div class="main_title"><?=$page['Setting']['home_title']?></div>
                <div class="main_subtitle"><?=$page['Setting']['home_desc']?></div>
                <a data-src="#zayavka" data-fancybox=""  href="javascript:;" class="main_btn">Подать заявку</a>
            </div>
            <div class="main_pos">
                <div class="main_pos_auto">
                    <img src="img/house1.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Purchase conditions -->
<section class="cond">
    <div class="container">
        <h1>Условия приобретения</h1>
        <div class="cond_wrapper">
                <div class="info_think">
                    <div class="info_item">
                        <div class="info_title">Жилищная программа</div>
                   </div>
                   <div class="cond_wrap">
                        <div class="info_wrap info_wrap--apartment">
                        <div class="info_thought">
                            <div class="info_subtitle">Вступительный взнос</div>
                            <div class="info_undertitle"><?=$page['Setting']['home_entrance']?></div>
                        </div>
                        <div class="info_thought">
                            <div class="info_subtitle">первоначальный взнос</div>
                            <?=$page['Setting']['home_initial']?>
                        </div>
                        <div class="info_thought">
                            <div class="info_subtitle">срок рассрочки</div>
                            <div class="info_undertitle"> <?=$page['Setting']['home_time']?></div>
                        </div>
                        <div class="info_thought">
                            <div class="info_subtitle">ежемесячный членский взнос</div>
                            <div class="info_undertitle"> <?=$page['Setting']['home_membership']?></div>
                        </div>
                       
                        </div>
                        <div class="cond_img"><img src="/img/apar-min.png" alt=""></div>
                    </div>
                </div>
        </div>
        <div class="cond_blog">
             <?=$page['Setting']['home_text']?>
        </div>
    </div>
</section>
<!-- stages of acquiring an apartment -->
<section class="house">
    <div class="container">
        <h1>этапы приобретения квартиры</h1>
        <div class="house_wrapper">
            <?php foreach ($advantages as $item): ?>
                <div class="house_blog">
                    <div class="house_blog_img">
                        <img src="/img/advantages/<?=$item['Advantage']['img']?>">
                    </div>
                    <div class="house_title"><?=$item['Advantage']['title']?></div>
                    <div class="house_subtitle"><?=$item['Advantage']['body']?></div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<!-- calculator -->
<section class="calculatcor">
    <div class="container">
        <div class="calc_wrapper">
            <div class="bg_white">
              <h2>рассчитайте условия</h2>
              <div class="calc_blog">
                  <div class="calc_automobile">
                      <div class="calc_title">Автомобиль</div>
                      <div class="calc_change">
                          <a href="javascript:;" class="calc_btn">Выберите марку автомобиля</a>
                          <div class="calc_change_under" style="display: none;">
                              <a href="javascript:;">BMB</a>
                              <a href="javascript:;">Mercedec</a>
                              <a href="javascript:;">Audi</a>
                          </div>
                      </div>
                      <div class="calc_tram">
                          <div class="calc_title">Стоимость автомобиля</div>
                              <span class="calc_figure"> 
                                  <span class="money">1000000</span> 
                                  <input type="text" class="size_change" data-min="500000" data-max="20000000" data-step="100000" data-from="1000000">
                              </span>
                      </div>
                  </div>
                  <div class="calc_type">
                      <div class="calc_title">Тип машины</div>
                      <a href="javascript:;" class="calc_choice active">Новая</a>
                      <a href="javascript:;" class="calc_choice">Б/У</a>
                      <div class="calc_tram">
                          <div class="calc_title">Срок рассрочки</div>
                              <span class="calc_figure"> 
                                  <span class="year">2</span> 
                                  <input type="range" class="size_chane" data-min="1" data-max="5" data-from="2">
                              </span>
                      </div>
                  </div>
              </div>
              <a href="javascript:;" class="conditions_btn">Рассчитать условия</a>
            </div>
          </div>  
    </div>
</section>
        <!-- carousel -->
        <section class="carousel">
            <div class="container">
                <h1>Отзывы</h1>
                <div class="car_carоusel">
                    <?php foreach ($reviews as $item): ?>
                         <div>
                            <a data-fancybox href="<?=$item['Review']['link']?>" class="carоusel_img"><img src="/img/reviews/<?=$item['Review']['img']?>" alt=""></a>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="slider_unit">
                    <div class="slider_number" role="toolbar">
                        <span class="count count_total">1</span>
                        <span>/</span>
                        <span class="coun count_current">4</span>
                    </div>
                </div>
            </div>
        </section>
        <!-- our partners -->
 <?=$this->element('partners') ?>
