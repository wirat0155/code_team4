<style>
  .text-glow {
    text-shadow: 0 0 80px rgb(192 219 255 / 75%), 0 0 32px rgb(65 120 255 / 24%);
    font-style: Poppins;
    color: white;

  }

  .relative {
    padding-top: 1%;
    position: relative;
    top: -70px;
    padding-left: 5%;
    padding-right: 5%;
  }

  hr.style {
    border-top: 1px solid #000;
    margin-top: 2%;
    width: 95%;
  }

  hr.style2 {
    border-top: 1px solid #707070;
    margin-top: 2%;
    width: 50%;
  }

  .page-inner {
    background-image: linear-gradient(to right, #089AD1, #0783B1, #066C93, #044D69);
    padding-top: 3%;
    padding-bottom: 7%;
  }

  /* .text-gradient:before {
    content: '';
    animation: animate infinite 8s;
  } */
  .chart-container {
    width: auto;
    height: auto;
  }
</style>
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0/chartjs-plugin-datalabels.min.js" integrity="sha512-R/QOHLpV1Ggq22vfDAWYOaMd5RopHrJNMxi8/lJu8Oihwi4Ho4BRFeiMiCefn9rasajKjnx9/fTQ/xkWnkDACg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="text-glow">
        <h1 style="font-size: 40px;"> DASHBOARD</h1>
        <hr class="style">
        <h3 style="font-size: 25px;">Container Statistics</h3>
      </div>
    </div>
    <div class="row justify-content-center align-items-center relative">
      <div class="col-sm-6 col-md-3">
        <div class="card ">
          <div class="card-body pb-0 ">
            <div class="h3">IMPORT
              <span class="circle-import float-right"><img src="<?php echo base_url() . '/upload/cargo_1.png' ?>"></span>
            </div>
            <h2 class="mt-0 ml-3">
              <?php echo $num_import ?>
            </h2>

            <?php if ($num_import >= $num_yesterday_import) : ?>
              <p class="mb-3" style="color: #09F600;">
                <i class="fas fa-arrow-up"></i>
                <?php echo "(+" . ($num_import - $num_yesterday_import) . ")"; ?>
                <label class="ml-3"> From yesterday</label>
              </p>
            <?php endif; ?>

            <?php if ($num_import < $num_yesterday_import) : ?>
              <p class="mb-3" style="color: #F60029;">
                <i class="fas fa-arrow-down"></i>
                <?php echo "(" . ($num_import - $num_yesterday_import) . ")"; ?>
                <label class="ml-3"> From yesterday</label>
              </p>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card ">
          <div class="card-body pb-0 ">
            <div class="h3">DROP
              <span class="circle-drop float-right"><img src="<?php echo base_url() . '/upload/container_2.png' ?>"></span>
            </div>
            <h2 class="mt-0 ml-3">
              <?php echo $num_drop; ?>
            </h2>
            <?php if ($num_drop >=  $num_yesterday_drop) { ?>
              <p class="mb-3" style="color: #09F600;">
                <i class="fas fa-arrow-up"></i>
                <?php echo "(+" . ($num_drop - $num_yesterday_drop) . ")"; ?>
                <label class="ml-3"> From yesterday</label>
              </p>
            <?php } else { ?>
              <p class="mb-3" style="color: #F60029;">
                <i class="fas fa-arrow-down"></i>
                <?php echo "(" . ($num_drop - $num_yesterday_drop) . ")"; ?>
                <label class="ml-3"> From yesterday</label>
              </p>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card ">
          <div class="card-body pb-0 ">
            <div class="h3">EXPORT
              <span class="circle-export float-right"><img src="<?php echo base_url() . '/upload/bg-export.png' ?>"></span>
            </div>
            <h2 class="mt-0 ml-3">
              <?php echo $num_export ?>
            </h2>
            <?php if ($num_export >= $num_yesterday_export) { ?>
              <p class="mb-3" style="color: #09F600;">
                <i class="fas fa-arrow-up"></i>
                <?php echo "(+" . ($num_export - $num_yesterday_export) . ")"; ?>
                <label class="ml-3"> From yesterday</label>
              </p>
            <?php } else { ?>
              <p class="mb-3" style="color: #F60029;">
                <i class="fas fa-arrow-down"></i>
                <?php echo "( " . ($num_export - $num_yesterday_export) . ")"; ?>
                <label class="ml-3"> From yesterday</label>
              </p>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card ">
          <div class="card-body pb-0 ">
            <div class="h3">TOTAL SERVICE
              <span class="circle-total float-right"><img src="<?php echo base_url() . '/upload/infinite.png' ?>"></span>
            </div>
            <h2 class="mt-0 ml-3">
              <?php
              $num_all = count($arr_service);
              echo $num_all;
              ?>
            </h2>
            <?php if ($num_all >= $num_yesterday_all) { ?>
              <p class="mb-3" style="color: #09F600;">
                <i class="fas fa-arrow-up"></i>
                <?php echo "(+" . ($num_all - $num_yesterday_all) . ")"; ?>
                <label class="ml-3"> From yesterday</label>
              </p>
            <?php } else { ?>
              <p class="mb-3" style="color: #F60029;">
                <i class="fas fa-arrow-down"></i>
                <?php echo "(" . ($num_all - $num_yesterday_all) . ")"; ?>
                <label class="ml-3"> From yesterday</label>
              </p>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>

    <div class="row d-flex justify-content-center">
      <!-- percent of container type -->
      <div class="col-sm-6 col-md-6">
        <div class="card p-3">
          <h2>Container Statistics 15 Day Back Chart</h2>
          <div class="chart-container">
            <canvas id="my_chart">
            </canvas>
          </div>
        </div>
      </div>
      <!-- percent of container type -->
      <div class="col-sm-6 col-md-4">
        <div class="card p-3">
          <h2>Percent of Container Type</h2>
          <div class="chart-container">
            <canvas id="my_chart2"></canvas>
            </canvas>
          </div>
        </div>
      </div>
    </div>
    <hr class="style2">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card p-3">
          <div class="card-body">
            <div class="table-responsive">
              <table id="service_list_table" class="display table table-hover cell-border" style="border-collapse: collapse !important; border-radius: 10px; overflow: hidden;">
                <h1>Service time today <span style="font-size: 60%"><i class="bi bi-calendar3 ml-3 mr-2"></i><?php echo date_thai($today) ?></span></h1>
                <thead>
                  <tr style="background-color: #999; color: #fff; ">
                    <th class="text-center">Container number</th>
                    <th class="text-center">Con. status</th>
                    <th class="text-center">Con. type</th>
                    <th class="text-center">Time</th>
                    <th class="text-center">Dep. location </th>
                    <th class="text-center">Exporter</th>
                    <th class="text-center">Car</th>
                    <th class="text-center">Customer</th>
                  </tr>
                </thead>
                <tbody>
                  <?php for ($i = 0; $i < count($arr_today_service); $i++) { ?>
                    <tr>
                      <td>
                        <?php echo $arr_today_service[$i]->con_number ?>
                      </td>
                      <td>
                        <?php
                        // 1 = import (sky blue)
                        if ($arr_today_service[$i]->ser_stac_id == '1') {
                          echo '<span class="bg-import text-white p-2" style="border-radius: 5px;">' . $arr_today_service[$i]->stac_name . '<span>';
                        }
                        // 4 = export (green)
                        else if ($arr_today_service[$i]->ser_stac_id == '4') {
                          echo '<span class="bg-export text-white p-2" style="border-radius: 5px;">' . $arr_today_service[$i]->stac_name . '<span>';
                        }
                        // 5 = defective 
                        else if ($arr_today_service[$i]->ser_stac_id == '5') {
                          echo '<span class="bg-defective text-white p-2" style="border-radius: 5px;">' . $arr_today_service[$i]->stac_name . '<span>';
                        }
                        // else  = drop
                        else {
                          echo '<span class="bg-drop text-white p-2" style="border-radius: 5px;">' . $arr_today_service[$i]->stac_name . '<span>';
                        }
                        ?>
                      </td>
                      <td>
                        <?php echo $arr_today_service[$i]->cont_name ?>
                      </td>
                      <td>
                        <?php
                        date_default_timezone_set("Asia/Bangkok");
                        $today = date('Y-m-d');
                        if (substr($arr_today_service[$i]->ser_departure_date, 0, 10) == $today) {
                          echo "Today, " . short_time($arr_today_service[$i]->ser_departure_date);
                        } else if ($arr_today_service[$i]->ser_departure_date == "0000-00-00 00:00:00" || $arr_today_service[$i]->ser_departure_date == NULL) {
                          echo "-";
                        } else {
                          echo date_thai($arr_today_service[$i]->ser_departure_date);
                        }
                        ?>
                      </td>
                      <td>
                        <?php echo $arr_today_service[$i]->ser_departure_location ?>
                      </td>
                      <td>
                        <?php echo $arr_today_service[$i]->dri_name ?>
                      </td>
                      <td>
                        รถคันที่ <?php echo $arr_today_service[$i]->car_number ?>
                      </td>
                      <td>
                        <?php echo $arr_today_service[$i]->cus_company_name ?>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#service_list_table').DataTable();
  });
  //set up block
  const data = {
    labels: <?php
            echo "[";
            for ($i = 0; $i < count($arr_num_cont) - 1; $i++) {
              echo "'" . $arr_container_type[$i]->cont_name . ' ' . $arr_num_cont[$i] . "'";
              echo ",";
            }
            echo "]";
            ?>,
    datasets: [{
      label: 'Current container type usage',
      data: <?php
            echo "[";
            for ($i = 0; $i < count($arr_num_cont) - 1; $i++) {
              echo $arr_num_cont[$i];
              echo ",";
            }
            echo "]";
            ?>,
      backgroundColor: [
        '#e03c31',
        '#ff7f41',
        '#753bbd',
        '#2dc84d',
        '#147bd1',
        '#f7ea48',
        '#ff928b',
        '#ffd23f',
        '#3bceac',
        '#0ead69',
      ],
      hoverOffset: 5
    }]
  };

  //option block
  const options = {
    responsive: true,
    plugins: {
      tooltip: {
        callbacks: {
          label: (context) => {
            const percent = context.parsed / <?php echo array_sum($arr_num_cont) ?> * 100;
            return `${context.label} Containers (${percent.toFixed(2)}%)`;
          }
        }
      },
      legend: {
        position: 'bottom',
        labels: {
          font: {
            Color: "white",
            size: 13,
            style: 'bold',
            textAlign: 'left'
          },
          boxWidth: 20,
          padding: 10
        },
      }
    }
  };

  //config block
  const config = {
    type: 'doughnut',
    data,
    options
  };

  //render block
  window.onload = function() {
    const my_chart = new Chart($('#my_chart2'), config);
  };

  // end-chart circle  

  const ctx = document.getElementById('my_chart').getContext('2d');
  const gradient_dataset_1 = ctx.createLinearGradient(0, 0, 0, 300);
  gradient_dataset_1.addColorStop(0, 'rgba(22, 172, 240, 0.7)');
  gradient_dataset_1.addColorStop(0.5, 'rgba(175, 212, 241, 0.5)');
  gradient_dataset_1.addColorStop(1, 'rgba(255, 255, 255, 0.3)');

  const gradient_dataset_2 = ctx.createLinearGradient(0, 0, 0, 300);
  gradient_dataset_2.addColorStop(0, 'rgba(245, 212, 50, 0.7)');
  gradient_dataset_2.addColorStop(0.5, 'rgba(241, 232, 175, 0.5)');
  gradient_dataset_2.addColorStop(1, 'rgba(255, 255, 255, 0.3)');

  const gradient_dataset_3 = ctx.createLinearGradient(0, 0, 0, 300);
  gradient_dataset_3.addColorStop(0, 'rgba(68, 187, 85, 0.7)');
  gradient_dataset_3.addColorStop(0.5, 'rgba(175, 241, 180, 0.5)');
  gradient_dataset_3.addColorStop(1, 'rgba(255, 255, 255, 0.3)');

  Chart.defaults.font.weight = '600';
  const legend_margin = {
    id: 'legend_margin',
    beforeInit(chart, legend, options) {
      const fit_value = chart.legend.fit;
      chart.legend.fit = function fit() {
        fit_value.bind(chart.legend)();
        return this.height += 50;
      }
    }
  };
  const my_chart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: <?php
              echo "[";
              for ($i = count($arr_dates) - 1; $i >= 0; $i--) {
                echo "'" . short_date($arr_dates[$i]) . "'";
                if ($i != 0) {
                  echo ",";
                }
              }
              echo "]";
              ?>,
      datasets: [{
          label: [
            ['IMPORT'], '<?php echo array_sum($arr_num_import) ?>'
          ],
          data: <?php
                echo "[";
                for ($i = count($arr_num_import) - 1; $i >= 0; $i--) {
                  echo $arr_num_import[$i];
                  if ($i != 0) {
                    echo ",";
                  }
                }
                echo "]";
                ?>,
          fill: false,
          tension: 0.4,
          pointBorderWidth: 2,
          pointBackgroundColor: '#16ACF0',
          pointBorderColor: '#FFFFFF',
          borderColor: '#16ACF0',
          backgroundColor: gradient_dataset_1
        },
        {
          label: [
            ['DROP'], '<?php echo array_sum($arr_num_import) + $arr_num_drop[count($arr_num_drop) - 1] ?>'
          ],
          data: <?php
                echo "[";
                for ($i = count($arr_num_drop) - 1; $i >= 0; $i--) {
                  echo $arr_num_drop[$i];
                  if ($i != 0) {
                    echo ",";
                  }
                }
                echo "]";
                ?>,
          fill: false,
          tension: 0.4,
          pointBorderWidth: 2,
          pointBackgroundColor: '#F5D432',
          pointBorderColor: '#FFFFFF',
          borderColor: '#F5D432',
          backgroundColor: gradient_dataset_2
        },
        {
          label: [
            ['EXPORT'], '<?php echo array_sum($arr_num_export) ?>'
          ],
          data: <?php
                echo "[";
                for ($i = count($arr_num_export) - 1; $i >= 0; $i--) {
                  echo $arr_num_export[$i];
                  if ($i != 0) {
                    echo ",";
                  }
                }
                echo "]";
                ?>,
          fill: false,
          tension: 0.4,
          pointBorderWidth: 2,
          pointBackgroundColor: '#44BB55',
          pointBorderColor: '#FFFFFF',
          borderColor: '#44BB55',
          backgroundColor: gradient_dataset_3
        }
      ]
    },
    options: {
      plugins: {
        legend: {
          labels: {
            // This more specific font property overrides the global property
            font: {
              color: "#44BB55",
              size: 16
            }
          }
        }
      },
      labels: {
        font: {
          font: 24,
        },
        boxWidth: 20,
        padding: 20
      },
      scales: {
        x: {
          title: {
            display: true,
            text: "Date",
          },
          grid: {
            color: 'rgba(112, 112, 112, 0.1)'
          },
        },
        y: {
          title: {
            display: true,
            text: "Number",
          },
          grid: {
            color: 'rgba(112, 112, 112, 0.1)'
          },
        }
      }
    },
    plugins: [legend_margin]


  });
</script>