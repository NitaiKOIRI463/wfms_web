<style type="text/css">
  #map {
  height: 400px;
  /* The height is 400 pixels */
  width: 100%;
  /* The width is the width of the web page */
}
</style>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Device Profile </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Device</a></li>
          <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
      </nav>
    </div>

    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Device Details</h4>

            <div class="container">
                <div class="row">
                  <div class="col-md-3">
                    <span>Company Name :</span>
                  </div>
                  <div class="col-md-3">
                    <span>Iotas</span>
                  </div>

                  <div class="col-md-3">
                    <span>Device Type :</span>
                  </div>
                  <div class="col-md-3">
                    <span>Flow</span>
                  </div>

                  <div class="col-md-3 pt-3">
                    <span>Device Id :</span>
                  </div>
                  <div class="col-md-3 pt-3">
                    <span>45678854</span>
                  </div>

                  <div class="col-md-3 pt-3">
                    <span>IMEI No. :</span>
                  </div>
                  <div class="col-md-3 pt-3">
                    <span>444567776</span>
                  </div>

                  <div class="col-md-3 pt-3">
                    <span>Date Of Installetion :</span>
                  </div>
                  <div class="col-md-3 pt-3">
                    <span>04-06-2022</span>
                  </div>

                  <div class="col-md-3 pt-3">
                    <span>Address :</span>
                  </div>
                  <div class="col-md-3 pt-3">
                    <span>Ranchi Jharkhand</span>
                  </div>

                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Current Status</h4>
        <div class="row">

          <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-9">
                    <div class="d-flex align-items-center align-self-start">
                      <h3 class="mb-0">456756</h3>
                      <p class="text-success ml-2 mb-0 font-weight-medium">Ltr</p>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="icon icon-box-primary ">
                      <span class="mdi mdi-stairs" style="font-size: 2rem;"></span>
                    </div>
                  </div>
                </div>
                <h6 class="text-muted font-weight-normal">Total Flow</h6>
              </div>
            </div>
          </div>

          <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-9">
                    <div class="d-flex align-items-center align-self-start">
                      <h3 class="mb-0">1.5</h3>
                      <p class="text-success ml-2 mb-0 font-weight-medium">C³</p>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="icon icon-box-warning">
                      <span class="mdi mdi-guitar-electric" style="font-size: 2rem;"></span>
                    </div>
                  </div>
                </div>
                <h6 class="text-muted font-weight-normal">Current Flow Rate</h6>
              </div>
            </div>
          </div>

          <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-9">
                    <div class="d-flex align-items-center align-self-start">
                      <!-- <h3 class="mb-0">$12.34</h3> -->
                      <img src="<?php echo base_url('assets/green.png'); ?>" style="height: 0%;width: 10%">
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="icon icon-box-success">
                      <span class="mdi mdi-pulse" style="font-size: 2rem;"></span>
                    </div>
                  </div>
                </div>
                <h6 class="text-muted font-weight-normal">Active</h6>
              </div>
            </div>
          </div>

          <div class="col-xl-10 google-map">
            <div id="map"></div>
          </div>
          <div class="col-xl-2">
            <div class="operated-area">
              <label style="color: aquamarine;font-size: 1.2rem;">Last Operated</label><br>
              <span style="color: thistle;"> 04-04-2022 12:12:21</span>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="card mt-4">
      <div class="card-body">
        <h4 class="card-title">Flow MIS Report</h4>
        <div class="col-lg-12">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>From Date</label>
                <input type="date" name="from_date" id="from_date" class="form-control" value="<?php echo date("Y-m-d"); ?>">
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>To Date</label>
                <input type="date" name="to_date" id="to_date" class="form-control" value="<?php echo date("Y-m-d"); ?>">
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <a href="#" class="btn btn-warning btn-icon-text" style="float: right;margin-top: 9%;">
                      <i class="mdi mdi-file-excel"></i> Export 
                  </a>
              </div>
            </div>

            <div class="col-lg-12">
              <div class="table-responsive">
                <table class="table table-dark" style="text-align: center;">
                  <thead>
                    <tr>
                      <th colspan="3">
                          <span> Flow MIS</span>
                      </th>

                      <th colspan="2">
                          <span> Flow Rate MIS</span>
                      </th>
                    </tr>
                    <tr>
                      <th>Date Time</th>
                      <th>Totalizer</th>
                      <th>Totalflow</th>
                      <th>Date Time</th>
                      <th>Flow Rate</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>23-11-2022 12:12:12</td>
                      <td>54545</td>
                      <td>123</td>
                      <td>23-11-2022 12:12:12</td>
                      <td>111</td>
                    </tr>
                    <tr>
                      <td>23-11-2022 12:12:12</td>
                      <td>54545</td>
                      <td>123</td>
                      <td>23-11-2022 12:12:12</td>
                      <td>111</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="card mt-4">
      <div class="card-body">
        <h4 class="card-title">Trending Chart</h4>
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6">
              <h4 class="card-title" style="text-align: center;">Flow MIS</h4>
              <canvas id="myChart" style="width:100%;max-width:600px"></canvas>    
            </div>

            <div class="col-lg-6">
              <h4 class="card-title" style="text-align: center;">Flow Rate MIS</h4>
              <canvas id="flowRate" style="width:100%;max-width:600px"></canvas>    
            </div>
          </div>
        </div>
      </div>    
    </div>

  </div>

<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly"
      defer
    ></script>

<script type="text/javascript">
  var xValues = [50,60,70,80,90,100,110,120,130,140,150];
  var yValues = [7,8,8,9,9,9,10,11,14,14,15];

  new Chart("myChart", {
    type: "line",
    data: {
      labels: xValues,
      datasets: [{
        fill: false,
        lineTension: 0,
        backgroundColor: "rgba(0,0,255,1.0)",
        borderColor: "rgba(0,0,255,0.1)",
        data: yValues
      }]
    },
    options: {
      legend: {display: false},
      scales: {
        yAxes: [{ticks: {min: 6, max:16}}],
      }
    }
  });

  var xValues = [50,60,70,80,90,100,110,120,130,140,150];
  var yValues = [7,8,8,9,9,9,10,11,14,14,15];

  new Chart("flowRate", {
    type: "line",
    data: {
      labels: xValues,
      datasets: [{
        fill: false,
        lineTension: 0,
        backgroundColor: "rgba(0,0,255,1.0)",
        borderColor: "rgba(0,0,255,0.1)",
        data: yValues
      }]
    },
    options: {
      legend: {display: false},
      scales: {
        yAxes: [{ticks: {min: 6, max:16}}],
      }
    }
  });

</script>

<script type="text/javascript">
  // Initialize and add the map
function initMap() {
  // The location of Uluru
  const uluru = { lat: -25.344, lng: 131.031 };
  // The map, centered at Uluru
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 4,
    center: uluru,
  });
  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
  });
}

window.initMap = initMap;
</script>