
<?php 
echo $this->Form->create('Page', array('type' => 'file'));
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
            <a href="/admin/pages" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
			<div class="form-group">
				<label for="inputName">Название</label>
				<input type="text" id="inputName" class="form-control"  required="required" name="data[Page][title]" value="<?=(!empty($data['Page']['title'])) ? $data['Page']['title'] : '' ?>" >
			</div>
			<div class="form-group">
				<label for="body">Текст</label>
				<textarea id="body" class="form-control"  name="data[Page][body]" ><?=(!empty($data['Page']['body'])) ? $data['Page']['body'] : '' ?></textarea>
			</div>
      <?php if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'ru'): ?>
            <div class="form-group ">
                <label for="reviewimg">Картинка  </label>
                <?php if(!empty($data['Page']['img'])): ?>
                  <div class="model_info_img">
                    <div class="model_item_container">
                      <div class="model_item">
                          <img src="/img/pages/<?=$data['Page']['img']?>">
                      </div>
                    </div>
                  </div>
                <?php endif ?>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="reviewimg" name="data[Page][img]" />
                        <label class="custom-file-label" for="reviewimg"></label>
                    </div>
                </div>
            </div>
          <?php endif ?>
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
     
    </div>
  </div>
</section>
<script type="text/javascript">
	 CKEDITOR.replace( 'body' );
</script>



