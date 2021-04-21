<section class="section faq-section">
        <div class="container">
        <ul class="breadcrumbs">
            <li><a href="/<?=$lang?>">  <?=__('Главная')?>  </a></li>
        </ul>
        <div class="title"><?=$questionnaire['Questionnaire']['title_'.$l]; ?> </div>
        
            <table class="table table-striped " id="tableToExcel">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            ID
                        </th>
                        <th style="width: 20%">
                            ФИО
                        </th>
                         <th style="width: 20%" >
                            Модератор
                        </th>
                        <th >
                            ИИН
                        </th>
                        <th >
                            Подпись
                        </th>
                        <?php foreach ($total_results as $item): ?>
                            <th><?=$item['question']?></th>
                        <?php endforeach ?>
                    </tr>
                </thead>
                <tbody>

          
             
                <?php foreach($data as $item): ?>
                    <tr>
                      <td>
                        <?=$item['Result']['id']?>
                      </td>
                    <td>
                       <?= $item['User']['fio'] ?>
                    </td>
                    <td>
                       <?=(!empty($item['Result']['moderator_id'])) ? $item['Moderator']['fio'] : '-' ?>
                    </td>
                    <td>
                       <?=$item['User']['iin']?>
                    </td>
                    <td>
                       <?=$item['Result']['xmlsignature']?>
                    </td>
                    <?php $result_question = json_decode($item['Result']['results'],true) ?>

                    <?php foreach ($result_question as $k => $q1): ?>

                                <td >
                                           <?=$q1['answer'] ?><br>
                                           <?=$q1['desc'] ?>
                                </td>
                     <?php endforeach ?>
                    
                    </tr>
                <?php endforeach ?>
        
            
                </tbody>
            </table>
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
           
       
    </div>
</section>

