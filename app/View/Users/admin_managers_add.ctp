


<?php 
echo $this->Form->create('User', array('type' => 'file'));
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
           <a href="/admin/moderators" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
    			<div class="form-group">
    	      <?php if(!empty($data['User']['img'])): ?>
    					<div class="model_info_img">
    						<div class="model_item_container">
    							<div class="model_item">
    									<img src="/img/users/thumbs/<?=$data['User']['img']?>">
    							</div>
    						</div>
    					</div>
    				<?php endif ?>
    			</div>
       
    			<div class="form-group">
    				<label for="inputName">Логин Почта</label>
    				<input type="text" id="inputName" class="form-control" required="required" name="data[User][username]"  >
    			</div>
          <div class="form-group">
            <label for="inputName">ФИО</label>
            <input type="text" id="inputName" class="form-control" required="required" name="data[User][fio]"  >
          </div>
          <div class="form-group">
            <label for="inputName">ИИН</label>
            <input type="text" id="inputName" class="form-control" required="required" name="data[User][iin]"  >
          </div>
          <div class="form-group">
            <label for="inputName">Город</label>
            <input type="text" id="inputName" class="form-control" required="required" name="data[User][city]"  >
          </div>
          <div class="form-group">
            <label for="inputName">Проль</label>
            <input type="text" id="inputName" class="form-control" required="required" name="data[User][password]"  >
          </div>
           <div class="form-group">
            <label for="inputName">Повторите проль</label>
            <input type="text" id="inputName" class="form-control" required="required" name="data[User][password_repeat]"  >
          </div>
          <div class="form-group ">
              <label for="reviewimg">Картинка  </label>
              <div class="input-group">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="reviewimg" name="data[User][img]" />
                      <label class="custom-file-label" for="reviewimg"></label>
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
	echo $this->Form->button('Добавить', array('class' => 'btn btn-success float-right'));
	?>
     
    </div>
  </div>
</section>
<script type="text/javascript">
  CKEDITOR.replace( 'editor3' );
  CKEDITOR.replace( 'editor2' );
</script>