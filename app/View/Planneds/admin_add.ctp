


<?php 
echo $this->Form->create('Planned', array('type' => 'file'));
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
           <a href="/admin/planneds" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
    			<div class="form-group">
    				<label for="inputName">Название RU</label>
    				<input type="text" id="inputName" class="form-control" required="required" name="data[Planned][title_ru]"  >
    			</div>
          <div class="form-group">
            <label for="inputName">Название KZ</label>
            <input type="text" id="inputName" class="form-control" required="required" name="data[Planned][title_kz]"  >
          </div>
       
          <div class="form-group">
            <label>Тип</label>
            <select class="form-control select2" name="data[Planned][type]" style="width: 100%;">
                <option value="income">Доход </option>
                <option value="cost">Расход</option>
            </select>
          </div>
          <div class="form-group">
            <label for="inputName">1 квартал</label>
            <input type="number" id="inputName" class="form-control" required="required" name="data[Planned][first_quarter]"  >
          </div>
          <div class="form-group">
            <label for="inputName">2 квартал</label>
            <input type="number" id="inputName" class="form-control" required="required" name="data[Planned][second_quarter]"  >
          </div>
          <div class="form-group">
            <label for="inputName">3 квартал</label>
            <input type="number" id="inputName" class="form-control" required="required" name="data[Planned][third_quarter]"  >
          </div>
          <div class="form-group">
            <label for="inputName">4 квартал</label>
            <input type="number" id="inputName" class="form-control" required="required" name="data[Planned][fourth_quarter]"  >
          </div>
          <div class="form-group">
            <label for="inputName">Год</label>
            <input type="number" id="inputName" class="form-control" required="required" name="data[Planned][year]"  >
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
<script type="text/javascript">
	

</script>