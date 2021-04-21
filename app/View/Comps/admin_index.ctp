<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Элементы</h1>
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
      <h3 class="card-title">Элементы</h3>
      <!-- <div class="card-tools">
        <a href="/admin/comps/add?lang=ru" class="btn  btn-success">Добавить новый материал</a>
      </div> -->
		
    </div>
    <div class="card-body p-0">
      <table class="table table-striped projects">
          <thead>
              <tr>
                  <th style="width: 1%">
                      ID
                  </th>
                  <th style="width: 20%">
                      Комментарий
                  </th>
                  <th style="width: 40%">
                      Контент
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
							<?=$item['Comp']['id']?>
						</td>
						<td>
							<?=$item['Comp']['comments']?>
							<br/>
							<small>
								Дата создание  <?php echo $this->Time->format($item['Comp']['created'], '%d.%m.%Y', 'invalid'); ?>   
							</small>
						</td>
						<td>
						<a>
<?php  foreach($item['bodyTranslation'] as $title): ?>
	<?= $title['locale'] .': '. $this->Text->truncate(strip_tags($title['content']), 100, array('ellipsis' => '...', 'exact' => true)); ?><br>
<?php endforeach; ?>
						</a>
						
					</td>
					
					<td class="project-state">
						<span class="badge badge-success">Добавлен</span>
					</td>
					<td class="project-actions text-right">
						<a class="btn btn-info btn-sm" href="/admin/comps/edit/<?=$item['Comp']['id']?>?lang=ru">
							<i class="fas fa-pencil-alt">
							</i>
							Рус
						</a>
            <a class="btn btn-info btn-sm" href="/admin/comps/edit/<?=$item['Comp']['id']?>?lang=kz">
              <i class="fas fa-pencil-alt">
              </i>
              Кз
            </a>
            <a class="btn btn-info btn-sm" href="/admin/comps/edit/<?=$item['Comp']['id']?>?lang=en">
              <i class="fas fa-pencil-alt">
              </i>
              En
            </a>
		
						<!-- <?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Comp']['id']), array('confirm' => 'Подтвердите удаление','value'=>'465','class' => 'btn btn-danger btn-sm')); ?> -->
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