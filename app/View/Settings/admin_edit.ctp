<?php 
echo $this->Form->create('Setting', array('type' => 'file'));
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
            <a href="/admin/settings" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">

    			<div class="form-group">
    				<label for="about_title_ru">Заголовок О нас </label>
    				<input type="text" id="about_title_ru" class="form-control"  required="required" name="data[Setting][about_title_ru]" value="<?=(!empty($data['Setting']['about_title_ru'])) ? $data['Setting']['about_title_ru'] : '' ?>" >
    			</div>
    			<div class="form-group">
    				<label for="about_desc_ru">Текст  О нас </label>
    				<textarea id="about_desc_ru" class="form-control"  name="data[Setting][about_desc_ru]" ><?=(!empty($data['Setting']['about_desc_ru'])) ? $data['Setting']['about_desc_ru'] : '' ?></textarea>
    			</div>
          <div class="form-group">
            <label for="about_title_kz">Заголовок О нас  KZ</label>
            <input type="text" id="about_title_kz" class="form-control"  required="required" name="data[Setting][about_title_kz]" value="<?=(!empty($data['Setting']['about_title_kz'])) ? $data['Setting']['about_title_kz'] : '' ?>" >
          </div>
          <div class="form-group">
            <label for="about_desc_kz">Текст  О нас KZ</label>
            <textarea id="about_desc_kz" class="form-control"  name="data[Setting][about_desc_kz]" ><?=(!empty($data['Setting']['about_desc_kz'])) ? $data['Setting']['about_desc_kz'] : '' ?></textarea>
          </div>
         
          <div class="form-group">
            <label for="phone">Телефон</label>
            <input type="text" id="phone" class="form-control"  required="required" name="data[Setting][phone]" value="<?=(!empty($data['Setting']['phone'])) ? $data['Setting']['phone'] : '' ?>" >
          </div>
          <div class="form-group">
            <label for="mail">Почта</label>
            <input type="text" id="mail" class="form-control"  required="required" name="data[Setting][mail]" value="<?=(!empty($data['Setting']['mail'])) ? $data['Setting']['mail'] : '' ?>" >
          </div>
          <div class="form-group">
            <label for="address">Адрес</label>

            <textarea id="address" class="form-control"  name="data[Setting][address]" ><?=(!empty($data['Setting']['address'])) ? $data['Setting']['address'] : '' ?></textarea>
        
          </div>
          <div class="form-group">
            <label for="working">Время работы</label>
            <input type="text" id="working" class="form-control"  required="required" name="data[Setting][working]" value="<?=(!empty($data['Setting']['working'])) ? $data['Setting']['working'] : '' ?>" >
          </div>
          
          <div class="form-group">
            <label for="insta">Инстаграм</label>
            <input type="text" id="insta" class="form-control"  required="required" name="data[Setting][insta]" value="<?=(!empty($data['Setting']['insta'])) ? $data['Setting']['insta'] : '' ?>" >
          </div>
         
          <div class="form-group">
            <label for="youtube">Youtube</label>
            <input type="text" id="youtube" class="form-control"  required="required" name="data[Setting][youtube]" value="<?=(!empty($data['Setting']['youtube'])) ? $data['Setting']['youtube'] : '' ?>" >
          </div>
          <div class="form-group">
            <label for="map_code">Код карты</label>
            <input type="text" id="map_code" class="form-control"  required="required" name="data[Setting][map_code]" value=" <?=(!empty($data['Setting']['map_code'])) ? $data['Setting']['map_code'] : '' ?>" >
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
  CKEDITOR.replace( 'about_desc_ru' );
  CKEDITOR.replace( 'about_desc_kz' );
</script>