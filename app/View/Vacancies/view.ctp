<section class="page">
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href="/">Главная</a></li>
            <li><a  href="/news">Новости</a></li>
            <li><a><?=$data['News']['title']?></a></li>
        </ul>
        <div class="page_inner">
            <div class="page_title center_title"><?=$data['News']['title']?></div>
            <div class="page_top">
                <div class="share_block">
                    <div class="share_text">Поделиться в соц. сетях:</div>
                    <div class="share_links">
                        <a class="share_btn youtube_color" href="javascript:;" target="_blank"></a>
                        <a class="share_btn instagram_color" href="javascript:;" target="_blank"></a>
                        <a class="share_btn facebook_color" href="https://www.facebook.com/sharer.php?src=sp&amp;u=https%3A%2F%2Fyandex.ru%2Fdev%2Fshare%2F&amp;utm_source=share2" rel="nofollow noopener" target="_blank" title="Facebook"></a>
                    </div>
                </div>
                <a class="more_btn white_btn project_btn" href="#project_request">Обсудить мой проект</a>
            </div>
            <img class="page_img" src="/img/projects/<?=$data['News']['img']?>" alt="">
            <div class="page_text">
                <?=$data['News']['body']?>
            </div>
            <div class="green_line"></div>
            
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="title center_title">Другие новости</div>
        <div class="project_grid news">
            <?php foreach($other_news as $item): ?>
                <div class="project_item">
                    <a class="project_img" href="/news/<?=$item['News']['id']?>">
                        <img src="/img/news/thumbs/<?=$item['News']['img']?>" alt="">
                    </a>
                    <div class="about_project">
                        <div class="news_date"><?=$this->Common->beauty_date($item['News']['date']);?></div>
                        <a class="project_name" href="/news/<?=$item['News']['id']?>"> <?php echo $item['News']['title']; ?></a>
                        <div class="text_item">
                            <p>  <?= $this->Text->truncate(strip_tags($item['News']['body']), 90, array('ellipsis' => '...', 'exact' => true)) ?></p>
                        </div>
                    </div>
                    <a class="project_more" href="/news/<?=$item['News']['id']?>">Читать новость</a>
                </div>
            <?php endforeach ?>
            
        </div>
    </div>
</section>