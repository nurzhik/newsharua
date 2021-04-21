
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Список Пайщиков</h1>
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
      <h3 class="card-title">Список Пайщиков</h3>
      <!-- <div class="card-tools">
        <a href="/admin/news/add?lang=ru" class="btn  btn-success">Добавить новый материал</a>
      </div> -->
		
    </div>
    <div class="card-body">
      <?php if(!empty($data)): ?>
      <div class="box-body">
          <strong>Фото</strong>
          <div class="text-muted">
            <img class="profile-img" src="/img/users/<?=$data['User']['img']; ?>" alt="" >
          </div>
       
           <hr>
          <strong>Почта</strong>
          <div class="text-muted">
            <?=$data['User']['username']?>
          </div>
        <hr>
          <strong>ФИО</strong>
          <div class="text-muted">
            <?=$data['User']['fio']?>
          </div>
        <hr>
          <strong>ИИН</strong>
          <div class="text-muted">
            <?=$data['User']['iin']?>
          </div>
        <hr>
          <strong>Город</strong>
          <div class="text-muted">
            <?=$data['User']['city']?>
          </div>
        <hr>
          <strong>Адрес</strong>
          <div class="text-muted">
            <?=$data['User']['address']?>
          </div>
        <hr>
         
          <strong>Телефон</strong>
          <div class="text-muted">
            <?=$data['User']['phone']?>
          </div>

          <hr>
          <strong>Номер договора</strong>
          <div class="text-muted">
            <?=$data['User']['contract']?>
          </div>

          <hr>
          <strong>Дата заключения договора</strong>
          <div class="text-muted">
            <?php echo $this->Time->format($data['User']['date_contract'], '%d.%m.%Y', 'invalid'); ?>
          </div>
          <hr>
          <strong>Коэффициент</strong>
          <div class="text-muted">
            <?=$data['User']['coefficient']?>
          </div>
          <hr>
           <strong>Сумма</strong>
          <div class="text-muted">
            <?=$data['User']['sum']?>
          </div>
          <hr>
          <form action="/admin/peoples/edit/<?=$data['User']['id']?>" method="POST" >
            <div class="form-group">
                <label>Дата заключения договора :</label>
                <div class="input-group date col-3" id="reservationdate" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" name="data[User][date_contract]" value="<?=$data['User']['date_contract']?>" data-target="#reservationdate"/>
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
              <label for="inputName">Коэффициент</label>
              <input type="text" id="inputName" class="form-control"  required="required" name="data[User][coefficient]" value=" <?=(!empty($data['Partner']['coefficient'])) ? $data['Partner']['coefficient'] : '' ?>" >
            </div>
            <div class="form-group">
              <label for="inputName">Сумма</label>
              <input type="text" id="inputName" class="form-control"  required="required" name="data[User][sum]" value=" <?=(!empty($data['Partner']['sum'])) ? $data['Partner']['sum'] : '' ?>" >
            </div>
            <button class="btn btn-success ">Отправить</button>
          </form>
        <?php if($data['User']['active']=='deactivate'):?>
          <form action="/admin/peoples/edit/<?=$data['User']['id']?>" method="POST">
            <input type="hidden" value="activate" name="data[active]">
            <button class="btn btn-success float-right">Активировать</button>
          </form>
        <?php endif ?>
      </div>
      <?php else: ?>
        <p class="empty-text">К сожалению в данном разделе еще не добавлена информация...</p>
      <?php endif ?>
    </div>
 
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>