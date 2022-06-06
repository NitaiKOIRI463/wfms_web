<body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <span><h6 class="sidebar-brand brand-logo" style="color: lightsteelblue;">Water Monitoring</h6></span>
          <span><h4 class="sidebar-brand brand-logo-mini" style="color: lightsteelblue;">W M</h4></span>
          <!-- <a class="sidebar-brand brand-logo" href="index-2.html"><img src="<?php echo base_url(); ?>assets/images/logo.svg" alt="logo" /></a> -->
          <!-- <a class="sidebar-brand brand-logo-mini" href="index-2.html"><img src="<?php echo base_url(); ?>assets/images/logo-mini.svg" alt="logo" /></a> -->
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="<?php echo base_url(); ?>assets/images/faces/face15.jpg" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">Mani Singh</h5>
                  <span>Admin</span>
                </div>
              </div>
              <!-- <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a> -->
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Menu</span>
          </li>
          <?php 
            if($this->session->userdata('user_id') == '1')
            {
              ?>
                <li class="nav-item menu-items">
                  <a class="nav-link" href="<?php echo base_url('Dashboard'); ?>">
                    <span class="menu-icon">
                      <i class="mdi mdi-speedometer"></i>
                    </span>
                    <span class="menu-title">Dashboard</span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url('Company'); ?>">
                    <span class="menu-icon">
                      <i class="mdi mdi-playlist-play"></i>
                    </span>
                    <span class="menu-title">Company</span>
                  </a>
                </li>
                <li class="nav-item menu-items">
                  <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <span class="menu-icon">
                      <i class="mdi mdi-laptop"></i>
                    </span>
                    <span class="menu-title">Config</span>
                    <i class="menu-arrow"></i>
                  </a>
                  <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('Device'); ?>">Device</a></li>
                      <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('CompanyProfile'); ?>">Profile</a></li>
                      <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('ChangePassword'); ?>">Password</a></li>
                    </ul>
                  </div>
                </li>
              <?php
            }else if($this->session->userdata('user_id') == '2')
            {
              ?>
                <li class="nav-item menu-items">
                  <a class="nav-link" href="<?php echo base_url('CompanyDashboard'); ?>">
                    <span class="menu-icon">
                      <i class="mdi mdi-speedometer"></i>
                    </span>
                    <span class="menu-title">Dashboard</span>
                  </a>
                </li>
                <li class="nav-item menu-items">
                  <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                    <span class="menu-icon">
                      <i class="mdi mdi-security"></i>
                    </span>
                    <span class="menu-title">Device</span>
                    <i class="menu-arrow"></i>
                  </a>
                  <div class="collapse" id="auth">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item"> <a class="nav-link" href="#"> MIS </a></li>
                      <li class="nav-item"> <a class="nav-link" href="#"> Individual </a></li>
                    </ul>
                  </div>
                </li>

                <li class="nav-item menu-items">
                  <a class="nav-link" href="#">
                    <span class="menu-icon">
                      <i class="mdi mdi-chart-bar"></i>
                    </span>
                    <span class="menu-title">Config</span>
                  </a>
                </li>
              <?php
            }
          ?>
        </ul>
      </nav>