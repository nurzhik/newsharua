<section class="section contacts-section">
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href=""> Главная </a></li>
            <li><a href=""> Контакты </a></li>
        </ul>
        <div class="contacts-block">            
            <div class="cont-block">
                <div class="cont-block-left">
                    <div class="title">Контакты</div>
                    <div class="cont-block__item general-call ">
                        <a href="#" class="call-icon"></a>
                        <div class="call-in-block">
                            <p><?=$page['Setting']['phone']?></p>
                            <span>Пн-Сб с 9:00 до 20:00</span>
                        </div>
                    </div>

                    <div class="cont-block__item general-call ">
                        <a href="#" class="call-icon emaill-icon"></a>
                        <div class="call-in-block emaill-in-block">
                            <p><?=$page['Setting']['mail']?></p>
                            <span>для сотрудничества</span>
                        </div>
                    </div>

                    <div class="cont-block__item general-call ">
                        <a href="#" class="call-icon address-icon "></a>
                        <div class="call-in-block emaill-in-block">
                            <p><?=$page['Setting']['address']?></p>
                            <span>адрес</span>
                        </div>
                    </div>
                </div>
                <div class="cont-block-right">
                    <iframe src="<?=$page['Setting']['map_code']?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>