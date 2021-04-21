<?php 
echo $this->Form->create('Home', array('type' => 'file'));
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
            <a href="/admin/homes" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="inputName">Название квартиры</label>
            <input type="text" id="inputName" class="form-control" required="required" name="data[Home][title]"  value="<?=$data['Home']['title']?>">
          </div>
          <div class="form-group">
            <label for="status">Состояние</label>
            <input type="text" id="status" class="form-control" required="required" name="data[Home][status]"  value="<?=$data['Home']['status']?>">
          </div>
          <div class="form-group">
            <label>Пользователи</label>
            <select class="form-control select2" name="data[Home][user_id]" style="width: 100%;">
              <?php foreach ($users as $item): ?>
                <option value="<?=$item['User']['id']?>" <?=($item['User']['id']==$data['Home']['user_id'] ) ? 'selected' : '' ?>><?=$item['User']['fio']?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <label for="inputName">Дата заключения договора</label>
            <input type="date" id="inputName" class="form-control" required="required" name="data[Home][date]"  value="<?=$data['Home']['date']?>" >
          </div>
          <div class="form-group">
            <label for="entrance">Вступительный взнос</label>
            <input type="number" id="entrance" class="form-control" required="required" name="data[Home][entrance]"  value="<?=$data['Home']['entrance']?>">
          </div>
          <div class="form-group">
            <label for="initial">Первоначальный взнос</label>
            <input type="number" id="initial" class="form-control" required="required" name="data[Home][initial]" value="<?=$data['Home']['initial']?>"  >
          </div>
          <div class="form-group">
            <label for="remainder">Остаток по первоначальному взносу:</label>
            <input type="number" id="remainder" class="form-control" required="required" name="data[Home][remainder]" value="<?=$data['Home']['remainder']?>" >
          </div>
          <div class="form-group">
            <label for="developer">Застройщик:</label>
            <input type="text" id="developer" class="form-control" required="required" name="data[Home][developer]" value="<?=$data['Home']['developer']?>" >
          </div>
          <div class="form-group">
            <label for="price">Стоймость:</label>
            <input type="number" id="price" class="form-control" required="required" name="data[Home][price]" value="<?=$data['Home']['price']?>" >
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
     <?
	echo $this->Form->button('Редактировать', array('class' => 'btn btn-success float-right'));
	?>
     
</form>
  <div class="row">
    <div class="col-12" style="margin-bottom: 40px;">
     <a class="btn btn-success" type="submit" data-toggle="modal" data-target="#modal-primary">Выдать квартиру</a>
    </div>
  </div>
</section>

<div class="modal fade" id="modal-primary" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-primary">
      <div class="modal-header">
        <h4 class="modal-title">Выдача  квартиры</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
     
      
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Закрыть</button>
          <button type="submit" class="btn btn-outline-light" id="extradition_modal">Отправить</button>
        </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div style="display: none">
  <form action="/admin/homes/extradition" method="POST">
        <div style="display:none;">
            <input type="hidden" name="_method" value="POST">
          </div>
     <div class="form-group">
       <!--  <label for="inputName">Название машины</label> -->
        <input type="hidden"  name="data[Extradition][home_id]" id="gallery_id" value="<?=$data['Home']['id']?>">
      </div>
      <button class="btn btn-success" type="submit" id="extradition" >Выдать машину</button>
  </form>
</div>
<script type="text/javascript">
   CKEDITOR.replace( 'editor2' );
</script>
<script src="/js/jquery-3.0.0.min.js"></script>
<script type="text/javascript">
   $('#extradition_modal').on('click',function(){
   $('#extradition').click();

   });
</script>