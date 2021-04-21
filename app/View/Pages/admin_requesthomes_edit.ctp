
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Изменение недвижимости</h1>
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
            <a href="/admin/requesthomes" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="inputName">ФИО</label>
            <div class="text-muted">
              <?=$data['RequestHome']['fio']?>
            </div>
          </div>
          <div class="form-group">
            <label for="inputName">ИИН</label>
            <div class="text-muted">
              <?=$data['RequestHome']['iin']?>
            </div>
          </div>
          <div class="form-group">
            <label for="inputName">Телефон</label>
            <div class="text-muted">
              <?=$data['RequestHome']['phone']?>
            </div>
          </div>
          <div class="form-group">
            <label for="inputName">Недвижимость</label>
            <div class="text-muted">
              <?=$data['RequestHome']['home']?>
            </div>
          </div>
          <div class="form-group">
            <label for="inputName">Цена</label>
            <div class="text-muted">
              <?=$data['RequestHome']['price']?>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
   
  </div>
  <form action="/pages/change_home" method="POST">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Новые данные</h3>
          </div>
          <div class="card-body">
            <div style="display:none;">
              <input type="hidden" name="_method" value="POST">
            </div>
            <input type="hidden"  name="data[ChangeHome][home_id]" id="gallery_id" value="<?=$data['Home']['id']?>">
            <div class="form-group">
              <label for="inputName">Название машины</label>
              <input type="text" id="inputName" class="form-control" required="required" name="data[ChangeHome][title]"  value="<?=$data['Home']['title']?>">
            </div>
            <div class="form-group">
              <label for="status">Состояние</label>
              <input type="text" id="status" class="form-control" required="required" name="data[ChangeHome][status]"  value="<?=$data['Home']['status']?>">
            </div>
            <div class="form-group">
               <input type="hidden" id="status" class="form-control" required="required" name="data[ChangeHome][user_id]"  value="<?=$data['Home']['user_id']?>">
            </div>
            <div class="form-group">
              <label for="inputName">Дата заключения договора</label>
              <input type="date" id="inputName" class="form-control" required="required" name="data[ChangeHome][date]"  value="<?=$data['Home']['date']?>" >
            </div>
            <div class="form-group">
              <label for="entrance">Вступительный взнос</label>
              <input type="number" id="entrance" class="form-control" required="required" name="data[ChangeHome][entrance]"  value="<?=$data['Home']['entrance']?>">
            </div>
            <div class="form-group">
              <label for="initial">Первоначальный взнос</label>
              <input type="number" id="initial" class="form-control" required="required" name="data[ChangeHome][initial]" value="<?=$data['Home']['initial']?>"  >
            </div>
            <div class="form-group">
              <label for="remainder">Остаток по первоначальному взносу:</label>
              <input type="number" id="remainder" class="form-control" required="required" name="data[ChangeHome][remainder]" value="<?=$data['Home']['remainder']?>" >
            </div>
            <div class="form-group">
              <label for="year">Застройщик:</label>
              <input type="number" id="year" class="form-control" required="required" name="data[ChangeHome][year]" value="<?=$data['Home']['developer']?>" >
            </div>
            <div class="form-group">
              <label for="price">Стоймость:</label>
              <input type="number" id="price" class="form-control" required="required" name="data[ChangeHome][price]" value="<?=$data['Home']['price']?>" >
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
        <button class="btn">Отправить</button>
       
      </div>
    </div>
  </form>

</section>



<div class="modal fade" id="modal-primary" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-primary">
      <div class="modal-header">
        <h4 class="modal-title">Выдача  авто</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
     
      
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Закрыть</button>
          <button type="submit" class="btn btn-outline-light" id="extradition_modal">Отправить</button>
        </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<div style="display: none">
  <form action="/admin/cars/extradition" method="POST">
        <div style="display:none;">
            <input type="hidden" name="_method" value="POST">
          </div>
     <div class="form-group">
       <!--  <label for="inputName">Название машины</label> -->
        <input type="hidden"  name="data[Extradition][car_id]" id="gallery_id" value="<?=$data['Car']['id']?>">
      </div>
      <button class="btn btn-success" type="submit" id="extradition" >Выдать машину</button>
  </form>
</div>
<script type="text/javascript">
   CKEDITOR.replace( 'editor2' );
</script>
<script src="/js/jquery-3.0.0.min.js"></script>
<script type="text/javascript">
   $('#extradition_modal').on('click',function(){
   $('#extradition').click();

   });
</script>