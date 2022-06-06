<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from technext.github.io/corona-free-dark-bootstrap-admin-template/pages/samples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Jun 2022 07:26:18 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Signin :: Water Flow Monitoring</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style type="text/css">
        form .error {
              color: #ff0000;
            }
    </style>

    <style type="text/css">
        .auth.login-bg{
            background-image: url('assets/back1.jpg');
            background: cover;
        }
        .img-fluid{
            max-width: 70%!important;
            height: auto;   
        }
        .text-left{
            text-align: center !important;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card" style="width: 100%!important;background-color: #191c2463">
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-7 mx-auto">
                              <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="<?= base_url();?>assets/flowmeter.png" alt="Login V2" /></div>
                            </div>

                            <div class="card col-lg-5 mx-auto">
                              <div class="card-body px-5 py-5">
                                <h3 class="card-title text-left mb-3">Login</h3>
                                <form name="LoginForm" method="POST" action="<?php echo base_url('Dashboard'); ?>">
                                  <div class="form-group">
                                    <label>Username </label>
                                    <input type="text" class="form-control" name="username" id="username" required placeholder="Enter username">
                                  </div>
                                  <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required placeholder="Enter password">
                                  </div>
                                  <div class="form-group d-flex align-items-center justify-content-between" style="float: right;">
                                    <!-- <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input"> Remember me </label>
                                    </div> -->
                                    <a href="#" class="forgot-pass">Forgot password</a>
                                  </div>
                                  <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <!-- <footer class="footer"> -->
      <!-- <div class="d-sm-flex justify-content-center justify-content-sm-between" style="text-align: center;">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Iotas Solutions Pvt. Ltd. 2022<br>

          Distributed By <a href="https://www.themewagon.com/"target="_blank">ThemeWagon</a>

        </span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Design & Developed By <a href="https://iotas-weapp.vercel.app/" target="_blank">Iotas Solutions</a></span>
      </div> -->
    <!-- </footer> -->
        </div>
      </div>
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?php echo base_url(); ?>assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo base_url(); ?>assets/js/off-canvas.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/hoverable-collapse.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/misc.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/settings.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/todolist.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <!-- endinject -->
  </body>

<!-- Mirrored from technext.github.io/corona-free-dark-bootstrap-admin-template/pages/samples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Jun 2022 07:26:18 GMT -->
</html>

<script type="text/javascript">
    $(function(){
        $("form[name='LoginForm']").validate({
            rules: {
                username: {
                    required: true,
                },
                password:{
                    required:true,
                },
            },

            messages: {
                username: "this field is required !",
                password: "this field is required !",
            },

            submitHandler: function(form){
                form.submit();
            }
        });
    });
</script>