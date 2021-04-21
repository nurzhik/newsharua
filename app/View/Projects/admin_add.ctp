<?php 
echo $this->Form->create('Project', array('type' => 'file'));
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
           <a href="/admin/projects" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
    			<div class="form-group">
    	      <?php if(!empty($data['Project']['img'])): ?>
    					<div class="model_info_img">
    						<div class="model_item_container">
    							<div class="model_item">
    									<img src="/img/projects/thumbs/<?=$data['Project']['img']?>">
    							</div>
    						</div>
    					</div>
    				<?php endif ?>
    			</div>
       
    			<div class="form-group">
    				<label for="inputName">Название</label>
    				<input type="text" id="inputName" class="form-control" required="required" name="data[Project][title]"  >
    			</div>
    			<div class="form-group">
    				<label for="editor2">Текст</label>
    				<textarea id="editor2" class="form-control"  name="data[Project][body]" ></textarea>
    			</div>
          
          <div class="form-group ">
              <label for="reviewimg">Картинка  </label>
              <div class="input-group">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="reviewimg" name="data[Project][img]" />
                      <label class="custom-file-label" for="reviewimg"></label>
                  </div>
              </div>
          </div>

          <div class="form-group">
            <label for="meta_title">Мета заголовок</label>
            <input type="text" id="meta_title" class="form-control" name="data[Project][meta_title]" >
          </div>

          <div class="form-group">
            <label for="keywords">Ключевые слова</label>
            <input type="text" id="keywords" class="form-control" name="data[Project][keywords]">
          </div>

          <div class="form-group">
            <label for="description">Мета описание</label>
            <input type="text" id="description" class="form-control" name="data[Project][description]">
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
     <?= $this->Form->button('Добавить', array('class' => 'btn btn-success float-right'));
	?>
     
    </div>
  </div>
</section>
<script type="text/javascript">
  CKEDITOR.replace( 'editor2' );
</script>