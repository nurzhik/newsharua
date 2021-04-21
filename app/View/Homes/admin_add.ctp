


<?php 
echo $this->Form->create('Home', array('type' => 'file'));
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
           <a href="/admin/homes" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
    			<div class="form-group">
    				<label for="inputName">Название </label>
    				<input type="text" id="inputName" class="form-control" required="required" name="data[Home][title]"  >
    			</div>
          <div class="form-group">
            <label for="status">Состояние</label>
            <input type="text" id="status" class="form-control" required="required" name="data[Home][status]"  >
          </div>
          <div class="form-group">
            <label>Пользователи</label>
            <select class="form-control select2" name="data[Home][user_id]" style="width: 100%;">
              <?php foreach ($users as $item): ?>
                <option value="<?=$item['User']['id']?>"><?=$item['User']['fio']?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <label for="inputName">Дата заключения договора</label>
            <input type="date" id="inputName" class="form-control" required="required" name="data[Home][date]"  >
          </div>
          <div class="form-group">
            <label for="entrance">Вступительный взнос</label>
            <input type="number" id="entrance" class="form-control" required="required" name="data[Home][entrance]"  >
          </div>
          <div class="form-group">
            <label for="initial">Первоначальный взнос</label>
            <input type="number" id="initial" class="form-control" required="required" name="data[Home][initial]"  >
          </div>
          <div class="form-group">
            <label for="remainder">Остаток по первоначальному взносу:</label>
            <input type="number" id="remainder" class="form-control" required="required" name="data[Home][remainder]"  >
          </div>
          <div class="form-group">
            <label for="developer">Застройщик:</label>
            <input type="text" id="developer" class="form-control" required="required" name="data[Home][developer]"  >
          </div>
          <div class="form-group">
            <label for="price">Стоймость:</label>
            <input type="number" id="price" class="form-control" required="required" name="data[Home][price]"  >
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
	echo $this->Form->button('Добавить', array('class' => 'btn btn-success float-right'));
	?>
     
    </div>
  </div>
</section>
<script type="text/javascript">
	

</script>