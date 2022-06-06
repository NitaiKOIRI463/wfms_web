<style type="text/css">
  .icon.icon-box-success{
    width: 23px!important;
    height: 25px!important;
  }
  .icon.icon-box-danger{
    width: 23px!important;
    height: 25px!important;
  }
  .icon.icon-box-info{
    width: 23px!important;
    height: 25px!important;
  }
</style>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Device </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Device</a></li>
          <li class="breadcrumb-item active" aria-current="page">List</li>
        </ol>
      </nav>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Device List </h4>
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <!-- <label>Search</label> -->
                    <input type="text" name="search" id="search" class="form-control" placeholder="Serach......">
                  </div>
                </div>
                <div class="col-md-8">
                  <a href="<?php echo base_url('Dashboard'); ?>" class="btn btn-inverse-danger btn-icon" style="float: right;margin-left: 1%;font-size: 2rem;padding: 0.7%;">
                      <i class="mdi mdi-home-outline"></i>
                  </a>

                  <a href="#" class="btn btn-warning btn-icon-text" onclick="export_report()" style="float: right;margin-left: 1%;margin-top: 1%;">
                      <i class="mdi mdi-file-excel"></i> Export 
                  </a>

                  <a href="#" class="btn btn-primary btn-icon-text" data-toggle="modal" data-target="#exampleModal" style="float: right;margin-left: 1%;margin-top: 1%;">
                    <i class="mdi mdi-library-plus"></i> Assign Device 
                  </a>
                </div>
              </div>
            </div>
            <div class="table-responsive" style="max-height: 300%;overflow: auto;">
              <table class="table table-dark" id="deviceList" style="text-align: center;">
                <thead>
                  <tr>
                    <th> Sl. No. </th>
                    <th> Company Name </th>
                    <th> Device Id </th>
                    <th> Device Type </th>
                    <th> IMEI </th>
                    <th> City </th>
                    <th> Address </th>
                    <th> Date Of Installation </th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    if(!empty($device_list)) 
                    {
                      foreach ($device_list as $key => $list)
                       {
                        ?>
                        <tr>
                          <td><?php echo ($key+1); ?> </td>
                          <td><?php echo $list['company_name']; ?></td>
                          <td><?php echo $list['device_id']; ?></td>
                          <td><?php echo $list['device_type']; ?> </td>
                          <td><?php echo $list['imei_no']; ?></td>
                          <td><?php echo $list['city']; ?></td>
                          <td><?php echo $list['address']; ?></td>
                          <td><?php echo date('d-m-Y',strtotime($list['date_of_installation'])); ?></td>
                          <td>
                        <div class="row">
                          <a href="<?php echo base_url('Device/DeviceProfile/').$list['device_id']; ?>" class="icon icon-box-info " style="margin-right: 5%;">
                          <span class="mdi mdi-eye"></span>
                          </a>
                        </div>
                    </td>
                  </tr>
                  <?php
                      }
                    } else{
                        ?>
                        <tr><td colspan="8" style="text-align: center;"> No Record Found </td></tr>
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


<!-- company add area  -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Install Device</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="content-area">
          <form method="POST" action="<?php echo base_url("Device/AssignDeviceSubmit"); ?>" enctype="multipart/form-data">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Company Name</label>
                    <select style="color:white;" name="company_code" id="company_code" class="form-control" required>
                      <?php 
                      if(!empty($company_list))
                      {
                        foreach($company_list as $key=>$value)
                        {
                          ?>
                          <option value="<?php echo $value['company_code']; ?>"><?php echo $value['company_name']; ?></option>
                          <?php
                        }
                      }
                      ?>
                      
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>IMEI No.</label>
                    <select style="color:white;" name="imei_no" onchange="getimeiDetails(this.value)" id="imei_no" class="form-control" required>
                      <option value="">Select Imei</option>
                      <?php 
                      if(!empty($master_list))
                      {
                        foreach($master_list as $key=>$value)
                        {
                          ?>
                          <option value="<?php echo $value['imei_no'].'|'.$value['device_type'].'|'.$value['device_id']; ?>"><?php echo $value['imei_no']; ?></option>
                          <?php
                        }
                      }
                      ?>
                      
                    </select>
                    <input type="hidden" id="device_id" name="device_id" required="required">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Device Type</label>
                    <input style="color:black;" type="text" disabled="disabled" name="device_type" id="device_type" class="form-control" required>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Device Id</label>
                    <input style="color:black;" type="text" disabled="disabled" class="form-control" name="lbl_device_id" id="lbl_device_id">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>State</label>
                    <select style="color:white;" class="form-control" name="state" id="state">
                      <?php 
                        if(!empty($state_list))
                        {
                          foreach($state_list as $key=>$value)
                          {
                            ?>
                            <option value="<?php echo $value['state_code']; ?>"><?php echo $value['state_name']; ?></option>
                            <?php
                          }
                        }
                        ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>City</label>
                    <input style="color:white;" type="text" name="city" id="city" class="form-control" required placeholder="Enter city name">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Lattitude</label>
                    <input style="color:white;" type="text" step="any" name="latitude" id="latitude" class="form-control" required placeholder="Enter latitude">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Longitude</label>
                    <input style="color:white;" type="text" step="any" name="longitude" id="longitude" class="form-control" required placeholder="Enter longitude">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Date Of Installation.</label>
                    <input style="color:white;" type="date" name="installation_date" id="installation_date" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Address</label>
                    <textarea style="color:white;" class="form-control" name="address" id="address" required cols="2"></textarea>
                  </div>
                </div>

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
      
    </div>
  </div>
</div>

<?php 
    if($this->session->flashdata('success')!=null)
    {
        ?>
        <script type="text/javascript">
            swal('success','<?php echo $this->session->flashdata("success") ?>','success');
        </script>
        <?php
        $this->session->set_flashdata('success',null);
    }
    if($this->session->flashdata('error')!=null)
    {
        ?>
        <script type="text/javascript">
            swal('error','<?php echo $this->session->flashdata("error") ?>','error');
        </script>
        <?php
        $this->session->set_flashdata('error',null);
    }
?>


<style type="text/css">
  input{
    color: white;
    background: black;
  }
</style>
<script type="text/javascript">

  function getimeiDetails(value)
  {
    let imei_no = value.split('|')[0];
    let device_type = value.split('|')[1];
    let device_id = value.split('|')[2];
    $('#device_type').val(device_type);
    $('#device_id').val(device_id);
    $('#lbl_device_id').val(device_id);
    console.log();
  }
    function export_report()
    {
        $(function() {
        var a = document.createElement('a');
        var data_type = 'data:application/vnd.ms-excel;charset=utf-8';
        var table_html = $('#deviceList')[0].outerHTML;
        table_html = table_html.replace(/<tfoot[\s\S.]*tfoot>/gmi, '');
        var css_html = '<style> .abc {display:none} td {border: 0.5pt solid #c0c0c0}</style>';
        a.href = data_type + ',' + encodeURIComponent('<html><head>' + css_html + '</head><body>'+ table_html +'</body></html>');
        a.download = 'DeviceList.xls';
        a.click();
        e.preventDefault();
    });
}
</script>
