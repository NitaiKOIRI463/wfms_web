<link rel="stylesheet" href="http://github.hubspot.com/odometer/themes/odometer-theme-car.css" />
<script src="http://github.hubspot.com/odometer/odometer.js"></script>

<style type="text/css">
.odometer {
    font-size: 2.8rem;
    height: 100%;
}
.odometer-inside{
  padding-top: 15%;
}
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
                    <span><?php echo $device_details[0]['company_name']; ?></span>
                  </div>

                  <div class="col-md-3">
                    <span>Device Type :</span>
                  </div>
                  <div class="col-md-3">
                    <span><?php echo $device_details[0]['device_type']; ?></span>
                  </div>

                  <div class="col-md-3 pt-3">
                    <span>Device Id :</span>
                  </div>
                  <div class="col-md-3 pt-3">
                    <span><?php echo $device_details[0]['device_id']; ?></span>
                  </div>

                  <div class="col-md-3 pt-3">
                    <span>IMEI No. :</span>
                  </div>
                  <div class="col-md-3 pt-3">
                    <span><?php echo $device_details[0]['imei_no']; ?></span>
                  </div>

                  <div class="col-md-3 pt-3">
                    <span>Date Of Installetion :</span>
                  </div>
                  <div class="col-md-3 pt-3">
                    <span><?php echo date('d-m-Y',strtotime($device_details[0]['date_of_installation'])); ?></span>
                  </div>

                  <div class="col-md-3 pt-3">
                    <span>Address :</span>
                  </div>
                  <div class="col-md-3 pt-3">
                    <span><?php echo $device_details[0]['address']; ?></span>
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
                      <h3 class="mb-0"><?php echo $device_status[0]['total_flow']; ?></h3>
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
                      <h3 class="mb-0"><?php echo $device_status[0]['flow_rate']; ?></h3>
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
                      <?php 
                        if($device_status[0]['last_minutes']<=5)
                        {
                          ?>
                            <img src="<?php echo base_url('assets/green.png'); ?>" style="height: 0%;width: 10%">
                          <?php
                        }else
                        {
                          ?>
                          <img src="<?php echo base_url('assets/red.png'); ?>" style="height: 0%;width: 10%">
                          <?php
                        }
                      ?>
                      
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="icon icon-box-success">
                      <span class="mdi mdi-pulse" style="font-size: 2rem;"></span>
                    </div>
                  </div>
                </div>
                <?php 
                    if($device_status[0]['last_minutes']<=5)
                    {
                      ?>
                        <h6 class="text-muted font-weight-normal">Active</h6>
                      <?php
                    }else
                    {
                      ?>
                      <h6 class="text-muted font-weight-normal">Deactive</h6>
                      <?php
                    }
                  ?>
                
              </div>
            </div>
          </div>

          <div class="col-md-4 google-map">
            <div id="map" style="border-radius: 10px;"></div>
          </div>
          <div style="text-center:center;" class="col-md-4">
            <div id="odometer" class="odometer" style="width: 476px;margin-left: 12%;">12345678900</div>
            <!-- <div class="operated-area">
              <div class="row">
                <div class="col-md-6 meter-box">
                  <div class="meter-list">
                    <ul>
                      <li class="mtr-7">0</li>
                      <li class="mtr-6">0</li>
                      <li class="mtr-5">0</li>
                      <li class="mtr-4">0</li>
                      <li class="mtr-3">0</li>
                      <li class="mtr-2">0</li>
                      <li class="mtr-1">0</li>
                      <li class="mtr-0">0</li>
                    </ul>
                  </div>
                </div>
                
              </div>
            </div> -->
          </div>
          <div style="text-center:center;" class="col-md-4">
           <div  id="chart_div"></div>
          </div>
          <!-- <div class="col-md-4">
            <div style="height:200px;padding: 60px;text-align: center;" class="operated-area">
              <label style="color: aquamarine;font-size: 1.2rem;">Last Operated</label><br>
              <span style="color: thistle;"> <?php echo date('d-m-Y H:i:s',strtotime($device_status[0]['last_operated'])); ?></span>
            </div>
          </div> -->

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
                <input type="date" name="from_date" onchange="getDeviceProfileData()" id="from_date" class="form-control" value="<?php echo date("Y-m-d",strtotime('-5 days')); ?>">
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>To Date</label>
                <input type="date" name="to_date"  onchange="getDeviceProfileData()" id="to_date" class="form-control" value="<?php echo date("Y-m-d"); ?>">
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <a href="#" class="btn btn-warning btn-icon-text" onclick="export_devices()" style="float: right;margin-top: 9%;">
                      <i class="mdi mdi-file-excel"></i> Export 
                  </a>
              </div>
            </div>

            <div class="col-lg-12">
              <div class="table-responsive">
                <table id="tbl_export" class="table table-dark" style="text-align: center;">
                  <thead>
                    <tr>
                      <th colspan="5"><h1 style="text-align:center;">Iotas Solutions Pvt. Ltd</h1></th>
                    </tr>
                    <tr>
                      <th colspan="5"><h3 style="text-align:center;">Device Mis Report as on <?php echo date('d-m-Y H:i:s'); ?></h3></th>
                    </tr>
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
                  <tbody id="tbl_data">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<style type="text/css">
   #map{
      height: 200px;
      width: 100%;
   }
   .meter-box
   {
    height: 200px;
    /*background: red;*/
    text-align: center;
   }
   .flow-box
   {
    height: 200px;
    /*background: yellow;*/
   }
   .meter-list{
    width: 100%;
    text-align: center;
    /*background: grey;*/
    height: 200px;

   }
    .meter-list ul 
    {
       width: 100%;
      padding: 0px;
      /*margin: 10px auto;*/
      /*margin: 10px;*/
    }
   .meter-list ul li{
    float: left;
    width: 12.5%;
    font-size: 55px;
    border: 1px solid black;
    list-style-type: none;
    background: white;
    color: black;
   }
   #chart_div{
    margin-left: 48%;
   }
</style>
<script type="text/javascript">
  
  function graphData(flowrateX,flowrateY,flowtotalX,flowtotalY)
  {
    var xValues = flowtotalX;
    var yValues = flowtotalY;

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
          // yAxes: [{ticks: {min: 6, max:16}}],
        }
      }
    });
    var xValues = flowrateX;
    var yValues = flowrateY;
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
          // yAxes: [{ticks: {min: 6, max:16}}],
        }
      }
    });
  }

</script>

<script type="text/javascript">
   function initMap() {
      c_lat = parseFloat('<?php echo $device_details[0]['latitude']; ?>');
      c_lng = parseFloat('<?php echo $device_details[0]['longitude']; ?>');
      directionsService = new google.maps.DirectionsService;
      directionsDisplay = new google.maps.DirectionsRenderer;
      map = new google.maps.Map(document.getElementById('map'), {
         zoom: 13,
         center: {
            lat: c_lat,
            lng: c_lng
         }
      });
      directionsDisplay.setMap(map);
      setLocation(c_lat,c_lng);

}

function setLocation(lat,lng)
{
   const image = "<?php echo base_url().'assets/blue.png'; ?>";
   const beachMarker = new google.maps.Marker({
      position: {
         lat: lat,
         lng: lng
      },
      map,
      icon: image,
      title: "Uluru (Ayers Rock)"
   });
   const contentString = "Hi Hellow";

   const infowindow = new google.maps.InfoWindow({
      content: contentString
   });
   beachMarker.addListener("click", () => {
      infowindow.open(map, beachMarker);
   });
}
google.charts.load('current', {'packages':['gauge']});
google.charts.setOnLoadCallback(drawChart);
let total_flow = parseFloat('<?php echo $device_status[0]['total_flow']; ?>');
let flow_rate = parseFloat('<?php echo $device_status[0]['flow_rate']; ?>');
showNoBox(total_flow);
function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['Flow Rate', flow_rate],
      ]);

      var options = {
        width: 200, height: 200,
        redFrom: 0, redTo: 10,
        yellowFrom:11, yellowTo: 100,
        minorTicks: 2
      };

      var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

      chart.draw(data, options);
    }

  function showNoBox(numberData)
  {
    let box_l = numberData.toString().length;
    let max_no = numberData.toString().length;
    i = 0;
    j = 7;
    while(i<8)
    {
    if(max_no<=8)
    {
      box_l--;
      if(i<max_no)
      {
        document.querySelector('.mtr-'+i).innerHTML = numberData.toString()[box_l];
      }else
      {
        document.querySelector('.mtr-'+i).innerHTML = '0';
      }
    }else
    {
      console.log(numberData.toString()[i])
      document.querySelector('.mtr-'+j).innerHTML = numberData.toString()[i];
      j--;
    }
      i++;
    }
    // console.log();
  }

function getXarray(flowrateY)
{
  let max = Math.max(...flowrateY);
  let finalarray = [];
  if(max<=10)
  {
    for(let i=1;i<=max;i++)
    {
      finalarray.push(i);
    }
  }else if(max>10 && max<=100)
  {
    for(let i=1;i<=max;i+=10)
    {
      finalarray.push(i);
    }
  }else if(max>100 && max<=500)
  {
    for(let i=1;i<=max;i+=50)
    {
      finalarray.push(i);
    }
  }else
  {
    for(let i=1;i<=max;i+=100)
    {
      finalarray.push(i);
    }
  }
  return finalarray;
}
getDeviceProfileData();
function getDeviceProfileData()
{
  let from_date = $('#from_date').val();
  let to_date = $('#to_date').val();
  let device_id = '<?php echo $this->uri->segment(3); ?>';
  $('#tbl_data').html('<tr><td colspan="3" style="text-align:center;">Proccessing Please Wait..</td><td style="text-align:center;" colspan="2">Proccessing Please Wait..</td></tr>');
  $.ajax({
    type:'POST',
    url:'<?php  echo base_url(); ?>Device/DeviceProfileFetchData',
    data:{from_date: from_date,to_date: to_date,device_id: device_id},
    success:function(res)
    {
      res = JSON.parse(res);
      let flow_details = res.data.flow_details;
      let flow_rate_details = res.data.flow_rate_details;
      $('#tbl_data').html('');
      if(flow_details.length>0)
      {
        
        let flowrateY  = [];
        let flowtotalY = [];

        $.each(flow_details,function(i,v){

          flowrateY.push(parseFloat(flow_rate_details[i].flow_rate));
          flowtotalY.push(parseFloat(flow_details[i].flow_measured));
          $('#tbl_data').append('<tr>'+
                                '<td>'+flow_details[i].date_time+'</td>'+
                                '<td>'+flow_details[i].total_flow+'</td>'+
                                '<td>'+flow_details[i].flow_measured+'</td>'+
                                '<td>'+flow_rate_details[i].date_time+'</td>'+
                                '<td>'+flow_rate_details[i].flow_rate+'</td>'+
                              '</tr>');
        });
        // console.log(getXarray(flowrateY),flowrateY,getXarray(flowtotalY),flowtotalY);
        graphData(getXarray(flowrateY),flowrateY,getXarray(flowtotalY),flowtotalY);
      }else
      {
        graphData([],[],[],[]);
        $('#tbl_data').html('<tr><td colspan="3" style="text-align:center;">No Record</td><td style="text-align:center;" colspan="2">No Record</td></tr>');
      } 
      
      
    }
  })
}

setTimeout(function(){
    odometer.innerHTML = 456;
}, 1000);

function export_devices() 
{
    $(function() {

    var a = document.createElement('a');
    var data_type = 'data:application/vnd.ms-excel;charset=utf-8';
    var table_html = $('#tbl_export')[0].outerHTML;
    table_html = table_html.replace(/<tfoot[\s\S.]*tfoot>/gmi, '');
    var css_html = '<style> .abc {display:none} td {border: 0.5pt solid #c0c0c0}</style>';
    a.href = data_type + ',' + encodeURIComponent('<html><head>' + css_html + '</head><body>'+ table_html +'</body></html>');
    a.download = 'deviceMis.xls';
    a.click();
    e.preventDefault();
});
}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfOsF1RlTvaLL35eKL6FBg0LvndiWQdBU&libraries=places&callback=initMap">
    </script>


