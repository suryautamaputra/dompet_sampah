

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
                    <h2>List Order</h2>
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
                          <th>Order ID</th>
                          <th>Total Berat</th>
                          <th>Total Item</th>
                          <th>Tanggal</th>
                          <th>Poin</th>
                          <th>Status</th>
                          <th>Lokasi</th>
                          <th>User</th>
                          <th>Kurir</th>
                          <th></th>
                          <!-- <th></th> -->
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
                           $nomer = 1;
                                      foreach($semua as $data){ ?>
                        
                        <tr>
                                        <td><?php echo $nomer++ ?></td>
                                        <td><?php echo $data->TOTAL_BERAT; ?></td>
                                        <td><?php echo $data->TOTAL_ITEM; ?></td>
                                        <td><?php echo $data->ORD_WAKTU; ?></td>
                                        <td><?php echo $data->ORD_POIN; ?></td>
                                        <td><?php echo $data->STATUS; ?></td>
                                        <td><?php echo $data->LOKASI; ?></td>
                                        <td><?php echo $data->USERS; ?></td>
                                        <td><?php echo $data->KURIR; ?></td>
                                        <!-- <td>
                                          <a method = "post" action="<?= base_url('index.php/kurir_pickup/index/'. $data->ORD_ID); ?>"><button type="submit" class="btn btn-success">Ambil Sampah</button></a>
                                        </td> -->
                                        <td>
                                          <a href="<?= base_url('index.php/kurir_detail/index/'. $data->ORD_ID); ?>"><button type="submit" class="btn btn-success">Detail</button></a>
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