<section class="section vacancie-section">
    <div class="container">
      
        <ul class="breadcrumbs">
            <li><a href="/<?=$lang?>">Главная</a></li>
            <li><span>Вакансии</span></li>
        </ul>
        <div class="vacancie-block">
            <div class="title">Вакансии</div>
            <div class="about-inner">
            <div class="vacancies about-inner-left">
                <?php foreach($data as $item): ?>
                <div class="vacancies-item">
                    <div class="vacancies-top">
                        <div class="cavancies__title"><?=$item['Vacancy']['title']?></div>
                        <div class="vacancies-p"><?=$item['Vacancy']['body']?></div>
                    </div>
                    <div class="vacancies-bottom">
                        <div class="cavancies__title">Условия</div>  
                        <div class="vacancies-olds">
                            <?php $terms = explode(";", $item['Vacancy']['terms']); ?>
                            <?php foreach($terms as $k => $v): ?>
                            <div class="vacancies-olds__item"><?=$v?></div>
                            <?php endforeach ?>
                        </div>  
                    </div>
                    <a class="btn-vacancies" data-fancybox="" data-src="#vacancy-popup" href="javascript:;">Подать заявку на вакансию</a>
                </div>
                <?php endforeach ?>
            </div>
            <?=$this->element('asside') ?>
        </div>
        </div>
    </div>
</section>

<div class="zayavka-popap" id="vacancy-popup" style="display: none;">
        <div class="exite-popap">
            <div class="okno-top">
                <div class="onkno__title">Подать заявку на вакансию</div>
                <a href="#">
                    <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.875 17C20.1523 17 22 15.1523 22 12.875V4.625C22 2.34766 20.1523 0.5 17.875 0.5H14.2656C13.9648 0.5 13.75 0.757812 13.75 1.01562V2.73438C13.75 3.03516 13.9648 3.25 14.2656 3.25H17.875C18.6055 3.25 19.25 3.89453 19.25 4.625V12.875C19.25 13.6484 18.6055 14.25 17.875 14.25H14.2656C13.9648 14.25 13.75 14.5078 13.75 14.7656V16.4844C13.75 16.7852 13.9648 17 14.2656 17H17.875ZM15.8555 8.36328L8.63672 1.14453C7.99219 0.5 6.875 0.972656 6.875 1.875V6H1.03125C0.429688 6 0 6.47266 0 7.03125V11.1562C0 11.7578 0.429688 12.1875 1.03125 12.1875H6.875V16.3125C6.875 17.2578 7.99219 17.6875 8.63672 17.043L15.8555 9.82422C16.2422 9.4375 16.2422 8.79297 15.8555 8.36328Z" fill="#EF811F"></path>
                    </svg>
                </a>
            </div>
            <form class="okno-center" action="/pages/callback" method="POST">
               <div class="exite-block">
                    <div class="okno-input">
                        <div class="okno-input__title">Имя:</div>
                        <input type="text" placeholder="Введите ваше имя" name="data[Callback][fio]">
                    </div>
                    <div class="okno-input">
                        <div class="okno-input__title">Почта:</div>
                        <input type="text" placeholder="Введите вашу почту" name="data[Callback][mail]">
                    </div>
                    <button class="okno-btn" type="submit">Отправить</button>                    
               </div>
            </form>
        </div> 
    </div>