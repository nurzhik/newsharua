


<?php 
echo $this->Form->create('Product', array('type' => 'file'));
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
           <a href="/admin/products" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
    			
    			<div class="form-group">
    				<label for="inputName">Название ru</label>
    				<input type="text" id="inputName" class="form-control" required="required" name="data[Product][title_ru]"  >
    			</div>
          <div class="form-group">
            <label for="inputNameKZ">Название kz</label>
            <input type="text" id="inputNameKZ" class="form-control" required="required" name="data[Product][title_kz]"  >
          </div>
          <div class="form-group">
            <label>Категории</label>
            <select class="form-control select2" name="data[Product][category_id]" style="width: 100%;">
              <?php foreach ($categories as $item): ?>
                <option value="<?=$item['Category']['id']?>"><?=$item['Category']['title_ru']?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <label for="editor3">Краткое описание ru</label>
            <textarea id="editor3" class="form-control"  name="data[Product][body_ru]" ></textarea>
          </div>
          <div class="form-group">
            <label for="editor3">Краткое описание kz</label>
            <textarea id="editor3" class="form-control"  name="data[Product][body_kz]" ></textarea>
          </div>
          <div class="form-group ">
              <label for="reviewimg">Картинка  </label>
              <div class="input-group">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="reviewimg" name="data[Product][img]" />
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
	 CKEDITOR.replace( 'editor2' );
</script>