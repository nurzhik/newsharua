


<?php 
echo $this->Form->create('Branche', array('type' => 'file'));
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
           <a href="/admin/branches" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
    		
              <div class="form-group">
                <label>Города</label>
                <select class="form-control select2" name="data[Branche][city_id]" style="width: 100%;">
                  <?php foreach ($cities as $item): ?>
                    <option value="<?=$item['City']['id']?>"><?=$item['City']['title_ru']?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group" >
              	<label for="inputName">Адрес</label>
              	<input type="text" id="inputName" class="form-control" required="required" name="data[Branche][address_ru]"  >
              </div>
              <div class="form-group">
                <label for="inputName">Адрес KZ</label>
                <input type="text" id="inputName" class="form-control" required="required" name="data[Branche][address_kz]"  >
              </div>
              <div class="form-group">
                <label for="inputName">Адрес EN</label>
                <input type="text" id="inputName" class="form-control" required="required" name="data[Branche][address_en]"  >
              </div>
           
            <div class="peopels">
              <div class="manager">
                <div class="manager-title">
                  Представитель
                </div>
                <div class="form-group" >
                  <label for="inputName">Имя</label>
                  <input type="text" id="inputName" class="form-control" required="required" name="data[Branche][managers][manager][name]"  >
                </div>
                <div class="form-group" >
                  <label for="inputName">Телефон</label>
                  <input type="text" id="inputName" class="form-control" required="required" name="data[Branche][managers][manager][phone]"  >
                </div>
                <div class="form-group" >
                  <label for="inputName">Почта</label>
                  <input type="text" id="inputName" class="form-control" required="required" name="data[Branche][managers][manager][email]"  >
                </div>
              </div>
            </div>
          <div class="btn js-btn btn-success"  data-id='1'>Добавить представителя</div>
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
<script src="/js/jquery-3.0.0.min.js"></script>
<script type="text/javascript">
   $('.js-btn').on('click',function(){
    var id = $('.peopels .manager').length
   //$(this).attr("data-id",id);
    // $('#video_link_modal').val($(this).attr("data-video_link"));
    $('.peopels').append('\
      <div class="manager">\
      <div class="manager-title">\
         Новый представитель\
      </div>\
      <div class="form-group" >\
        <label for="inputName">Имя</label>\
        <input type="text" id="inputName" class="form-control" required="required" name="data[Branche][managers][manager'+id+'][name]"  >\
      </div>\
      <div class="form-group" >\
        <label for="inputName">Телефон</label>\
        <input type="text" id="inputName" class="form-control" required="required" name="data[Branche][managers][manager'+id+'][phone]"  >\
      </div>\
      <div class="form-group" >\
        <label for="inputName">Почта</label>\
        <input type="text" id="inputName" class="form-control" required="required" name="data[Branche][managers][manager'+id+'][email]"  >\
      </div></div>');

   });
</script>