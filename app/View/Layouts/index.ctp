<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="/css/jquery.fancybox.css">
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/style.css?v=1.143">
  <!--   <link rel="stylesheet" href="/css/style.css?v=1.143"> -->
    <title>Sharua Meken</title>
</head>
    <body class="<?=$l?>">
    <div class="popup" id="alert_popup">
        <div class="alert <?=(isset($_SESSION['Message']['good']) || isset($_SESSION['Message']['bad'])) ? 'alert--active' : '';?>">
            <div class="container">
                <?php //var_dump($_SESSION); ?>
                <?php echo $this->Session->flash('good'); ?>
                <?php echo $this->Session->flash('bad'); ?>
                <?php if(isset($_SESSION['Message'])){unset($_SESSION['Message']);} ?>
                <div class="my-alert__close"></div>
            </div>
        </div> 
    </div>
    <header class="header">
        <div class="header-top-out">
            <div class="container">
                <div class="header-top">
                    <a href="/" class="header-logo logo">
                        <img src="/img/logo.svg" alt="">
                    </a>
                    <div class="lang">
                        <div class="show-lang"> 
                            <span class="show-lang__item lang-active"><?=$l?></span>
                            <span class="show-lang__item">KAZ</span>
                        </div>
                        <ul class="choose-lang">
                            <li class="choose-lang__item"><a href="/">Ru</a></li>
                            <li class="choose-lang__item"><a href="/kz">Kaz</a></li>
                        </ul>
                    </div>
                    <div class="header-call general-call">
                        <a href="#" class="call-icon"></a>
                        <div class="call-in-block">
                            <a href="tel:<?=$setting['Setting']['phone']?>"><?=$setting['Setting']['phone']?></a>
                            <span><?=$setting['Setting']['working']?></span>
                        </div>
                    </div>
                    <div class="header-socials gineral-socials">
                        <a class="socials__item instagram" href="<?=$setting['Setting']['insta']?>"></a>
                        <a class="socials__item youtube" href="<?=$setting['Setting']['youtube']?>"></a>
                    </div>
                    <form action="/search" class="form-element" >
                        <input type="text" placeholder="<?=__('Поиск по сайту...')?>" name="q">
                        <button class="search"></button>
                    </form>
                     <div class="header-buttons-block">
                        <a data-fancybox="" data-src="#id-add-cop" href="javascript:;" class="join">
                            <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.0625 6.4375H15.3125V4.6875C15.3125 4.46875 15.0938 4.25 14.875 4.25H14C13.7539 4.25 13.5625 4.46875 13.5625 4.6875V6.4375H11.8125C11.5664 6.4375 11.375 6.65625 11.375 6.875V7.75C11.375 7.99609 11.5664 8.1875 11.8125 8.1875H13.5625V9.9375C13.5625 10.1836 13.7539 10.375 14 10.375H14.875C15.0938 10.375 15.3125 10.1836 15.3125 9.9375V8.1875H17.0625C17.2812 8.1875 17.5 7.99609 17.5 7.75V6.875C17.5 6.65625 17.2812 6.4375 17.0625 6.4375ZM6.125 7.75C8.03906 7.75 9.625 6.19141 9.625 4.25C9.625 2.33594 8.03906 0.75 6.125 0.75C4.18359 0.75 2.625 2.33594 2.625 4.25C2.625 6.19141 4.18359 7.75 6.125 7.75ZM8.55859 8.625H8.09375C7.49219 8.92578 6.83594 9.0625 6.125 9.0625C5.41406 9.0625 4.73047 8.92578 4.12891 8.625H3.66406C1.64062 8.625 0 10.293 0 12.3164V13.4375C0 14.1758 0.574219 14.75 1.3125 14.75H10.9375C11.6484 14.75 12.25 14.1758 12.25 13.4375V12.3164C12.25 10.293 10.582 8.625 8.55859 8.625Z" fill="white"/>
                            </svg>
                            <span><?=__('Зарегистрироваться')?></span>
                        </a>
                        <?php if (!empty($userLogin)): ?>
                            
                            <a href="/<?=$lang?>users/cabinet" class="cabinet">
                                <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7 8.625C9.16016 8.625 10.9375 6.875 10.9375 4.6875C10.9375 2.52734 9.16016 0.75 7 0.75C4.8125 0.75 3.0625 2.52734 3.0625 4.6875C3.0625 6.875 4.8125 8.625 7 8.625ZM10.5 9.5H8.96875C8.36719 9.80078 7.71094 9.9375 7 9.9375C6.28906 9.9375 5.60547 9.80078 5.00391 9.5H3.5C1.55859 9.5 0 11.0859 0 13V13.4375C0 14.1758 0.574219 14.75 1.3125 14.75H12.6875C13.3984 14.75 14 14.1758 14 13.4375V13C14 11.0859 12.4141 9.5 10.5 9.5Z" fill="white"/>
                                </svg>
                                <span><?=__('Личный кабинет')?></span> 
                            </a>
                        <?php else: ?>
                            <a data-fancybox="" data-src="#exite-popap" href="javascript:;" class="cabinet">
                                <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7 8.625C9.16016 8.625 10.9375 6.875 10.9375 4.6875C10.9375 2.52734 9.16016 0.75 7 0.75C4.8125 0.75 3.0625 2.52734 3.0625 4.6875C3.0625 6.875 4.8125 8.625 7 8.625ZM10.5 9.5H8.96875C8.36719 9.80078 7.71094 9.9375 7 9.9375C6.28906 9.9375 5.60547 9.80078 5.00391 9.5H3.5C1.55859 9.5 0 11.0859 0 13V13.4375C0 14.1758 0.574219 14.75 1.3125 14.75H12.6875C13.3984 14.75 14 14.1758 14 13.4375V13C14 11.0859 12.4141 9.5 10.5 9.5Z" fill="white"/>
                                </svg>
                                <span><?=__('Личный кабинет')?></span> 
                            </a>
                        <?php endif ?>
                        
                    </div>
                    <div class="menu-burger">
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <ul class="header-bottom menu">
            <li class="active"><a href="/<?=$lang?>"><?=__('Главная')?></a></li>
            <li class="menu-abouts">
                <a>
                    <?=__('О проекте')?>
                    <svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.798 0.964285C10.798 0.883928 10.7578 0.793526 10.6975 0.733259L10.1953 0.231026C10.135 0.170759 10.0446 0.13058 9.96429 0.13058C9.88393 0.13058 9.79353 0.170759 9.73326 0.231026L5.78571 4.17857L1.83817 0.231026C1.7779 0.170759 1.6875 0.13058 1.60714 0.13058C1.51674 0.13058 1.43638 0.170759 1.37612 0.231026L0.873884 0.733259C0.813616 0.793526 0.773438 0.883928 0.773438 0.964285C0.773438 1.04464 0.813616 1.13504 0.873884 1.19531L5.55469 5.87612C5.61496 5.93638 5.70536 5.97656 5.78571 5.97656C5.86607 5.97656 5.95647 5.93638 6.01674 5.87612L10.6975 1.19531C10.7578 1.13504 10.798 1.04464 10.798 0.964285Z" fill="#676B73"/>
                    </svg>
                </a> 
                <ul class="menu-about-links">
                    <li> <a href="/<?=$lang?>about"><?=__('О нас')?></a></li>
                    <li> <a href="/<?=$lang?>vacancies"><?=__('Вакансии')?></a> </li>
                    <li> <a href="/<?=$lang?>products"><?=__('Каталог')?></a> </li>
                    <li> <a href="/<?=$lang?>projects"><?=__('Наши проекты')?> </a> </li>
                </ul>
            </li>
            <li><a href="/<?=$lang?>products"><?=__('Каталог продукции')?></a></li>
            <li><a href="/<?=$lang?>faqs"><?=__('Вопросы и ответы')?></a></li>
            <li><a href="/<?=$lang?>news"><?=__('Новости')?></a></li>
            <li><a href="/<?=$lang?>contacts"><?=__('Контакты')?></a></li>
        </ul>
    </header>
    <?php echo $this->fetch('content'); ?>
     <footer class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="footer-top-block">
                    <a class="foot-logo" href="/">
                    	<img src="/img/logo.svg" alt="">
                    	<p class="foot-logo__text"><?=__('Сельскохозяйственный производственный кооператив')?></p>
                    </a>
                    <form action="/search" class="form-element" >
                        <input type="text" placeholder="Поиск по сайту..." name="q">
                        <button class="search"></button>
                    </form>
                    <div class="footer-call general-call ">
                        <a href="#" class="call-icon"></a>
                        <div class="call-in-block">
                            <a href="tel:<?=$setting['Setting']['phone']?>"><?=$setting['Setting']['phone']?></a>
                            <span><?=$setting['Setting']['working']?></span>
                        </div>
                    </div>
                    <div class="footer-call general-call ">
                        <a href="#" class="call-icon emaill-icon"></a>
                        <div class="call-in-block emaill-in-block">
                            <a href="mailto:<?=$setting['Setting']['mail']?>"><?=$setting['Setting']['mail']?></a>
                            <span><?=__('для сотрудничества')?></span>
                        </div>
                    </div>
                    <div class="footer-socials gineral-socials">
                        <a class="socials__item instagram" href="<?=$setting['Setting']['insta']?>"></a>
                        <a class="socials__item youtube" href="<?=$setting['Setting']['youtube']?>"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="footer-bottom">
                <div class="footer-left">
                    <div class="footer-left-p"><?=__('Sharua Mekeni 2021 © Все права защищены')?></div>
                    <div class="footer-left-p-1"><?=__('Сайт создан')?><a href="https://astanacreative.kz/" target="_blank"> AstanaCreative </a></div>
                </div>
                <div class="footer-right">
                    <ul class="footer-menu menu">
                        <li class="active"><a href="/<?=$lang?>"><?=__('Главная')?></a></li>
                        <li class="menu-abouts">
                            <a>О проекте</a>
                            <ul class="menu-about-links">
                                <li> <a href="/<?=$lang?>about"><?=__('О нас')?></a>  </li>
                                <li> <a href="/<?=$lang?>page/pravila-vstupleniya-v-kooperativ"><?=__('Вакансии')?></a> </li>
                                <li> <a href="/<?=$lang?>projects"><?=__('Наши проекты')?></a> </li>
                            </ul>
                        </li>
                        <li><a href="/<?=$lang?>products"><?=__('Каталог продукции')?></a></li>
                        <li><a href="/<?=$lang?>faqs"><?=__('Вопросы и ответы')?></a></li>
                        <li><a href="/<?=$lang?>news"><?=__('Новости')?></a></li>
                        <li><a href="/<?=$lang?>contacts"><?=__('Контакты')?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <div class="id-add-cop okno" id="id-add-cop" style="display: none;">
        <div class="okno-top">
            <div class="onkno__title"><?=__('Регистрация')?></div>
            <svg width="28" height="23" viewBox="0 0 28 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M26.8125 9.6875H24.0625V6.9375C24.0625 6.59375 23.7188 6.25 23.375 6.25H22C21.6133 6.25 21.3125 6.59375 21.3125 6.9375V9.6875H18.5625C18.1758 9.6875 17.875 10.0312 17.875 10.375V11.75C17.875 12.1367 18.1758 12.4375 18.5625 12.4375H21.3125V15.1875C21.3125 15.5742 21.6133 15.875 22 15.875H23.375C23.7188 15.875 24.0625 15.5742 24.0625 15.1875V12.4375H26.8125C27.1562 12.4375 27.5 12.1367 27.5 11.75V10.375C27.5 10.0312 27.1562 9.6875 26.8125 9.6875ZM9.625 11.75C12.6328 11.75 15.125 9.30078 15.125 6.25C15.125 3.24219 12.6328 0.75 9.625 0.75C6.57422 0.75 4.125 3.24219 4.125 6.25C4.125 9.30078 6.57422 11.75 9.625 11.75ZM13.4492 13.125H12.7188C11.7734 13.5977 10.7422 13.8125 9.625 13.8125C8.50781 13.8125 7.43359 13.5977 6.48828 13.125H5.75781C2.57812 13.125 0 15.7461 0 18.9258V20.6875C0 21.8477 0.902344 22.75 2.0625 22.75H17.1875C18.3047 22.75 19.25 21.8477 19.25 20.6875V18.9258C19.25 15.7461 16.6289 13.125 13.4492 13.125Z" fill="#EF811F"/>
            </svg>
        </div>
        <form class="okno-center" action="/users/registration" method="POST" enctype="multipart/form-data">
            <div class="okno-grid">
                <div class="okno-input">
                    <div class="okno-input__title"><?=__('Фотография пользователя')?>:</div>
                    <label for="dwn">
                        <input type="file"  name="data[User][img]"  id="dwn" style="display: none;">
                        <span><?=__('Загрузить изображение')?></span>
                    </label>
                </div>
                <div class="okno-input">
                    <div class="okno-input__title"><?=__('ИИН')?>:</div>
                    <input type="text" name="data[User][iin]" required placeholder="<?=__('Введите ваш ИИН')?>">
                </div>
    
                <div class="okno-input">
                    <div class="okno-input__title"><?=__('ФИО')?>:</div>
                    <input type="text" name="data[User][fio]" required placeholder="<?=__('Фамилия, Имя, Отчество')?>">
                </div>
                <div class="okno-input">
                    <div class="okno-input__title"><?=__('Электронная почта')?>:</div>
                    <input type="text" name="data[User][username]" required placeholder="<?=__('Ваша электронная почта')?>">
                </div>
                <div class="okno-input">
                    <div class="okno-input__title"><?=__('Ваш город')?>:</div>
                    <input type="text" name="data[User][city]" required placeholder="<?=__('Введите ваш город')?>">
                </div>
                <div class="okno-input">
                    <div class="okno-input__title"><?=__('Ваш адрес')?>:</div>
                    <input type="text" name="data[User][address]" required placeholder="<?=__('Введите ваш адрес')?>">
                </div>
                <div class="okno-input">
                    <div class="okno-input__title"><?=__('Ваш телефон')?>:</div>
                    <input type="text" name="data[User][phone]" required placeholder="<?=__('Телефон')?>">
                </div>
                <div class="okno-input">
                    <div class="okno-input__title"><?=__('Номер договора')?>:</div>
                    <input type="text" name="data[User][contract]"  required placeholder="ХХХ ХХХ ХХХ ХХХ ХХХ">
                </div>
                <div class="okno-input">
                    <div class="okno-input__title"><?=__('Пидумайте пароль')?>:</div>
                    <input type="password"  name="data[User][password]"required >
                </div>
                <div class="okno-input">
                    <div class="okno-input__title"><?=__('Повторите пароль')?>:</div>
                    <input type="text" name="data[User][password_repeat]" required>
                </div>
            </div>
            <button class="okno-btn" type="submit"><?=__('Зарегистрироваться')?></button>
        </form>
    </div>
    <div class="exite-popap" id="exite-popap" style="display: none;">
        <div class="okno-top">
            <div class="onkno__title"><?=__('Вход')?></div>
            <a href="">
                <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.875 17C20.1523 17 22 15.1523 22 12.875V4.625C22 2.34766 20.1523 0.5 17.875 0.5H14.2656C13.9648 0.5 13.75 0.757812 13.75 1.01562V2.73438C13.75 3.03516 13.9648 3.25 14.2656 3.25H17.875C18.6055 3.25 19.25 3.89453 19.25 4.625V12.875C19.25 13.6484 18.6055 14.25 17.875 14.25H14.2656C13.9648 14.25 13.75 14.5078 13.75 14.7656V16.4844C13.75 16.7852 13.9648 17 14.2656 17H17.875ZM15.8555 8.36328L8.63672 1.14453C7.99219 0.5 6.875 0.972656 6.875 1.875V6H1.03125C0.429688 6 0 6.47266 0 7.03125V11.1562C0 11.7578 0.429688 12.1875 1.03125 12.1875H6.875V16.3125C6.875 17.2578 7.99219 17.6875 8.63672 17.043L15.8555 9.82422C16.2422 9.4375 16.2422 8.79297 15.8555 8.36328Z" fill="#EF811F"/>
                </svg>
            </a>
        </div>
        <form class="okno-center" action="/users/login" method="POST">
           <div class="exite-block">
                <div class="okno-input">
                    <div class="okno-input__title"><?=__('Логин')?>:</div>
                    <input type="text" name="data[User][username]"  required placeholder="Введите электронный адрес">
                </div>
                <div class="okno-input">
                    <div class="okno-input__title"><?=__('Пароль')?>:</div>
                    <input type="text" name="data[User][password]" placeholder="Введите ваш пароль">
                </div>
                <button class="okno-btn" type="submit"><?=__('Войти')?></button>
                <a class="link-registr" data-fancybox="" data-src="#restore" href="javascript:;"><?=__('Забыл пароль')?> </a>
           </div>
        </form>
    </div>
    <div class="zayavka-popap" id="zayavka" style="display: none;">
        <div class="exite-popap">
            <div class="okno-top">
                <div class="onkno__title"><?=__('Оставить заявку')?></div>
                <a href="#">
                    <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.875 17C20.1523 17 22 15.1523 22 12.875V4.625C22 2.34766 20.1523 0.5 17.875 0.5H14.2656C13.9648 0.5 13.75 0.757812 13.75 1.01562V2.73438C13.75 3.03516 13.9648 3.25 14.2656 3.25H17.875C18.6055 3.25 19.25 3.89453 19.25 4.625V12.875C19.25 13.6484 18.6055 14.25 17.875 14.25H14.2656C13.9648 14.25 13.75 14.5078 13.75 14.7656V16.4844C13.75 16.7852 13.9648 17 14.2656 17H17.875ZM15.8555 8.36328L8.63672 1.14453C7.99219 0.5 6.875 0.972656 6.875 1.875V6H1.03125C0.429688 6 0 6.47266 0 7.03125V11.1562C0 11.7578 0.429688 12.1875 1.03125 12.1875H6.875V16.3125C6.875 17.2578 7.99219 17.6875 8.63672 17.043L15.8555 9.82422C16.2422 9.4375 16.2422 8.79297 15.8555 8.36328Z" fill="#EF811F"></path>
                    </svg>
                </a>
            </div>
            <form class="okno-center" action="/pages/callback" method="POST">
               <div class="exite-block">
                    <div class="okno-input">
                        <div class="okno-input__title"><?=__('Имя')?>:</div>
                        <input type="text" placeholder="Введите ваше имя" name="data[Callback][fio]">
                    </div>
                    <div class="okno-input">
                        <div class="okno-input__title"><?=__('Почта')?>:</div>
                        <input type="text" placeholder="Введите вашу почту" name="data[Callback][mail]">
                    </div>
                    <button class="okno-btn" type="submit"><?=__('Отправить')?></button>                    
               </div>
            </form>
        </div> 
    </div>
     <div class="zayavka-popap" id="restore" style="display: none;">
        <div class="exite-popap">
            <div class="okno-top">
                <div class="onkno__title"><?=__('Восстановить пароль')?></div>
            </div>
            <div class="popup-info">
            	<?=__('Введите, пожалуйста, Email, который Вы использовали для создания своего профиля на сайте sharuamekeni.kz, и мы вышлем Вам ссылку для восстановления пароля.')?>
            </div>
            <form class="okno-center" action="/pages/callback" method="POST">
               <div class="exite-block">
                    <div class="okno-input">
                        <div class="okno-input__title"><?=__('Почта')?>:</div>
                        <input type="text" placeholder="Введите вашу почту" name="data[Callback][mail]">
                    </div>
                    <button class="okno-btn" type="submit"><?=__('Отправить')?></button>                    
               </div>
            </form>
        </div> 
    </div>
    <script src="/js/jquery-3.0.0.min.js"></script>
    <script src="/js/slick.min.js"></script>         
    <script src="/js/jquery.fancybox.min.js"></script>
    <script src="/js/masked.js"></script>
    <script src="/js/wow.min.js"></script>
    <!-- <script src="/js/highchart-scripts/highcharts.js"></script>
    <script src="/js/highchart-scripts/data.js"></script>
    <script src="/js/highchart-scripts/export-data.js"></script>
    <script src="/js/highchart-scripts/exporting.js"></script>
    <script src="/js/highchart-scripts/accessibility.js"></script> -->
    <script src="/js/script.js"></script>
</body>
</html>