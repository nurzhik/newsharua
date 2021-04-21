<?php 
echo $this->Form->create('Actual', array('type' => 'file'));
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
            <a href="/admin/actuals" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="inputName">Название RU</label>
            <input type="text" id="inputName" class="form-control" required="required" name="data[Actual][title_ru]"  value="<?=$data['Actual']['title_ru']?>">
          </div>

          <div class="form-group">
            <label for="status">Название KZ</label>
            <input type="text" id="status" class="form-control" required="required" name="data[Actual][title_kz]"  value="<?=$data['Actual']['title_kz']?>">
          </div>

          <div class="form-group">
            <label>Тип</label>
            <select class="form-control select2" name="data[Actual][type]" style="width: 100%;">
                <option value="income" <?=($data['Actual']['type'] == 'income' ) ? 'selected' : '' ?>>Доход </option>
                <option value="cost" <?=($data['Actual']['type'] == 'cost' ) ? 'selected' : '' ?>>Расход</option>
            </select>
          </div>
          <div class="form-group">
            <label for="inputName">1 квартал</label>
            <input type="number" id="inputName" class="form-control" required="required" name="data[Actual][first_quarter]"  value="<?=$data['Actual']['first_quarter']?>">
          </div>
          <div class="form-group">
            <label for="inputName">2 квартал</label>
            <input type="number" id="inputName" class="form-control" required="required" name="data[Actual][second_quarter]" value="<?=$data['Actual']['second_quarter']?>" >
          </div>
          <div class="form-group">
            <label for="inputName">3 квартал</label>
            <input type="number" id="inputName" class="form-control" required="required" name="data[Actual][third_quarter]"  value="<?=$data['Actual']['third_quarter']?>">
          </div>
          <div class="form-group">
            <label for="inputName">4 квартал</label>
            <input type="number" id="inputName" class="form-control" required="required" name="data[Actual][fourth_quarter]" value="<?=$data['Actual']['fourth_quarter']?>" >
          </div>
          <div class="form-group">
            <label for="inputName">Год</label>
            <input type="number" id="inputName" class="form-control" required="required" name="data[Actual][year]" value="<?=$data['Actual']['year']?>" >
          </div>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
   
  </div>
  <div class="row">
    <div class="col-12" style="margin-bottom: 40px;">
     <!--  <a href="#" class="btn btn-secondary">Cancel</a> -->
     <?php
	echo $this->Form->button('Редактировать', array('class' => 'btn btn-success float-right'));
	?>
     
</div>
  </div>
 


