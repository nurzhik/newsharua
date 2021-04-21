<section class="section cabinet-section">
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href="/<?=$lang?>"> Главная </a></li>
            <li><a href="/<?=$lang?>/users/cabinet"> Личный кабинет </a></li>
        </ul>
        <div class="title">Личный кабинет</div>
        <div class="cabinet-block">
            <?=$this->element('sidebar') ?>
            <div class="links-body">
                <div class="links-title-block">
                    <div class="links-title">Плановые рассчеты</div>
                </div>
                <div class="links-content">
                    <?php if($data['User']['active'] == 'activate' && $data['User']['role'] == 'user'): ?>
                    <div class="profile-block">
                        <div class="profile-left">
                            <img class="profile-img" src="/img/users/<?=$data['User']['img']; ?>" alt="" >
                            <a class="btn-profile" href="/ru/users/cabinet_edit"> 
                                <span>Редактировать</span> 
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.5312 4.46875C17.125 3.875 17.125 2.90625 16.5312 2.34375L14.6562 0.46875C14.0938 -0.125 13.125 -0.125 12.5312 0.46875L11.0938 1.90625C10.9688 2.03125 10.9688 2.28125 11.0938 2.4375L14.5625 5.90625C14.7188 6.03125 14.9688 6.03125 15.0938 5.90625L16.5312 4.46875ZM9.875 3.125L1.65625 11.3438L1 15.125C0.90625 15.6562 1.34375 16.0938 1.875 16L5.65625 15.3438L13.875 7.125C14.0312 7 14.0312 6.75 13.875 6.59375L10.4062 3.125C10.25 3 10 3 9.875 3.125ZM4.875 10.625C4.6875 10.4688 4.6875 10.1875 4.875 10.0312L9.6875 5.21875C9.84375 5.03125 10.125 5.03125 10.2812 5.21875C10.4688 5.375 10.4688 5.65625 10.2812 5.8125L5.46875 10.625C5.3125 10.8125 5.03125 10.8125 4.875 10.625ZM3.75 13.25H5.25V14.4062L3.21875 14.75L2.25 13.7812L2.59375 11.75H3.75V13.25Z" fill="white"/>
                                </svg>    
                            </a>
                        </div>

                        <div class="profile-right">
                            <div class="profile-info">
                                <div class="profile-info-item">
                                    <div class="profile-info-t">ФИО:</div>
                                    <div class="profile-info-line"></div>
                                    <div class="profile-info-p"><?=$data['User']['fio']; ?></div>
                                </div>
                                <div class="profile-info-item">
                                    <div class="profile-info-t">Почта:</div>
                                    <div class="profile-info-line"></div>
                                    <div class="profile-info-p"><?=$data['User']['username']; ?></div>
                                </div>
                                <div class="profile-info-item">
                                    <div class="profile-info-t">ИИН:</div>
                                    <div class="profile-info-line"></div>
                                    <div class="profile-info-p"><?=$data['User']['iin']; ?></div>
                                </div>
                                <div class="profile-info-item">
                                    <div class="profile-info-t">Город:</div>
                                    <div class="profile-info-line"></div>
                                    <div class="profile-info-p"><?=$data['User']['city']; ?></div>
                                </div>
                                <div class="profile-info-item">
                                    <div class="profile-info-t">Адрес:</div>
                                    <div class="profile-info-line"></div>
                                    <div class="profile-info-p"><?=$data['User']['address']; ?></div>
                                </div>
                                 <div class="profile-info-item">
                                    <div class="profile-info-t">Телефон:</div>
                                    <div class="profile-info-line"></div>
                                    <div class="profile-info-p"><?=$data['User']['phone']; ?></div>
                                </div>
                                <div class="profile-info-item">
                                    <div class="profile-info-t">Номер договора:</div>
                                    <div class="profile-info-line"></div>
                                    <div class="profile-info-p"><?=$data['User']['contract']; ?></div>
                                </div>
                                <div class="profile-info-item">
                                    <div class="profile-info-t">Дата заключения договора:</div>
                                    <div class="profile-info-line"></div>
                                    <div class="profile-info-p">17.03.2021</div>
                                </div>
                                <div class="profile-info-item">
                                    <div class="profile-info-t">Коэффициент:</div>
                                    <div class="profile-info-line"></div>
                                    <div class="profile-info-p">1</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php elseif ($data['User']['role'] == 'moderator'): ?>
                        <div class="profile-block">
                        <div class="profile-left">
                            <img class="profile-img" src="/img/users/<?=$data['User']['img']; ?>" alt="" >
                            <a class="btn-profile" href="/ru/users/cabinet_edit"> 
                                <span>Редактировать</span> 
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.5312 4.46875C17.125 3.875 17.125 2.90625 16.5312 2.34375L14.6562 0.46875C14.0938 -0.125 13.125 -0.125 12.5312 0.46875L11.0938 1.90625C10.9688 2.03125 10.9688 2.28125 11.0938 2.4375L14.5625 5.90625C14.7188 6.03125 14.9688 6.03125 15.0938 5.90625L16.5312 4.46875ZM9.875 3.125L1.65625 11.3438L1 15.125C0.90625 15.6562 1.34375 16.0938 1.875 16L5.65625 15.3438L13.875 7.125C14.0312 7 14.0312 6.75 13.875 6.59375L10.4062 3.125C10.25 3 10 3 9.875 3.125ZM4.875 10.625C4.6875 10.4688 4.6875 10.1875 4.875 10.0312L9.6875 5.21875C9.84375 5.03125 10.125 5.03125 10.2812 5.21875C10.4688 5.375 10.4688 5.65625 10.2812 5.8125L5.46875 10.625C5.3125 10.8125 5.03125 10.8125 4.875 10.625ZM3.75 13.25H5.25V14.4062L3.21875 14.75L2.25 13.7812L2.59375 11.75H3.75V13.25Z" fill="white"/>
                                </svg>    
                            </a>
                        </div>

                        <div class="profile-right">
                            <div class="profile-info">
                                <div class="profile-info-item">
                                    <div class="profile-info-t">ФИО:</div>
                                    <div class="profile-info-line"></div>
                                    <div class="profile-info-p"><?=$data['User']['fio']; ?></div>
                                </div>
                                <div class="profile-info-item">
                                    <div class="profile-info-t">Почта:</div>
                                    <div class="profile-info-line"></div>
                                    <div class="profile-info-p"><?=$data['User']['username']; ?></div>
                                </div>
                                <div class="profile-info-item">
                                    <div class="profile-info-t">ИИН:</div>
                                    <div class="profile-info-line"></div>
                                    <div class="profile-info-p"><?=$data['User']['iin']; ?></div>
                                </div>
                                <div class="profile-info-item">
                                    <div class="profile-info-t">Город:</div>
                                    <div class="profile-info-line"></div>
                                    <div class="profile-info-p"><?=$data['User']['city']; ?></div>
                                </div>
                                <div class="profile-info-item">
                                    <div class="profile-info-t">Адрес:</div>
                                    <div class="profile-info-line"></div>
                                    <div class="profile-info-p"><?=$data['User']['address']; ?></div>
                                </div>
                                 <div class="profile-info-item">
                                    <div class="profile-info-t">Телефон:</div>
                                    <div class="profile-info-line"></div>
                                    <div class="profile-info-p"><?=$data['User']['phone']; ?></div>
                                </div>
                                <div class="profile-info-item">
                                    <div class="profile-info-t">Номер договора:</div>
                                    <div class="profile-info-line"></div>
                                    <div class="profile-info-p"><?=$data['User']['contract']; ?></div>
                                </div>
                                <div class="profile-info-item">
                                    <div class="profile-info-t">Дата заключения договора:</div>
                                    <div class="profile-info-line"></div>
                                    <div class="profile-info-p">17.03.2021</div>
                                </div>
                                <div class="profile-info-item">
                                    <div class="profile-info-t">Коэффициент:</div>
                                    <div class="profile-info-line"></div>
                                    <div class="profile-info-p">1</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                        Ваш личный кабинет находится на рассмотрении у администратора. Чтобы личный кабинет был у вас доступен, администратор должен вас одобрить
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</section>
