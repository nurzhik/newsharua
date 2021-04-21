<?php 
echo $this->Form->create('News', array('type' => 'file'));
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
            <a href="/admin/news" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
        
    			<div class="form-group">
    				<label for="inputName">Название</label>
    				<input type="text" id="inputName" class="form-control"  required="required" name="data[News][title]" value="<?=(!empty($data['News']['title'])) ? $data['News']['title'] : '' ?>" >
    			</div>
          <div class="form-group">
            <label for="editor3">Краткое описание</label>
            <textarea id="editor3" class="form-control"  name="data[News][short_text]" ><?=(!empty($data['News']['short_text'])) ? $data['News']['short_text'] : '' ?></textarea>
          </div>
    			<div class="form-group">
    				<label for="editor2">Текст</label>
    				<textarea id="editor2" class="form-control news-content"  name="data[News][body]" ><?=(!empty($data['News']['body'])) ? $data['News']['body'] : '' ?></textarea>
    			</div>
          <div class="form-group">
              <label>Дата :</label>
              <div class="input-group date col-3" id="reservationdate" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" name="data[News][date]" value="<?=$data['News']['date']?>" data-target="#reservationdate"/>
                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
              </div>
          </div>
          <div class="form-group ">
              <label for="reviewimg">Картинка  </label>
              <?php if(!empty($data['News']['img'])): ?>
      					<div class="model_info_img">
      						<div class="model_item_container">
      							<div class="model_item">
      									<img src="/img/news/thumbs/<?=$data['News']['img']?>">
      							</div>
      						</div>
      					</div>
      				<?php endif ?>
              <div class="input-group">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="reviewimg" name="data[News][img]" />
                      <label class="custom-file-label" for="reviewimg"></label>
                  </div>
              </div>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="data[News][general]" value="1" <?=($data['News']['general'] ) ? 'checked' : '' ?>> На сайте
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="data[News][cabinet]"  <?=($data['News']['cabinet']) ? 'checked' : '' ?>> В кабинет
            </label>
          </div>
          <div class="form-group">
            <label for="meta_title">Мета заголовок</label>
            <input type="text" id="meta_title" class="form-control" name="data[News][meta_title]" value="<?=(!empty($data['News']['meta_title'])) ? $data['News']['meta_title'] : '' ?>" >
          </div>

          <div class="form-group">
            <label for="keywords">Ключевые слова</label>
            <input type="text" id="keywords" class="form-control" name="data[News][keywords]" value="<?=(!empty($data['News']['keywords'])) ? $data['News']['keywords'] : '' ?>" >
          </div>

          <div class="form-group">
            <label for="description">Мета описание</label>
            <input type="text" id="description" class="form-control" name="data[News][description]" value="<?=(!empty($data['News']['description'])) ? $data['News']['description'] : '' ?>" >
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
  CKEDITOR.replace( 'editor3' );
  CKEDITOR.replace( 'editor2' );
</script>