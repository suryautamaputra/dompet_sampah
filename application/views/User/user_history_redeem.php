
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

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
              </div>
            </div>
          <!-- Tabel -->          
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List Reward</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <ul class="dropdown-menu" role="menu">
                        </ul>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <!-- <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                      <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                      <div class="text">
                        <?php
                          foreach ($poin as $show):
                              ?>
                                <tr>

                                  <td><?php echo $show->USR_POIN?></td>
                                </tr>

                              <?php

                          endforeach;
                          ?>
                      </div>

                      <h3>Poin</h3>
                      
                    </div>
                  </div> -->

                  <div class="x_content"> 

                    <!-- <div class="ln_solid"></div> -->

                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Tanggal</th>
                          <th>Nama Reward</th>
                          <th>Kode Voucher</th>
                          <th></th>
                          <!--<th>Last name</th>
                          <th>Position</th>
                          <th>Office</th>
                          <th>Age</th>
                          <th>Start date</th>
                          <th>Salary</th>
                          <th>Extn.</th>
                          <th>E-mail</th>-->
                        </tr>
                      </thead>
                      <tbody>

                      <?php if( ! empty($semua)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
                        $nomer=1;
                                      foreach($semua as $data){ ?>

                        
                        <tr>
                                        <td><?php echo $nomer++; ?></td>
                                        <td><?php echo $data->RDM_TANGGAL; ?></td>
                                        <td><?php echo $data->REWARD; ?></td>
                                        <td><?php echo $data->VOUCHER; ?></td>
                                         <td>
                                          <a href="<?= base_url('index.php/user_history_redeem/pdf/'. $data->RDM_ID); ?>"><button type="submit" class="btn btn-success">Download</button></a>
                                        </td>
                                        <!-- <td> <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button> </td> -->
                        </tr>
                        <?php } }else {
                                      echo "string";
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
        
        <!-- /page content -->