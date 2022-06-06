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

<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Company </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Compnay</a></li>
          <li class="breadcrumb-item active" aria-current="page">List</li>
        </ol>
      </nav>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Company List</h4>
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
                    <i class="mdi mdi-library-plus"></i> Add Company 
                  </a>
                </div>
              </div>
            </div>
            <div class="table-responsive" style="max-height: 300%;overflow: auto;">
              <table class="table table-dark" id="companyList" style="text-align: center;">
                <thead>
                  <tr>
                    <th> Sl. No. </th>
                    <th> Company Name </th>
                    <th> Contact Person </th>
                    <th> Contact Person No </th>
                    <th> Address </th>
                    <th> City </th>
                    <th> State </th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    if(!empty($com_list)) 
                    {
                      foreach ($com_list as $key => $list)
                       {
                        ?>
                        <tr>
                          <td style="width: 1%;"><?php echo ($key+1); ?> </td>
                          <td><?php echo $list['company_name']; ?></td>
                          <td><?php echo $list['contact_person']; ?></td>
                          <td><?php echo $list['contact_no']; ?> </td>
                          <td><?php echo $list['address']; ?></td>
                          <td><?php echo $list['city']; ?></td>
                          <td><?php echo $list['state']; ?></td>
                          <td>
                            <div class="row">
                              <a href="#" class="icon icon-box-info " style="margin-right: 5%;">
                              <span class="mdi mdi-eye"></span>
                              </a>

                              <a href="#" class="icon icon-box-success " style="margin-right: 5%;">
                                <span class="mdi mdi-grease-pencil"></span>
                              </a>

                              <a href="#" class="icon icon-box-danger ">
                                <span class="mdi mdi-block-helper"></span>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Company</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="content-area">
          <form method="POST" action="#" enctype="multipart/form-data">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Company Name</label>
                    <input type="text" name="company_name" id="company_name" class="form-control" required placeholder="Enter company name">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Company Logo</label>
                    <input type="file" name="company_logo" id="company_logo" class="form-control" required>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Website Url</label>
                    <input type="text" name="website_url" id="website_url" class="form-control" required placeholder="Enter website url">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>email</label>
                    <input type="email" name="email" id="email" class="form-control" required placeholder="Enter email id">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Contact Person Name</label>
                    <input type="text" name="contact_person" id="contact_person" class="form-control" required placeholder="Enter contact person">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" name="contact_number" id="contact_number" class="form-control" required placeholder="Enter contact number">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Registration Date</label>
                    <input type="date" name="registration_date" id="registration_date" class="form-control" required>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Expiry Date</label>
                    <input type="date" name="expiry_date" id="expiry_date" class="form-control" required>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>State</label>
                    <input type="text" name="state" id="state" class="form-control" required placeholder="Enter state name">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>City</label>
                    <input type="text" name="city" id="city" class="form-control" required placeholder="Enter city name">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="address" id="address" required cols="2"></textarea>
                  </div>
                </div>

              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    function export_report()
    {
        $(function() {
        var a = document.createElement('a');
        var data_type = 'data:application/vnd.ms-excel;charset=utf-8';
        var table_html = $('#companyList')[0].outerHTML;
        table_html = table_html.replace(/<tfoot[\s\S.]*tfoot>/gmi, '');
        var css_html = '<style> .abc {display:none} td {border: 0.5pt solid #c0c0c0}</style>';
        a.href = data_type + ',' + encodeURIComponent('<html><head>' + css_html + '</head><body>'+ table_html +'</body></html>');
        a.download = 'CompanyList.xls';
        a.click();
        e.preventDefault();
    });
}
</script>
