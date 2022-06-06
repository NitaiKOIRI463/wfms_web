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
      <h3 class="page-title">Mis Report </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Mis Report</a></li>
          <li class="breadcrumb-item active" aria-current="page">Mis Report</li>
        </ol>
      </nav>
    </div>

    <div class="card mt-4">
      <div class="card-body">
        <h4 class="card-title">Flow MIS Report</h4>
        <div class="col-lg-12">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Device</label>
                <select class="form-control" onchange="getDeviceProfileData()" name="imei_no" id="imei_no">
                  <option value="">ALL</option>
                  <?php 
                    if(!empty($device_list)){
                    foreach ($device_list as $key => $value) {
                      
                      ?>
                      <option value="<?php echo $value['imei_no']; ?>"><?php echo $value['device_id'].'['.$value['imei_no'].']'; ?></option>
                      <?php
                    }
                  } ?>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>From Date</label>
                <input type="date" name="from_date" onchange="getDeviceProfileData()" id="from_date" class="form-control" value="<?php echo date("Y-m-d",strtotime('-5 days')); ?>">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label>To Date</label>
                <input type="date" name="to_date"  onchange="getDeviceProfileData()" id="to_date" class="form-control" value="<?php echo date("Y-m-d"); ?>">
              </div>
            </div>

            <div class="col-md-3">
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
                          <span>Water Flow MIS</span>
                      </th>
                    </tr>
                    <tr>
                      <th>Sl. No.</th>
                      <th>Imei No.</th>
                      <th>Device Id</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Start Flow(Ltr)</th>
                      <th>End Flow(Ltr)</th>
                      <th>Total Flow(Ltr)</th>
                      <th>Flow Rate(LPM)</th>
                    </tr>
                  </thead>
                  <tbody id="tbl_data">
                    
                  </tbody>
                </table>
              </div>
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
    height: 100px;
    /*background: red;*/
    text-align: center;
   }
   .flow-box
   {
    height: 100px;
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
    margin-left: 35%;
   }
</style>

<script type="text/javascript">
  
getDeviceProfileData();
function getDeviceProfileData()
{
  let from_date = $('#from_date').val();
  let to_date = $('#to_date').val();
  let imei_no = $('#imei_no').val();
  $('#tbl_data').html('<tr><td colspan="3" style="text-align:center;">Proccessing Please Wait..</td><td style="text-align:center;" colspan="2">Proccessing Please Wait..</td></tr>');
  $.ajax({
    type:'POST',
    url:'<?php  echo base_url(); ?>MisReport/DeviceMisReportData',
    data:{from_date: from_date,to_date: to_date,imei_no: imei_no},
    success:function(res)
    {
      res = JSON.parse(res);
      let flow_details = res.data.flow_details;
      let flow_rate_details = res.data.flow_rate_details;
      $('#tbl_data').html('');
      if(flow_details.length>0)
      {

        $.each(flow_details,function(i,v){

          $('#tbl_data').append('<tr>'+
                                '<td>'+flow_details[i].date_time+'</td>'+
                                '<td>'+flow_details[i].total_flow+'</td>'+
                                '<td>'+flow_details[i].flow_measured+'</td>'+
                                '<td>'+flow_rate_details[i].date_time+'</td>'+
                                '<td>'+flow_rate_details[i].flow_rate+'</td>'+
                              '</tr>');
        });
        // console.log(getXarray(flowrateY),flowrateY,getXarray(flowtotalY),flowtotalY);
      }else
      {
        
        $('#tbl_data').html('<tr><td colspan="3" style="text-align:center;">No Record</td><td style="text-align:center;" colspan="2">No Record</td></tr>');
      } 
      
      
    }
  })
}

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


