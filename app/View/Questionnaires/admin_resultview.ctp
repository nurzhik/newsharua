
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?=$data['Questionnaire']['title_'.$l]; ?></h1>

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
          <h3 class="card-title">Результат</h3>

          <div class="card-tools">
            <a href="/admin/questionnaires/result/<?=$id?>" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
          <?php foreach ($results['Result']['results'] as $item): ?>

             <div class="form-group">
                <label for="inputName"><?=$item['question']?></label>
                <div class="text-muted">
                 Ответ:  <?=$item['answer']?>
                </div>
                <div class="text-muted">
                 Описание:  <?=$item['desc']?>
                </div>
              </div>
              <hr>
          <?php endforeach ?>
         
        
        </div>
        <!-- /.card-body -->
      </div>
     
      <!-- /.card -->
    </div>
   
  </div>


</section>


