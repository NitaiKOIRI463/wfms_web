<link rel="stylesheet" href="http://github.hubspot.com/odometer/themes/odometer-theme-car.css" />
<script src="http://github.hubspot.com/odometer/odometer.js"></script>

<style type="text/css">
  .icon.icon-box-info{
    width: 30px!important;
    height: 30px!important;
  }
  .odometer {
    font-size: 1.23rem;
}
</style>

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
                <h4 class="mb-1 mb-sm-0">Want to register new device ?</h4>
                <p class="mb-0 font-weight-normal d-none d-sm-block">Monitor and Analys your water flow.</p>
              </div>
              <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                <span>
                  <a href="<?php echo base_url('Company'); ?>" class="btn btn-outline-light btn-rounded get-started-btn">Upgrade Your Plan</a>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <h6 class="text-muted font-weight-normal">Flow Meter</h6>
                <div class="d-flex align-items-center align-self-start">
                  <div id="odometer" class="odometer"><?php if($dashboard != ''){echo $dashboard; }else{ echo "N/A"; } ?></div>
                  <!-- <h3 class="mb-0" style="color: mediumturquoise;"><?php if($dashboard != ''){echo $dashboard; }else{ echo "N/A"; } ?></h3> -->
                </div>
              </div>
             <!--  <div class="col-4">
                <div class="counting-area">
                  <div id="odometer" class="odometer">123</div>
                </div>
              </div> -->
              <div class="col-3">
                <div class="icon icon-box-success ">
                  <a href="#" class="icon icon-box-success "> <span class="mdi mdi-eye" style="font-size: 25px;"></span></a>
                  <!-- <span class="mdi mdi-hospital-building"></span> -->
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <h6 class="text-muted font-weight-normal">Welcome Admin</h6>
                <div class="d-flex align-items-center align-self-start">
                  <span style="margin-right: 3%;color: mediumturquoise;"> <?php echo date("Y-m-d"); ?> </span> AT <span style="margin-left: 3%;color: mediumturquoise;"> <?php echo date("H:i:s"); ?> </span>
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-primary">
                  <span class="mdi mdi-account-check" style="font-size: 25px;"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Device List</h4>
            <div class="export-btn pb-3" style="float: right;">
              <button class="btn btn-md btn-warning" onclick="export_devices()" type="button"> <i class="mdi mdi-file-excel"></i> Export</button>
            </div>
            <div class="table-responsive">
              <table id="deviceData" class="table table-dark" style="text-align: center;">
                <thead>
                  <tr>
                    <th> Sl. No. </th>
                    <th> Device Id </th>
                    <th> Device Type </th>
                    <th> IMEI </th>
                    <th> Status </th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    if(!empty($device_list))
                    {
                      foreach ($device_list as $key => $value) 
                      {
                        ?>
                          <tr>
                            <td style="width: 1%;"> <?php echo ($key+1); ?> </td>
                            <td> <?php echo $value['device_id']; ?> </td>
                            <td> <?php echo $value['device_type']; ?> </td>
                            <td> 34567876 </td>
                            <td>
                              <?php 
                                if($value['device_type'] <= '5')
                                {
                                  ?>
                                    <img src="<?php echo base_url('assets/green.png'); ?>" style="height: 0%;width: 10%">
                                  <?php
                                }else{
                                  ?>
                                    <img src="<?php echo base_url('assets/red.png'); ?>" style="height: 0%;width: 10%">
                                  <?php
                                }
                              ?>
                            </td>
                            <td> 
                              <a href="#" class="icon icon-box-info " style="margin-left: 30%;">
                                  <span class="mdi mdi-eye"></span>
                              </a>
                            </td>
                          </tr>
                        <?php
                      }
                    }else{
                      ?>
                        <tr><td colspan="6" style="text-align: center;">No Record Found !!</td></tr>
                      <?php
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

<script type="text/javascript">
  $(document).ready(function(){
        setTimeout(function(){
        odometer.innerHTML = 456;
    }, 1000);
  });
</script>

<script type="text/javascript">
    function export_devices() 
    {
        $(function() {

        var a = document.createElement('a');
        var data_type = 'data:application/vnd.ms-excel;charset=utf-8';
        var table_html = $('#deviceData')[0].outerHTML;
        table_html = table_html.replace(/<tfoot[\s\S.]*tfoot>/gmi, '');
        var css_html = '<style> .abc {display:none} td {border: 0.5pt solid #c0c0c0}</style>';
        a.href = data_type + ',' + encodeURIComponent('<html><head>' + css_html + '</head><body>'+ table_html +'</body></html>');
        a.download = 'deviceList.xls';
        a.click();
        e.preventDefault();
    });
   }
  </script>