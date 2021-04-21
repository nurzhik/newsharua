<?php 
echo $this->Form->create('Car', array('type' => 'file'));
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
            <a href="/admin/cars" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="inputName">Название машины</label>
            <input type="text" id="inputName" class="form-control" required="required" name="data[Car][title]"  value="<?=$data['Car']['title']?>">
          </div>
          <div class="form-group">
            <label for="status">Состояние</label>
            <input type="text" id="status" class="form-control" required="required" name="data[Car][status]"  value="<?=$data['Car']['status']?>">
          </div>
          <div class="form-group">
            <label>Пользователи</label>
             <input type="hidden" class="form-control" required="required" name="data[Car][user_id]"  value="<?=$data['Car']['user_id']?>">
          </div>
          <div class="form-group">
            <label for="inputName">Дата заключения договора</label>
            <input type="date" id="inputName" class="form-control" required="required" name="data[Car][date]"  value="<?=$data['Car']['date']?>" >
          </div>
          <div class="form-group">
            <label for="entrance">Вступительный взнос</label>
            <input type="number" id="entrance" class="form-control" required="required" name="data[Car][entrance]"  value="<?=$data['Car']['entrance']?>">
          </div>
          <div class="form-group">
            <label for="initial">Первоначальный взнос</label>
            <input type="number" id="initial" class="form-control" required="required" name="data[Car][initial]" value="<?=$data['Car']['initial']?>"  >
          </div>
          <div class="form-group">
            <label for="remainder">Остаток по первоначальному взносу:</label>
            <input type="number" id="remainder" class="form-control" required="required" name="data[Car][remainder]" value="<?=$data['Car']['remainder']?>" >
          </div>
          <div class="form-group">
            <label for="year">Год выпуска:</label>
            <input type="number" id="year" class="form-control" required="required" name="data[Car][year]" value="<?=$data['Car']['year']?>" >
          </div>
          <div class="form-group">
            <label for="price">Стоймость:</label>
            <input type="number" id="price" class="form-control" required="required" name="data[Car][price]" value="<?=$data['Car']['price']?>" >
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
	   echo $this->Form->button('Изменить', array('class' => 'btn btn-success float-right'));
	   ?>
     
    </div>
  </div>

</section>


<script type="text/javascript">
	 CKEDITOR.replace( 'editor2' );
</script>
<script src="/js/jquery-3.0.0.min.js"></script>
<script type="text/javascript">
   $('#extradition_modal').on('click',function(){
   $('#extradition').click();

   });
</script>