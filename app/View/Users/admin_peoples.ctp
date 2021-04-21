
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
    <div class="card-body p-0">
      <?php if(!empty($data)): ?>
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">
                        ID
                    </th>
                    <th style="width: 40%">
                        Название
                    </th>
                    <th>Дата регистрации</th>
                    <th>Статус</th>
                    <th >
                        Дествия
                    </th>
                </tr>
            </thead>
            <tbody>
		 	    <?php foreach($data as $item): ?>
			 		<tr>
				 		<td><?=$item['User']['id']?></td>
				 		<td> <a href="/admin/peoples/edit/<?=$item['User']['id']?>"><?=$item['User']['username']?></a></td>
				 		<td><?php echo $this->Time->format($item['User']['created'], '%d.%m.%Y %H:%M:%S', 'invalid'); ?></td>
				 	<td><?php if ($item['User']['active'] == 'activate'): ?>
				 		Подтвержден
				 	<?php else: ?>
				 		Не подтвержден
				 	<?php endif ?></td>
			 			<td>
							<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['User']['id']), array('confirm' => 'Подтвердите удаление')); ?>
						</td>
					</tr>
				<?php endforeach ?>
            </tbody>
        </table>
      <?php else: ?>
        <p class="empty-text">К сожалению в данном разделе еще не добавлена информация...</p>
      <?php endif ?>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>