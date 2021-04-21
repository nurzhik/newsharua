

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Отзывы</h1>
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
      <h3 class="card-title">Отзывы</h3>
      <div class="card-tools">
        <a href="/admin/reviews/add" class="btn  btn-success">Добавить новый материал</a>
      </div>
		
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
                        Ссылка на видео
                    </th>
                    
                    <th style="width: 8%" class="text-center">
                        Статус
                    </th>
                </tr>
            </thead>
            <tbody>

  		
  			
  			 	  <?php foreach($data as $item): ?>
    					<tr>
    						<td>
    							<?=$item['Review']['id']?>
    						</td>
    					<td>
    						<a>
    						<?=$item['Review']['link']?>
    						</a>
    						<br/>
    						<small>
    							Дата создание  <?php echo $this->Time->format($item['Review']['created'], '%d.%m.%Y', 'invalid'); ?>   
    						</small>
    					</td>
    					
    					<td class="project-state">
    						<span class="badge badge-success">Добавлен</span>
    					</td>
    					<td class="project-actions text-right">
    						<a class="btn btn-info btn-sm" href="/admin/reviews/edit/<?=$item['Review']['id']?>">
    							<i class="fas fa-pencil-alt">
    							</i>
    							Редактировать
    						</a>
                
                
    		
    						<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Review']['id']), array('confirm' => 'Подтвердите удаление','value'=>'465','class' => 'btn btn-danger btn-sm')); ?>
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