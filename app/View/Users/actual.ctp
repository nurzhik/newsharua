
    <section class="section cabinet-section">
        <div class="container">
          
            <ul class="breadcrumbs">
                <li><a href=""> Главная </a></li>
                <li><a href=""> Личный кабинет </a></li>
            </ul>
            <div class="title">Личный кабинет</div>
            <div class="cabinet-block">
                 <?=$this->element('sidebar') ?>

                <div class="links-body">
                    <div class="links-title-block">
                        <div class="links-title">ФАКТИЧЕСКИЕ РАССЧЕТЫ</div>
                    </div>
                    <div class="links-content">
                      <?php if($userLogin['User']['active'] == 'activate'): ?>
                        <div class="links-content__title">Доход и расход в графике</div>
                        <div class="block-graphic"> 
                            <figure class="highcharts-figure">
                                <div id="container"></div>
                                 <table id="datatable" style="display: none;">
                                  <thead>
                                    <tr>
                                      <th></th>
                                      <?php foreach ($actual_income as $item): ?>
                                      <th></th>
                                      <?php endforeach ?>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <th>1 квартал</th>
                                      <?php foreach ($actual_income as $item): ?>
                                        <td><?=$item['Actual']['first_quarter']?></td>
                                      <?php endforeach ?>
                                      
                                    </tr>
                                    <tr>
                                      <th>2 квартал</th>
                                     <?php foreach ($actual_income as $item): ?>
                                        <td><?=$item['Actual']['second_quarter']?></td>
                                      <?php endforeach ?>
                                    </tr>
                                    <tr>
                                      <th>3 квартал</th>
                                      <?php foreach ($actual_income as $item): ?>
                                        <td><?=$item['Actual']['third_quarter']?></td>
                                      <?php endforeach ?>
                                    </tr>
                                    <tr>
                                      <th>4 квартал</th>
                                     <?php foreach ($actual_income as $item): ?>
                                        <td><?=$item['Actual']['fourth_quarter']?></td>
                                      <?php endforeach ?>
                                    </tr>
                                  </tbody>
                                </table>
                              </figure>
                        </div>

                        <div class="block-graphic margin-graphic"> 
                            <figure class="highcharts-figure">
                                <div id="container-1"></div>
                                <table id="datatable-1" style="display: none;">
                                  <thead>
                                    <tr>
                                      <th></th>
                                      <?php foreach ($actual_cost as $item): ?>
                                      <th></th>
                                      <?php endforeach ?>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <th>1 квартал</th>
                                      <?php foreach ($actual_cost as $item): ?>
                                        <td><?=$item['Actual']['first_quarter']?></td>
                                      <?php endforeach ?>
                                      
                                    </tr>
                                    <tr>
                                      <th>2 квартал</th>
                                     <?php foreach ($actual_cost as $item): ?>
                                        <td><?=$item['Actual']['second_quarter']?></td>
                                      <?php endforeach ?>
                                    </tr>
                                    <tr>
                                      <th>3 квартал</th>
                                      <?php foreach ($actual_cost as $item): ?>
                                        <td><?=$item['Actual']['third_quarter']?></td>
                                      <?php endforeach ?>
                                    </tr>
                                    <tr>
                                      <th>4 квартал</th>
                                     <?php foreach ($actual_cost as $item): ?>
                                        <td><?=$item['Actual']['fourth_quarter']?></td>
                                      <?php endforeach ?>
                                    </tr>
                                  </tbody>
                                </table>
                              </figure>
                        </div>
                        <div class="links-content__title">Доходы</div>
                        <div class="block-table"> 
                            <table>
                                <tr>
                                    <th>Доходы</th>
                                    <th> </th>
                                    <th> 2 квартал </th>
                                    <th>3 квартал</th>
                                    <th> 4 квартал </th>
                                    <th> 2021 год </th>
                                  </tr>
                                   <?php foreach ($actual_income as $item): ?>
                                  <tr>
                                      <td><?=$item['Actual']['title_'.$l]?> </td>
                                      <td><?=($item['Actual']['first_quarter'] == 0 ) ?  '-' : $item['Actual']['first_quarter']  ?></td>
                                      <td><?=($item['Actual']['second_quarter'] == 0 ) ?  '-' : $item['Actual']['second_quarter']  ?></td>
                                      <td><?=($item['Actual']['third_quarter'] == 0 ) ?  '-' : $item['Actual']['third_quarter']  ?></td>
                                      <td><?=($item['Actual']['fourth_quarter'] == 0 ) ?  '-' : $item['Actual']['fourth_quarter']  ?></td>
                                    <td> <?=$item['Actual']['first_quarter'] + $item['Actual']['second_quarter']+$item['Actual']['third_quarter']+$item['Actual']['fourth_quarter'] ?> </td>
                                  </tr>
                                <?php endforeach ?>
                                  <tr>
                                    <td>Итого валовый доход</td>
                                    <?php 
                                    $total_first_quarter = 0;
                                    $total_second_quarter = 0;
                                    $total_third_quarter = 0;
                                    $total_fourth_quarter = 0;
                                      foreach ($actual_income as $item) {
                                       $total_first_quarter += $item['Actual']['first_quarter'];
                                       $total_second_quarter += $item['Actual']['second_quarter'];
                                       $total_third_quarter += $item['Actual']['third_quarter'];
                                       $total_fourth_quarter += $item['Actual']['fourth_quarter'];
                                      }
                                     ?>
                                   
                                    <td><?=$total_first_quarter?></td>
                                    <td><?=$total_second_quarter?></td>
                                    <td><?=$total_third_quarter?></td>
                                    <td> <?=$total_fourth_quarter?></td>
                                    <td><?=$total_first_quarter+$total_second_quarter+$total_third_quarter+$total_fourth_quarter?></td>
                                  </tr>
                                </table>
                            </table>
                        </div>
                        <div class="links-content__title">Расходы</div>
                        <div class="block-table"> 
                            <table>
                                    <tr>
                                        <th>Расходы</th>
                                        <th> </th>
                                        <th> 2 квартал </th>
                                        <th>3 квартал</th>
                                        <th> 4 квартал </th>
                                        <th> 2021 год </th>
                                      </tr>
                                      <?php foreach ($actual_cost as $item): ?>
                                        <tr>
                                            <td><?=$item['Actual']['title_'.$l]?> </td>
                                            <td><?=($item['Actual']['first_quarter'] == 0 ) ?  '-' : $item['Actual']['first_quarter']  ?></td>
                                            <td><?=($item['Actual']['second_quarter'] == 0 ) ?  '-' : $item['Actual']['second_quarter']  ?></td>
                                            <td><?=($item['Actual']['third_quarter'] == 0 ) ?  '-' : $item['Actual']['third_quarter']  ?></td>
                                            <td><?=($item['Actual']['fourth_quarter'] == 0 ) ?  '-' : $item['Actual']['fourth_quarter']  ?></td>
                                          <td> <?=$item['Actual']['first_quarter'] + $item['Actual']['second_quarter']+$item['Actual']['third_quarter']+$item['Actual']['fourth_quarter'] ?> </td>
                                        </tr>
                                      <?php endforeach ?>
                                        <tr>
                                          <td>Итого валовый расход</td>
                                          <?php 
                                          $total_first_quarter = 0;
                                          $total_second_quarter = 0;
                                          $total_third_quarter = 0;
                                          $total_fourth_quarter = 0;
                                            foreach ($actual_cost as $item) {
                                             $total_first_quarter += $item['Actual']['first_quarter'];
                                             $total_second_quarter += $item['Actual']['second_quarter'];
                                             $total_third_quarter += $item['Actual']['third_quarter'];
                                             $total_fourth_quarter += $item['Actual']['fourth_quarter'];
                                            }
                                           ?>
                                         
                                          <td><?=$total_first_quarter?></td>
                                          <td><?=$total_second_quarter?></td>
                                          <td><?=$total_third_quarter?></td>
                                          <td> <?=$total_fourth_quarter?></td>
                                          <td><?=$total_first_quarter+$total_second_quarter+$total_third_quarter+$total_fourth_quarter?></td>
                                        </tr>
                                </table>
                            </table>
                        </div>
                        <?php else: ?>
                          Ваш личный кабинет находится на рассмотрении у администратора. Чтобы личный кабинет был у вас доступен, администратор должен вас одобрить
                      <?php endif ?>
                    </div>


                </div>

            </div>
        </div>
    </section>

   
    <script src="/js/jquery-3.0.0.min.js"></script>

    <script src="/js/highchart-scripts/highcharts.js"></script>
    <script src="/js/highchart-scripts/data.js"></script>
    <script src="/js/highchart-scripts/export-data.js"></script>
    <script src="/js/highchart-scripts/exporting.js"></script>
    <script src="/js/highchart-scripts/accessibility.js"></script>
   
<script>

Highcharts.setOptions({
  lang:{
    downloadSVG: "Скачать документ в формате SVG",
    downloadPDF: "Скачать документ в формате PDF",
    downloadJPEG:"Скачать документ в формате JPEG",
    downloadPNG: "Скачать документ в формате PNG",
    viewFullscreen: "Посмотреть в полноэкранном режиме",
    printChart: "Распечатать диаграмму",
  }
});

Highcharts.chart('container', {
  data: {
      table: 'datatable'
  },
  chart: {
      type: 'column'
  },
  colors: ['#F7BF08', '#79B51F'],
  title: {
      text: 'Доход фактически'
  },
 
  yAxis: {
      allowDecimals: false,
      title: {
      text: ''
      }
  },  
  series: [
  <?php foreach ($actual_income as $item): ?>
     {
      name:"<?=$item['Actual']['title_ru']?>",
      },
  <?php endforeach ?>
   
  ],
  tooltip: {
      formatter: function () {
      return '<b>' + this.series.name + '</b><br/>' +
          this.point.y + ' ' + this.point.name.toLowerCase();
      }
  },
});

Highcharts.chart('container-1', {
  data: {
      table: 'datatable-1'
  },
  chart: {
      type: 'column'
  },
  colors: ['#F7BF08', '#79B51F'],
  title: {
      text: 'Расход фактически '
  },
  yAxis: {
      allowDecimals: false,
      title: {
      text: ''
      }
  },  
  series: [
     <?php foreach ($actual_cost as $item): ?>
     {
      name:"<?=$item['Actual']['title_ru']?>",
      },
  <?php endforeach ?>
  ],
  tooltip: {
      formatter: function () {
      return '<b>' + this.series.name + '</b><br/>' +
          this.point.y + ' ' + this.point.name.toLowerCase();
      }
  },
});
</script>