<section class="main_blog main_blog_auto">
<!--     <div class="main_blog auto"> -->
        <div class="container">
            <div class="main_unit">
                <div class="main_title"><?=$page['Setting']['auto_title']?></div>
                <div class="main_subtitle"><?=$page['Setting']['auto_desc']?></div>
                <a data-src="#zayavka" data-fancybox=""  href="javascript:;" class="main_btn">Подать заявку</a>
            </div>
            <div class="main_pos">
              <div class="main_pos_auto">
                <img src="img/auto-min.png" alt="">
              </div>
            </div>
        </div>
  <!--   </div> -->
</section>
<!-- info -->
<section class="info">
<div class="container">
    <h1>Условия приобретения</h1>
    <div class="info_wrapper">
        <div class="info_blog">
            <div class="info_car auto"><img src="/img/car1.png" alt=""></div>
        <div class="info_think">
            <div class="info_item">
                <div class="info_title">Новое авто</div>
            <!--<div class="info_img"><img src="img/info_icon.svg" alt=""></div> -->
           </div>
            <div class="info_wrap">
             <div class="info_thought">
                  <div class="info_subtitle">Вступительный взнос</div>
                  <div class="info_undertitle"><?=$page['Setting']['new_car_entrance']?></div>
              </div>
              <div class="info_thought">
                  <div class="info_subtitle">первоначальный взнос</div>
                  <?=$page['Setting']['new_car_initial']?>
              </div>
              <div class="info_thought">
                  <div class="info_subtitle info_mt">срок рассрочки</div>
                  <div class="info_undertitle info_mb"><?=$page['Setting']['new_car_time']?></div>
              </div>
              <div class="info_thought">
                  <div class="info_subtitle info_mt">ежемесячный членский взнос</div>
                  <div class="info_undertitle info_mb_none"><?=$page['Setting']['new_car_membership']?></div>
              </div>
            </div>
        </div>
        </div>
        <div class="info_blog">
            <div class="info_car auto"><img src="/img/car2.png" alt=""></div>
            <div class="info_think">
                <div class="info_item">
                    <div class="info_title">Авто с пробегом</div>
                 <!--    <div class="info_img"><img src="img/info_icon.svg" alt=""></div> -->
               </div>
            <div class="info_wrap">
            <div class="info_thought"> 
                <div class="info_subtitle">Вступительный взнос</div>
                <div class="info_undertitle"><?=$page['Setting']['old_car_entrance']?></div>
            </div>
            <div class="info_thought">
                <div class="info_subtitle">первоначальный взнос</div>
                <?=$page['Setting']['old_car_initial']?>
            </div>
            <div class="info_thought">
                <div class="info_subtitle info_mt">срок рассрочки</div>
                <div class="info_undertitle info_mb"> <?=$page['Setting']['old_car_time']?></div>
            </div>
            <div class="info_thought">
                <div class="info_subtitle info_mt">ежемесячный членский взнос</div>
                <div class="info_undertitle info_mb_none"><?=$page['Setting']['old_car_membership']?></div>
            </div>
            <div class="info_string pt">Поддержанный автомобиль должен быть не ранее 2010 года выпуска и стоить не менее 3 000 000 тенге. Каждая заявка рассматривается индивидуально</div>
            </div>
        </div>
        </div>
    </div>
</div>
</section>
<!-- stages -->
<section class="stages">
<div class="container">
<h1>этапы приобретения автомобиля</h1>
<div class="stages_wrapper">
  <?php foreach ($advantages as $item): ?>
      <div class="stages_blog">
         <div class="stages_blog_img"><img src="/img/advantages/<?=$item['Advantage']['img']?>" alt=""></div> 
         <div class="stages_title"><?=$item['Advantage']['title']?></div>
         <div class="stages_subtitle"><?=$item['Advantage']['body']?></div>
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
          <div id="auto-calc" class="conditions_btn">Рассчитать условия</div>
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