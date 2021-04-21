


<?php 
echo $this->Form->create('Questionnaire', array('type' => 'file'));
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Добавление</h1>
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
    		
            <div class="peopel">
              <div class="form-group" >
              	<label for="inputName">Название</label>
              	<input type="text" id="inputName" class="form-control" required="required" name="data[Questionnaire][title_ru]"  >
              </div>
              <div class="form-group">
                <label for="inputName">Название KZ</label>
                <input type="text" id="inputName" class="form-control" required="required" name="data[Questionnaire][title_kz]"  >
              </div>
               <div class="form-group">
                <label>Дата :</label>
                <div class="input-group date col-3" id="reservationdate" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" name="data[Questionnaire][date]" data-target="#reservationdate"/>
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
           <!--    <div class="form-group">
                <label for="inputName">Название EN</label>
                <input type="text" id="inputName" class="form-control" required="required" name="data[Questionnaire][people][email]"  >
              </div> -->
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
	echo $this->Form->button('Добавить', array('class' => 'btn btn-success float-right'));
	?>
     
    </div>
  </div>
</section>
<script src="/js/jquery-3.0.0.min.js"></script>
<