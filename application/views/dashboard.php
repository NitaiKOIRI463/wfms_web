

<style type="text/css">
  .icon.icon-box-success{
    width: 23px!important;
    height: 25px!important;
  }
  .icon.icon-box-danger{
    width: 23px!important;
    height: 25px!important;
  }
</style>

<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card corona-gradient-card">
          <div class="card-body py-0 px-0 px-sm-3">
            <div class="row align-items-center">
              <div class="col-4 col-sm-3 col-xl-2">
                <img src="<?php echo base_url(); ?>assets/images/dashboard/Group126%402x.png" class="gradient-corona-img img-fluid" alt="">
              </div>
              <div class="col-5 col-sm-7 col-xl-8 p-0">
                <h4 class="mb-1 mb-sm-0">Want to register company ?</h4>
                <p class="mb-0 font-weight-normal d-none d-sm-block">Monitor and Analys your water flow.</p>
              </div>
              <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                <span>
                  <a href="<?php echo base_url('Company'); ?>" class="btn btn-outline-light btn-rounded get-started-btn">Register Here</a>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">1234</h3>
                  <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-success ">
                  <span class="mdi mdi-hospital-building"></span>
                </div>
              </div>
            </div>
            <h6 class="text-muted font-weight-normal">Company</h6>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">1734</h3>
                  <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p> -->
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-primary">
                  <span class="mdi mdi-water"></span>
                </div>
              </div>
            </div>
            <h6 class="text-muted font-weight-normal">Water Flow</h6>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">1234</h3>
                  <!-- <p class="text-danger ml-2 mb-0 font-weight-medium">-2.4%</p> -->
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-info">
                  <span class="mdi mdi-account-check"></span>
                </div>
              </div>
            </div>
            <h6 class="text-muted font-weight-normal">Users</h6>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Flow History</h4>
            <div id="chart_div"></div>
            <!-- <canvas id="transaction-history" class="transaction-chart"></canvas> -->
            <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
              <div class="text-md-center text-xl-left">
                <h6 class="mb-1">Total Flow</h6>
                <p class="text-muted mb-0">2344</p>
              </div>
              <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                <!-- <h6 class="font-weight-bold mb-0">$236</h6> -->
              </div>
            </div>
            <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
              <div class="text-md-center text-xl-left">
                <h6 class="mb-1">Average Flow Rate</h6>
                <p class="text-muted mb-0">4543</p>
              </div>
              <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                <!-- <h6 class="font-weight-bold mb-0">$593</h6> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-8 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Online Device</h4>
            <div class="table-responsive">
              <table class="table" >
                <thead>
                  <tr>
                    <th> Sl. No. </th>
                    <th> Company </th>
                    <th> Device Id </th>
                    <th> Status </th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td> 1 </td>
                    <td>
                      <span class="pl-2">Iotas</span>
                    </td>
                    <td> IOTCMP01 </td>
                    <td>
                      <img src="<?php echo base_url('assets/green.png'); ?>" style="height: 0%;width: 15%">
                      <p>Active</p>
                    </td>
                    <td>
                        <div class="row">
                          <a href="#" class="icon icon-box-primary ">
                          <span class="mdi mdi-eye"></span>
                          </a>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td> 1 </td>
                    <td>
                      <span class="pl-2">Iotas</span>
                    </td>
                    <td> IOTCMP01 </td>
                    <td>
                      <img src="<?php echo base_url('assets/red.png'); ?>" style="height: 0%;width: 15%">
                        <p>Deactive</p>
                    </td>
                    <td>
                        <div class="row">
                          <a href="#" class="icon icon-box-primary ">
                          <span class="mdi mdi-eye"></span>
                          </a>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td> 1 </td>
                    <td>
                      <span class="pl-2">Iotas</span>
                    </td>
                    <td> IOTCMP01 </td>
                    <td>
                      <img src="<?php echo base_url('assets/red.png'); ?>" style="height: 0%;width: 15%">
                        <p>Deactive</p>
                    </td>
                    <td>
                        <div class="row">
                          <a href="#" class="icon icon-box-primary ">
                          <span class="mdi mdi-eye"></span>
                          </a>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td> 1 </td>
                    <td>
                      <span class="pl-2">Iotas</span>
                    </td>
                    <td> IOTCMP01 </td>
                    <td>
                      <img src="<?php echo base_url('assets/red.png'); ?>" style="height: 0%;width: 15%">
                        <p>Deactive</p>
                    </td>
                    <td>
                        <div class="row">
                          <a href="#" class="icon icon-box-primary ">
                          <span class="mdi mdi-eye"></span>
                          </a>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td> 1 </td>
                    <td>
                      <span class="pl-2">Iotas</span>
                    </td>
                    <td> IOTCMP01 </td>
                    <td>
                      <img src="<?php echo base_url('assets/red.png'); ?>" style="height: 0%;width: 15%">
                        <p>Deactive</p>
                    </td>
                    <td>
                        <div class="row">
                          <a href="#" class="icon icon-box-primary ">
                          <span class="mdi mdi-eye"></span>
                          </a>
                        </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<script type="text/javascript">
    google.charts.load('current', {'packages':['gauge']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['FLow Meter', 55],
      ]);

      var options = {
        width: 400, height: 120,
        redFrom: 90, redTo: 100,
        yellowFrom:75, yellowTo: 90,
        minorTicks: 2
      };

      var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

      chart.draw(data, options);

      setInterval(function() {
        data.setValue(0, 1, 40 + Math.round(60 * Math.random()));
        chart.draw(data, options);
      }, 13000);
      setInterval(function() {
        data.setValue(1, 1, 40 + Math.round(60 * Math.random()));
        chart.draw(data, options);
      }, 5000);
      setInterval(function() {
        data.setValue(2, 1, 60 + Math.round(20 * Math.random()));
        chart.draw(data, options);
      }, 26000);
    }
</script>