<?php 
echo $this->Form->create('Questionnaire', array('type' => 'file'));
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Редактирование</h1>
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
          <h3 class="card-title">Данные</h3>

          <div class="card-tools">
            <a href="/admin/questionnaires" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
    			<div class="form-group">
    				<label for="inputName">Название</label>
    				<input type="text" id="inputName" class="form-control"  required="required" name="data[Questionnaire][title_ru]" value=" <?=(!empty($data['Questionnaire']['title_ru'])) ? $data['Questionnaire']['title_ru'] : '' ?>" >
    			</div>
          <div class="form-group">
            <label for="inputName">Название KZ</label>
            <input type="text" id="inputName" class="form-control"  required="required" name="data[Questionnaire][title_kz]" value=" <?=(!empty($data['Questionnaire']['title_kz'])) ? $data['Questionnaire']['title_kz'] : '' ?>" >
          </div>
          <div class="form-group">
              <label>Дата :</label>
              <div class="input-group date col-3" id="reservationdate" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" name="data[Questionnaire][date]" value="<?=$data['Questionnaire']['date']?>" data-target="#reservationdate"/>
                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
              </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
   
  </div>
  <div class="row">
    <div class="col-12">
     <!--  <a href="#" class="btn btn-secondary">Cancel</a> -->
     <?php
	echo $this->Form->end('Редактировать', array('class' => 'btn btn-success float-right'));
	?>
     
    </div>

  </div>


</section>
<div class="row" style="margin-top: 50px">
    <div class="col-md-12">
      <div class="card card-secondary">
        <div class="card-header">
                <h3 class="card-title">Вопросы</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
          <form action="/admin/questionnaires/addquestion" id="tarifs/addForm" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="mb-4">
            <div style="display:none;">
              <input type="hidden" name="_method" value="POST">
            </div>
            <div style="display:none;">
              <input type="hidden" name="data[Question][questionnaire_id]" value="<?=(!empty($data['Questionnaire']['id'])) ? $data['Questionnaire']['id'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="title_ru">Вопрос на русском</label>
                <input type="text" id="title_ru" class="form-control" name="data[Question][title_ru]" value="<?=(!empty($data['Question']['title_ru'])) ? $data['Question']['title_ru'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="title_kz">Вопрос на казахском</label>
                <input type="text" id="title_kz" class="form-control" name="data[Question][title_kz]" value="<?=(!empty($data['Question']['title_kz'])) ? $data['Question']['title_kz'] : '' ?>">
            </div>
          
          <div class="submit"><input type="submit"  class="btn btn-success " value="Добавить"></div>
        </form>
        <table class="table border">
          <thead>
            <tr>
              <th>id</th>
              <th>Вопрос на русском</th>
              <th>Вопрос на казахском</th>
              <th>Операции</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($questions  as $item) : ?>
            <tr>
                <td><?=$item['Question']['id']; ?></td>
                <td>
                 <?=$item['Question']['title_ru']; ?>
                </td>
                 <td><?=$item['Question']['title_kz']; ?></td>
                <td class="text-middle py-0 align-middle">
                  <div class="btn-group btn-group-sm">
                    <button type="button" class="btn btn-info btn-sm edit_button" data-toggle="modal" data-target="#modal-primary" data-id="<?=$item['Question']['id']; ?>" data-title_ru="<?=$item['Question']['title_ru']; ?>" data-title_kz="<?=$item['Question']['title_kz']; ?>">
                      Редактировать
                    </button>
                    <div class="news_del" style="margin-left: 15px">  
                      <?php echo $this->Form->postLink('Удалить', array('controller' => 'questionnaires', 'action' => 'admin_deletequestion', $item['Question']['id']), array('confirm' => 'Подтвердите удаление','class' => 'btn btn-danger btn-sm')); ?>
                    </div> 
                  </div>
                </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      </div>
    </div>
</div>
<div class="modal fade" id="modal-primary" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-primary">
      <div class="modal-header">
        <h4 class="modal-title">Редактировать фото</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="/admin/questionnaires/editquestion" id="ProjectImage/addForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <div class="modal-body">
         
          <div style="display:none;">
            <input type="hidden" name="_method" value="POST">
          </div>
         <input type="hidden"  name="data[Question][id]" id="gallery_id">
          <div class="form-group">
              <label for="title_ru_modal">Вопрос на русском</label>
              <input type="text" id="title_ru_modal" class="form-control" name="data[Question][title_ru]" >
          </div>
          <div class="form-group">
              <label for="title_kz_modal">Вопрос на казахском</label>
              <input type="text" id="title_kz_modal" class="form-control" name="data[Question][title_kz]" >
          </div>
       
         
      
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Закрыть</button>
          <button type="submit" class="btn btn-outline-light">Сохранить</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<script src="/js/jquery-3.0.0.min.js"></script>
<script type="text/javascript">
   $('.edit_button').on('click',function(){
    console.log($(this).attr("data-id"));
    $('#gallery_id').val($(this).attr("data-id"));
    $('#title_ru_modal').val($(this).attr("data-title_ru"));
    $('#title_kz_modal').val($(this).attr("data-title_kz"));
   });
</script>