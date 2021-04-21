<?php 
echo $this->Form->create('User', array('type' => 'file'));
?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Редактирование</h1>
      </div>
      <div class="col-sm-6">
        
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Редактирование</h3>
      <!-- <div class="card-tools">
        <a href="/admin/news/add?lang=ru" class="btn  btn-success">Добавить новый материал</a>
      </div> -->
		  <div class="card-tools">
            <a href="/admin/moderators" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
    </div>
    <div class="card-body">
      <?php if(!empty($data)): ?>
      <div class="box-body">
          <div class="form-group ">
              <label for="reviewimg">Фото  </label>
              <?php if(!empty($data['User']['img'])): ?>
                <div class="model_info_img">
                  <div class="model_item_container">
                    <div class="model_item">
                        <img src="/img/users/<?=$data['User']['img']?>">
                    </div>
                  </div>
                </div>
              <?php endif ?>
              <div class="input-group">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="reviewimg" name="data[User][img]" />
                      <label class="custom-file-label" for="reviewimg"></label>
                  </div>
              </div>
          </div>
       
          <strong>Почта</strong>
          <div class="text-muted">
            <?=$data['User']['username']?>
          </div>

        <hr>
          <div class="form-group">
            <label for="inputName">ФИО</label>
            <input type="text" id="inputName" class="form-control"  required="required" name="data[User][fio]" value="<?=(!empty($data['User']['fio'])) ? $data['User']['fio'] : '' ?>" >
          </div>
          <div class="form-group">
            <label for="inputName">ИИН</label>
            <input type="text" id="inputName" class="form-control"  required="required" name="data[User][iin]" value="<?=(!empty($data['User']['iin'])) ? $data['User']['iin'] : '' ?>" >
          </div>
          <div class="form-group">
            <label for="inputName">Город</label>
            <input type="text" id="inputName" class="form-control"  name="data[User][city]" value="<?=(!empty($data['User']['city'])) ? $data['User']['city'] : '' ?>" >
          </div>
          <div class="form-group">
            <label for="inputName">Адрес</label>
            <input type="text" id="inputName" class="form-control"  name="data[User][address]" value="<?=(!empty($data['User']['address'])) ? $data['User']['address'] : '' ?>" >
          </div>
          <div class="form-group">
            <label for="inputName">Телефон</label>
            <input type="text" id="inputName" class="form-control"  name="data[User][phone]" value="<?=(!empty($data['User']['phone'])) ? $data['User']['phone'] : '' ?>" >
          </div>
     
        
     
      </div>
      <?php else: ?>
        <p class="empty-text">К сожалению в данном разделе еще не добавлена информация...</p>
      <?php endif ?>
    </div>
 
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
    <div class="row">
    <div class="col-12">
     <!--  <a href="#" class="btn btn-secondary">Cancel</a> -->
     <?php
  echo $this->Form->button('Редактировать', array('class' => 'btn btn-success float-right'));
  ?>
     
    </div>
  </div>
</section>