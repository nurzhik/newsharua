<?php 
echo $this->Form->create('Album', array('type' => 'file'));
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
            <a href="/admin/albums" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
    			<div class="form-group">
    				<label for="inputName">Название</label>
    				<input type="text" id="inputName" class="form-control"  required="required" name="data[Album][title]" value="<?=(!empty($data['Album']['title'])) ? $data['Album']['title'] : '' ?>" >
    			</div>
        <?php if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'ru'): ?>
    	    <div class="form-group">
            <label for="inputName">Дата</label>
            <input type="date" id="inputName" class="form-control" required="required" name="data[Album][date]" value="<?=(!empty($data['Album']['date'])) ? $data['Album']['date'] : '' ?>" >
          </div>
          
          <div class="form-group ">
              <label for="reviewimg">Картинка  </label>
              <?php if(!empty($data['Album']['img'])): ?>
                <div class="model_info_img">
                  <div class="model_item_container">
                    <div class="model_item">
                        <img src="/img/albums/thumbs/<?=$data['Album']['img']?>">
                    </div>
                  </div>
                </div>
              <?php endif ?>
              <div class="input-group">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="reviewimg" name="data[Album][img]" />
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
     <?php
	echo $this->Form->end('Редактировать', array('class' => 'btn btn-success float-right'));
	?>
     
    </div>
  </div>
  <?php if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'ru'): ?>
    <div class="row" style="margin-top: 50px">
        <div class="col-md-12">
          <div class="card card-secondary">
            <div class="card-header">
                    <h3 class="card-title">Картинки</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
              <form action="/admin/albums/addimage" id="tarifs/addForm" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="mb-4">
                <div style="display:none;">
                  <input type="hidden" name="_method" value="POST">
                </div>
                <div style="display:none;">
                  <input type="hidden" name="data[Gallery][album_id]" value="<?=(!empty($data['Album']['id'])) ? $data['Album']['id'] : '' ?>">
                </div>
                <div class="form-group">
                    <label for="video_link">Ссылка видео</label>
                    <input type="text" id="video_link" class="form-control" name="data[Gallery][video]" value="<?=(!empty($data['Gallery']['video'])) ? $data['Gallery']['video'] : '' ?>">
                </div>
                <div class="form-group ">
                  <label for="reviewimg">Картинка  </label>
                  <div class="input-group">
                      <div class="custom-file">
                          <input type="file" class="custom-file-input" id="reviewimg" name="data[Gallery][img]" />
                          <label class="custom-file-label" for="reviewimg"></label>
                      </div>
                  </div>
                </div>
              
              <div class="submit"><input type="submit"  class="btn btn-success " value="Добавить"></div>
            </form>
            <table class="table border">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Картина</th>
                  <th>Ссылка видео</th>
                  <th>Операции</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($images as $item) : ?>
                <tr>
                    <td><?=$item['Gallery']['id']; ?></td>
                    <td>
                      <img src="/img/galleries/<?=$item['Gallery']['img']; ?>" style="max-width: 200px" alt="">
                    </td>
                     <td><?=$item['Gallery']['video']; ?></td>
                    <td class="text-middle py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <button type="button" class="btn btn-info btn-sm edit_button" data-toggle="modal" data-target="#modal-primary" data-id="<?=$item['Gallery']['id']; ?>" data-video_link="<?=$item['Gallery']['video']; ?>">
                          Редактировать
                        </button>
                        <div class="news_del" style="margin-left: 15px">  
                          <?php echo $this->Form->postLink('Удалить', array('controller' => 'abouts', 'action' => 'admin_deleteimage', $item['Gallery']['id']), array('confirm' => 'Подтвердите удаление','class' => 'btn btn-danger btn-sm')); ?>
                        </div> 
                      </div>
                    </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          </div>
        </div>
      </div>
  <?php endif ?>
  
</section>
<div class="modal fade" id="modal-primary" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-primary">
      <div class="modal-header">
        <h4 class="modal-title">Редактировать фото</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="/admin/albums/editimage" id="ProjectImage/addForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <div class="modal-body">
         
          <div style="display:none;">
            <input type="hidden" name="_method" value="POST">
          </div>
         <input type="hidden"  name="data[Gallery][id]" id="gallery_id">
          <div class="form-group">
              <label for="video_link_modal">Ссылка видео</label>
              <input type="text" id="video_link_modal" class="form-control" name="data[Gallery][video]" >
          </div>
          <div class="form-group ">
            <label for="reviewimg">Картинка  </label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="reviewimg" name="data[Gallery][img]" />
                    <label class="custom-file-label" for="reviewimg"></label>
                </div>
            </div>
          </div>
       
         
      
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Закрыть</button>
          <button type="submit" class="btn btn-outline-light">Сохранить</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script src="/js/jquery-3.0.0.min.js"></script>
<script type="text/javascript">
   $('.edit_button').on('click',function(){
    console.log($(this).attr("data-id"));
    $('#gallery_id').val($(this).attr("data-id"));
    $('#video_link_modal').val($(this).attr("data-video_link"));
   });
</script>