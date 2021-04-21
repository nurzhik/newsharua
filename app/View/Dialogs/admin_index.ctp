<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Сообщения</h1>
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
      <h3 class="card-title">Сообщения</h3>
      <div class="card-tools">
        <!-- <a href="/admin/news/add?lang=ru" class="btn  btn-success">Добавить новый материал</a> -->
      </div>
		
    </div>
    <div class="card-body p-0">
      <table class="table table-striped projects">
          <thead>
              <tr>
                  <th style="width: 1%">
                      ID
                  </th>
                  <th style="width: 20%">
                      ФИО
                  </th>
                  <th style="width: 20%">
                      E-mail
                  </th>
                  <th style="width: 8%" class="text-center">
                      Статус
                  </th>
              </tr>
          </thead>
          <tbody>

			<?php if(!empty($data)): ?>
			
			 	<?php foreach($data as $item): ?>
					<tr>
						<td>
							<?=$item['Dialog']['id']?>
						</td>
					<td>
						<a>
						  <?=$item['User']['fio']?>
						</a>
						<br/>
						<small>
							Дата создание  <?php echo $this->Time->format($item['Dialog']['created'], '%d.%m.%Y', 'invalid'); ?>   
						</small>
					</td>
					<td>
            <?=$item['User']['username']?>
          </td>
					<td class="project-state">
            <?php if($item['Dialog']['status_admin']): ?>
              <span class="badge badge-warning">Не прочитано</span>
            <?php else: ?>
              <span class="badge badge-success">Прочитано</span>
            <?php endif ?>
					</td>
					<td class="project-actions text-right">
						<a class="btn btn-info btn-sm" href="/admin/dialogs/view/<?=$item['Dialog']['id']?>">
							<!-- <i class="fas fa-pencil-alt">
							</i> -->
							Посмотреть
						</a>
            
		
						<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Dialog']['id']), array('confirm' => 'Подтвердите удаление','value'=>'465','class' => 'btn btn-danger btn-sm')); ?>
					</td>
					</tr>
				<?php endforeach ?>
	
			<?php else: ?>
				<p>К сожалению в данном разделе еще не добавлена информация...</p>
			<?php endif ?>
          </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>