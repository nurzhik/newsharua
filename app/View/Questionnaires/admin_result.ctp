
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?=$questionnaire['Questionnaire']['title_'.$l]; ?></h1>

      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
   <div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Результат</h3>

          <div class="card-tools">
            <a href="/admin/questionnaires" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">


          <?php if($total_results || !empty($total_results)): ?>
          <?php foreach ($total_results as $item): ?>

             <div class="form-group">
                <label for="inputName"><?=$item['question']?></label>
                <div class="text-muted">
                 Поддерживаю:   <?=(!empty($item['Поддерживаю'])) ? $item['Поддерживаю'] : '0'?>
                </div>
                 <div class="text-muted">
                 Не поддерживаю:  <?=(!empty($item['Не поддерживаю'])) ? $item['Не поддерживаю'] : '0'?>
                </div>
                 <div class="text-muted">
                 Воздерживаюсь от голоса: <?=(!empty($item['Воздерживаюсь от голоса'])) ? $item['Воздерживаюсь от голоса'] : '0'?>
                </div>
              </div>
          <?php endforeach ?>
          <?php else: ?>
            Результатов нету
          <?php endif ?>
        </div>

        <!-- /.card-body -->
      </div>
      <div class="card">
    <div class="card-header">
      <h3 class="card-title">Список пользоватлеей</h3>
      <!-- <div class="card-tools">
        <a href="/admin/news/add?lang=ru" class="btn  btn-success">Добавить новый материал</a>
      </div> -->
    
    </div>
    <div class="card-body p-0">
      <!-- <table class="table table-striped projects">
        <thead>
          <tr>
              <th style="width: 1%">
                  ID
              </th>
              <th style="width: 40%">
                  ФИО
              </th>
              <th>
                  Дествия
              </th>
          </tr>
        </thead>
          <tbody>
            <?php foreach ($users as $item): ?>
              <tr>
                <td>46</td>
                <td> <?=$item['User']['fio']?></td>
                <td>
                    <a class="btn btn-info btn-sm" href="/admin/questionnaires/resultview/<?=$data['Questionnaire']['id']?>/<?=$item['User']['id']?>">
                    Подробнее
                  </a>
                </td>
              </tr>
            <?php endforeach ?>  
          </tbody>
      </table> -->
      <table class="table table-striped projects" id="tableToExcel">
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
      <input type="button" class="download-btn" value="Скачать Excel">

    </div>
    <!-- /.card-body -->
  </div>
      <!-- /.card -->
    </div>
   
  </div>


</section>
<script src="/js/admin/jquery.min.js"></script>
<script src="/js/admin/jquery.table2excel.min.js"></script>
<script type="text/javascript">

$(document).ready(function () {
  var tableToExcel = (function() {
    var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) {          
      return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) 
    }
    , downloadURI = function(uri, name) {
        var link = document.createElement("a");
        link.download = name;
        link.href = uri;
        link.click();
    }

    return function(table, name, fileName) {
      if (!table.nodeType) table = document.getElementById(table)
        var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
      var resuri = uri + base64(format(template, ctx))
      downloadURI(resuri, fileName);
    }
  })();  
  $('.download-btn').on('click',function(){
    tableToExcel('tableToExcel','Результат', 'Результаты.xls');
 
    });
  });
</script>

