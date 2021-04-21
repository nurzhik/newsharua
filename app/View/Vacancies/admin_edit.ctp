<?php 
echo $this->Form->create('Vacancy', array('type' => 'file'));
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
            <a href="/admin/vacancies" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
            <div class="form-group">
              <label for="inputName">Название</label>
              <input type="text" id="inputName" class="form-control"  required="required" name="data[Vacancy][title]"  value="<?=$data['Vacancy']['title']?>">
            </div>
            <div class="form-group">
              <label for="body">Описание</label>
              <textarea id="body" class="form-control" name="data[Vacancy][body]" ><?=$data['Vacancy']['body']?></textarea>
            </div>
            <div class="form-group">
              <label for="reqc">Условия</label>
              <textarea id="req" class="form-control" name="data[Vacancy][terms]" ><?=$data['Vacancy']['terms']?></textarea>
            </div>
           <div class="form-group">
              <label for="priority">Приоритет</label>
              <input type="text" id="priority" class="form-control"  required="required" name="data[Vacancy][priority]"  value="<?=$data['Vacancy']['priority']?>">
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
	echo $this->Form->button('Редактировать', array('class' => 'btn btn-success float-right'));
	?>
     
    </div>
  </div>
</section>
<script type="text/javascript">
	 // CKEDITOR.replace( 'body' );
</script>
