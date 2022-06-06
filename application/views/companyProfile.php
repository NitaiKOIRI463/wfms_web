<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Company </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Compnay</a></li>
          <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
      </nav>
    </div>

    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Company Details</h4>

            <div class="container">
                <div class="row">
                  <div class="col-md-3">
                    <span>Company Name :</span>
                  </div>
                  <div class="col-md-3">
                    <span><?php echo $profileData[0]['company_name']; ?></span>
                  </div>

                  <div class="col-md-3">
                    <span>Company Logo :</span>
                  </div>
                  <div class="col-md-3" style="margin-top: -14px;">
                    <div class="preview-thumbnail">
                          <img src="<?php echo $profileData[0]['logo']; ?>" alt="image" class="rounded-circle" style="max-height: 0%;max-width: 20%;">
                    </div>
                  </div>

                  <div class="col-md-3 pt-3">
                    <span>Company Website :</span>
                  </div>
                  <div class="col-md-3 pt-3">
                    <span><?php echo $profileData[0]['website']; ?></span>
                  </div>

                  <div class="col-md-3 pt-3">
                    <span>Contatct Person :</span>
                  </div>
                  <div class="col-md-3 pt-3">
                    <span><?php echo $profileData[0]['contact_person']; ?></span>
                  </div>

                  <div class="col-md-3 pt-3">
                    <span>Registration Date :</span>
                  </div>
                  <div class="col-md-3 pt-3">
                    <span><?php echo date('d-m-Y',strtotime($profileData[0]['registration_date'])); ?></span>
                  </div>

                  <div class="col-md-3 pt-3">
                    <span>State :</span>
                  </div>
                  <div class="col-md-3 pt-3">
                    <span><?php echo $profileData[0]['state_name']; ?></span>
                  </div>

                  <div class="col-md-3 pt-3">
                    <span>City :</span>
                  </div>
                  <div class="col-md-3 pt-3">
                    <span><?php echo $profileData[0]['city']; ?></span>
                  </div>

                  <div class="col-md-3 pt-3">
                    <span>Address :</span>
                  </div>
                  <div class="col-md-3 pt-3">
                    <span><?php echo $profileData[0]['address']; ?></span>
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
            <h4 class="card-title">Device Details</h4>

            <div class="table-responsive" style="max-height: 300%;overflow: auto;">
              <table class="table table-dark" style="text-align: center;">
                <thead>
                  <tr>
                    <th> Sl. No. </th>
                    <th> Device Id </th>
                    <th> Device Type </th>
                    <th> IMEI </th>
                    <th> Address </th>
                    <th> Installetion Date </th>
                    <th> Status </th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                    if(!empty($device_list))
                    {
                      foreach ($device_list as $key => $value) {
                          
                          ?>
                          <tr>
                              <td style="width: 1%;"><?php echo ($key+1); ?> </td>
                              <td> <?php echo $value['device_id'];  ?> </td>
                              <td> <?php echo $value['device_type'];  ?> </td>
                              <td> <?php echo $value['imei_no'];  ?></td>
                              <td> <?php echo $value['address'];  ?></td>
                              <td> <?php echo date('d-m-Y',strtotime($value['date_of_installation']));  ?> </td>
                              <td>
                                <?php
                                    if($value['address']<=5)
                                    {
                                      ?>
                                        <img src="<?php echo base_url('assets/green.png'); ?>" style="height: 0%;width: 15%">
                                        <p>Active</p>
                                      <?php
                                    }else
                                    {
                                      ?>
                                        <img src="<?php echo base_url('assets/red.png'); ?>" style="height: 0%;width: 15%">
                                        <p>Deactive</p>
                                      <?php
                                    }
                                  ?>
                                  
                              </td>
                            </tr>
                          <?php

                      }
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