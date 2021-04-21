


<?php 
echo $this->Form->create('City', array('type' => 'file'));
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
           <a href="/admin/cities" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
    		
            <div class="peopel">
              <div class="form-group" >
              	<label for="inputName">Название</label>
              	<input type="text" id="inputName" class="form-control" required="required" name="data[City][title_ru]"  >
              </div>
              <div class="form-group">
                <label for="inputName">Название KZ</label>
                <input type="text" id="inputName" class="form-control" required="required" name="data[City][title_kz]"  >
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
     <?
	echo $this->Form->button('Добавить', array('class' => 'btn btn-success float-right'));
	?>
     
    </div>
  </div>
</section>
<script src="/js/jquery-3.0.0.min.js"></script>
<script type="text/javascript">
   $('.js-btn').on('click',function(){
    var id = $(this).attr("data-id");
id++;
   $(this).attr("data-id",id);
    // $('#video_link_modal').val($(this).attr("data-video_link"));
    $('.peopel').append('<div class="form-group" ><label for="inputName">Название</label><input type="text" id="inputName" class="form-control" required="required" name="data[City][people'+id+'][name]"  ></div>');

   });
</script>