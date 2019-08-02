<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dompet Sampah | </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets_dashboard/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets_dashboard/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>assets_dashboard/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url(); ?>assets_dashboard/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="<?php echo base_url(); ?>assets_dashboard/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets_dashboard/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets_dashboard/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets_dashboard/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets_dashboard/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>assets_dashboard/build/css/custom.css" rel="stylesheet">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a class="site_title"><i class="fa fa-trash"></i> <span>Dompet Sampah</span></a>
            </div>

            <div class="clearfix"></div>

            

            <br />
             <?php if($this->session->userdata('admin') == 1) {?> 
            <!-- sidebar menu Admin-->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-trash"></i> Master Sampah <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li class="active"><a href="<?= base_url('index.php/admin_sampah/kategori_sampah'); ?>">Kategori Sampah</a></li>
                      <li><a href="<?= base_url('index.php/admin_sampah/item_sampah'); ?>">Item Sampah</a></li>
                      <li><a href="<?= base_url('index.php/admin_sampah/satuan'); ?>">Satuan</a></li>
                    </ul>
                  </li>                  
                  <li><a href="<?= base_url('index.php/admin_lokasi'); ?>"><i class="fa fa-location-arrow"></i> Lokasi </span></a> </li>
                  <li><a href="<?= base_url('index.php/admin_user'); ?>"><i class="fa fa-male"></i> User </span></a> </li>
                  <li><a href="<?= base_url('index.php/admin_proses'); ?>"><i class="fa fa-clock-o"></i> On Process </span></a> </li>
                  <li><a href="<?= base_url('index.php/admin_order'); ?>"><i class="fa fa-history"></i> History Setor </span></a> </li>
                  <li><a href="<?= base_url('index.php/admin_reward'); ?>"><i class="fa fa-money"></i> Reward </span></a> </li>
                  <li><a href="<?= base_url('index.php/admin_redeem'); ?>"><i class="fa fa-credit-card"></i> Redeem </span></a> </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>

         <?php if($this->session->userdata('kurir') == 1) {?> 

        <!-- sidebar menu Kurir-->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="<?= base_url('index.php/kurir_proses'); ?>"><i class="fa fa-clock-o"></i> On Process </span></a> </li>
                  <li><a href="<?= base_url('index.php/kurir_order'); ?>"><i class="fa fa-history"></i> History Setor </span></a> </li>
                </ul>
              </div>
            </div>
            
          </div>
        </div>
        <?php } ?>

         <?php if($this->session->userdata('order') == 1) {?> 
        <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <!--<li><a href="<?= base_url('index.php/Welcome/kategori_sampah'); ?>"><i class="fa fa-trash"></i> Kategori Sampah </a> </li>-->
                  <li class="active"><a href="<?= base_url('index.php/user_order'); ?>"><i class="fa fa-bars"></i> Order </a> </li>
                  <li><a href="<?= base_url('index.php/user_reward'); ?>"><i class="fa fa-money"></i> Reward </span></a> </li>
                  <li><li><a href="<?= base_url('index.php/user_history_order'); ?>"><i class="fa fa-history"></i> History Order </span></a> </li>
                  <!--<li><a href="<?= base_url('index.php/Welcome/order'); ?>"><i class="fa fa-bars"></i> Order </span></a> </li>
                  <li><a href="<?= base_url('index.php/Welcome/reward'); ?>"><i class="fa fa-money"></i> Reward </span></a> </li>
                  <li><a href="<?= base_url('index.php/Welcome/redeem'); ?>"><i class="fa fa-credit-card"></i> Redeem </span></a> </li>-->
                </ul>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    
                    <li><a href="<?php echo base_url(); ?>index.php/Login/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->