

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
                    <h2>Timbang </h2>
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
                  <form method="POST" action="<?= base_url('index.php/admin_timbang/tambah_berat/'.$ordId); ?>">         
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Item</th>
                          <th>Kategori</th>
                          <th>Satuan</th>
                          <th>Jumlah</th>
                          <th>Berat</th>
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

                      <?php if( ! empty($hasil)){
                        $nomer=1;
                        $i=1;
                                      foreach($hasil as $data){ ?>
                        
                        <tr>
                                        <td><?php echo $nomer++; ?></td>
                                        <td><?php echo $data->ISM_NAMA; ?></td>
                                        <td><?php echo $data->KATEGORI; ?></td>
                                        <td><?php echo $data->SATUAN; ?></td>
                                        <td><?php echo $data->ESTIMASI_BERAT; ?></td>
                                        <td>
                                          <input type="text" id="berat<?php echo $data->ORDDETAIL_ID; ?>" name="berat<?php echo $data->ORDDETAIL_ID; ?>" class="form-control">
                                        </td>

                        </tr>
                        <?php } }else {
                                      echo "string";
                                    } 
                              ?>

                      </tbody>
                    </table>
                    <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
                  </form>
          
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- /page content -->