<div class="personal-block">
    <div class="personal-inner-block">
        <?php if(!empty($userLogin['User']['img'])): ?>
			<img   class="personal-img" src="/img/users/<?=$userLogin['User']['img']?>">
        <?php else: ?>
			<img  class="personal-img"  src="/img/admin_img/default.svg">
        <?php endif ?>
      
        <div class="personal__name"><?=$userLogin['User']['fio']?></div>
        <div class="money-block">
            <div class="money-block__item">
                <div class="money-block_t">Коэффициент:</div>
                <div class="money-block__line"></div>
                <div class="money-block-m"><?=$userLogin['User']['coefficient']?></div>
            </div>
            <div class="money-block__item">
                <div class="money-block_t">Внесено:</div>
                <div class="money-block__line"></div>
                <div class="money-block-m"><?=$userLogin['User']['sum']?> тг</div>
            </div>
        </div>
    </div>

    <div class="personal-links">
        <div class="personal-links">
            <?php if($userLogin['User']['role'] !='moderator'): ?>
                <div class="personal-links__item <?= ($this->request->params['action'] == 'planned' ) ? 'personal-links-active' : ''?>">
                    <a href="/<?=$lang?>users/planned">Плановые рассчеты</a>
                </div>
                <div class="personal-links__item <?= ($this->request->params['action'] == 'actual' ) ? 'personal-links-active' : ''?>">
                    <a href="/<?=$lang?>users/actual">Фактические рассчеты</a>
                </div>
            <?php endif ?>
                <div class="personal-links__item <?= ($this->request->params['action'] == 'cabinet' ) ? 'personal-links-active' : ''?>">
                    <a href="/<?=$lang?>users/cabinet">Профиль</a>
                </div>
            <?php if($userLogin['User']['role'] !='moderator'): ?>
                 <div class="personal-links__item <?= ($this->request->params['controller'] == 'documents' ) ? 'personal-links-active' : ''?>">
                    <a href="/<?=$lang?>documents">Фин.отчетность</a>
                </div>
                <div class="personal-links__item <?= ($this->request->params['action'] == 'news' ) ? 'personal-links-active' : ''?>">
                    <a href="/<?=$lang?>users/news">Новости кооператива</a>
                </div>
                <div class="personal-links__item <?= ($this->request->params['controller'] == 'dialogs' ) ? 'personal-links-active' : ''?>">
                    <a href="/dialogs/add">Сообщения</a>
                </div>

                
                 <div class="personal-links__item  <?= ($this->request->params['action'] == 'my_questionnaires' ) ? 'personal-links-active' : ''?>">
                    <a href="/<?=$lang?>users/my_questionnaires">Опросник</a>
                </div>
            <?php endif ?>
           
            <?php if($userLogin['User']['role'] =='moderator'): ?>
                <div class="personal-links__item  <?= ($this->request->params['action'] == 'moderator_questionnaires' ) ? 'personal-links-active' : ''?>">
                    <a href="/<?=$lang?>users/moderator_questionnaires">Опросник</a>
                </div>
            <?php endif ?>
            <div class="personal-links__item">
                <a href="/users/logout">Выйти</a>
            </div>
        </div>
    </div>
</div>


