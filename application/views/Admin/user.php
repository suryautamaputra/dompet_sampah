

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
                    <h2>List User</h2>
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
                  <div class="x_content">					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>Kurir</th>
                          <th>Order</th>
                          <th>Tengkulak</th>
                          <th>Admin</th>
                          <th>Poin</th>
                          <th>Rating</th>
                          <!--<th>First name</th>
                          <th>Last name</th>
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

                        <?php if( ! empty($semua)){
                                      foreach($semua as $data){ ?>
                        
                        <tr>
                                        <td><?php echo $data->USR_NAMA; ?></td>
                                        <td><?php echo $data->USR_EMAIL; ?></td>

                                        <?php 
                                              $kurir = $data->AS_KURIR;
                                              if ($kurir == 1) { ?>
                                        <td>
                                              <button type="button" class="btn btn-sm"><i class="fa fa-check"></i></button>
                                              
                                        </td>

                                        <?php } else {?> 
                                            <td>
                                              <button type="button" class="btn btn-sm"><i class="fa fa-times"></i></button>
                                              
                                          </td>
                                        <?php } ?>

                                        <?php 
                                              $order = $data->AS_ORDER;
                                              if ($order == 1) { ?>
                                        <td>
                                              <button type="button" class="btn btn-sm"><i class="fa fa-check"></i></button>
                                              
                                        </td>

                                        <?php } else {?> 
                                            <td>
                                              <button type="button" class="btn btn-sm"><i class="fa fa-times"></i></button>
                                              
                                          </td>
                                        <?php } ?>

                                        <?php 
                                              $tengkulak = $data->AS_TENGKULAK;
                                              if ($tengkulak == 1) { ?>
                                        <td>
                                              <button type="button" class="btn btn-sm"><i class="fa fa-check"></i></button>
                                              
                                        </td>

                                        <?php } else {?> 
                                            <td>
                                              <button type="button" class="btn btn-sm"><i class="fa fa-times"></i></button>
                                              
                                          </td>
                                        <?php } ?>

                                        <?php 
                                              $admin = $data->AS_ADMIN;
                                              if ($admin == 1) { ?>
                                        <td>
                                              <button type="button" class="btn btn-sm"><i class="fa fa-check"></i></button>
                                              
                                        </td>

                                        <?php } else {?> 
                                            <td>
                                              <button type="button" class="btn btn-sm"><i class="fa fa-times"></i></button>
                                              
                                          </td>
                                        <?php } ?>

                                        <!--<td><?php echo $data->AS_KURIR; ?></td>-->
                                        <!--<td><?php echo $data->AS_ORDER; ?></td>-->
                                        <!--<td><?php echo $data->AS_TENGKULAK; ?></td>-->
                                        <td><?php echo $data->USR_POIN; ?></td>
                                        <td><?php echo $data->USR_RATING; ?></td>
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