
        <?= $this->session->flashdata('message'); ?>
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

                  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                      <!-- <div class="icon"><i class="fa fa-caret-square-o-right"></i></div> -->
                      <div class="count">
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
                  </div>

                  <div class="x_content"> 

                    <!-- <div class="ln_solid"></div> -->

                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Nama Reward</th>
                          <th>Gambar</th>
                          <th>Poin</th>
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
                                      foreach($semua as $data){ ?>
                        
                        <tr>
                                        <td><?php echo $data->DESCRIPTION; ?></td>
                                        <td><img style="width: 50%; display: block;" src="<?php echo $data->PATH; ?>"/></td>
                                        <!--<td><?php echo $data->PATH; ?></td>-->
                                        <td><?php echo $data->VALUE; ?></td>
                                        <td>
                                          <a href="<?= base_url('index.php/user_redeem/index/'. $data->KODE_GENERAL_REF_DETAIL.'/'.$data->VALUE); ?>"><button type="submit" class="btn btn-success">Redeem</button></a>
                                        </td>
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