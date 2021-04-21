<?php 
echo $this->Form->create('Document', array('type' => 'file'));
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
            <a href="/admin/documents" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="inputName">Название ru</label>
            <input type="text" id="inputName" class="form-control" required="required" name="data[Document][title_ru]" value="<?=$data['Document']['title_ru']?>" >
          </div>
          <div class="form-group">
            <label for="inputNameKZ">Название kz</label>
            <input type="text" id="inputNameKZ" class="form-control" required="required" name="data[Document][title_kz]" value="<?=$data['Document']['title_kz']?>" >
          </div>
    		  
          <div class="form-group ">
              <label for="reviewimg">Файл RU  </label>
              <?php if(!empty($data['Document']['file_ru'])): ?>
                <div class="model_info_img">
                  <div class="model_item_container">
                        <a href="/files/documents/<?=$data['Document']['file_ru']?>" style="  margin-bottom: 20px;display: inline-block;">Файл</a>
                  </div>
                </div>
              <?php endif ?>
              <div class="input-group">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="reviewimg" name="data[Document][file_ru]" />
                      <label class="custom-file-label" for="reviewimg"></label>
                  </div>
              </div>
          </div>

          <div class="form-group ">
              <label for="reviewimg">Файл KZ  </label>
              <?php if(!empty($data['Document']['file_kz'])): ?>
                <div class="model_info_img">
                  <div class="model_item_container">
                        <a href="/files/documents/<?=$data['Document']['file_kz']?>" style=" margin-bottom: 20px;display: inline-block;"> Файл</a>
                  </div>
                </div>
              <?php endif ?>
              <div class="input-group">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="reviewimg" name="data[Document][file_kz]" />
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
	echo $this->Form->button('Редактировать', array('class' => 'btn btn-success float-right'));
	?>
     
    </div>
  </div>
</section>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor2' );
</script>