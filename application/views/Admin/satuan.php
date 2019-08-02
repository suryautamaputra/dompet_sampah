

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
                    

                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Tambah Satuan Sampah</h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li class="dropdown">
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <br />
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('index.php/admin_sampah/tambah_satuan'); ?>">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Satuan
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="satuan_baru" name="satuan_baru" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                              <div class="ln_solid"></div>
                              <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                  <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                              </div>

                            </form>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>List Satuan</h2>
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
                                  <th>ID Satuan</th>
                                  <th>Nama Satuan</th>
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
                                <?php if( ! empty($satuan_sampah)){
                                              //foreach($satuan_sampah as $data2)
                                              foreach($satuan_sampah as $data)
                                                { ?>
                                
                                <tr>
                                                <td><?php echo $data->KODE_GENERAL_REF_DETAIL; ?></td>
                                                <td><?php echo $data->DESCRIPTION; ?></td>
                                                                                      
                                                
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
                      

                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Edit Satuan</h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li class="dropdown">
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <br />
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('index.php/admin_sampah/edit_satuan'); ?>">
                              
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Satuan (Lama)</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select id="satuan_id" name="satuan_id" class="form-control col-md-7 col-xs-12">
                                    
                                    <?php if( ! empty($satuan_sampah)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
                                              foreach($satuan_sampah as $data){ ?>

                                    <option value="<?php echo $data->KODE_GENERAL_REF_DETAIL; ?>"><?php echo $data->DESCRIPTION; ?></option>

                                    <?php } }else {
                                              echo "string";
                                            } 
                                      ?>

                                  </select>
                                </div>
                              </div>

                              <div class="ln_solid"></div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Satuan (Baru)
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="satuan_edit" name="satuan_edit" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                              <div class="ln_solid"></div>
                              <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                  <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                              </div>

                            </form>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Hapus Satuan</h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li class="dropdown">
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <br />
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('index.php/admin_sampah/hapus_satuan'); ?>">
                              
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Satuan</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select id="satuan_id" name="satuan_id" class="form-control col-md-7 col-xs-12">
                                    
                                    <?php if( ! empty($satuan_sampah)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
                                              foreach($satuan_sampah as $data){ ?>

                                    <option value="<?php echo $data->KODE_GENERAL_REF_DETAIL; ?>"><?php echo $data->DESCRIPTION; ?></option>

                                    <?php } }else {
                                              echo "string";
                                            } 
                                      ?>

                                  </select>
                                  <!--<span class="fa fa-bookmark form-control-feedback left" aria-hidden="true"></span>-->
                                </div>
                              </div>

                              <div class="ln_solid"></div>
                              <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                  <!--<button class="btn btn-primary" type="button">Cancel</button>
                                  <button class="btn btn-primary" type="reset">Reset</button>-->
                                  <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                              </div>

                            </form>
                          </div>
                        </div>
                      </div>


                    </div>
                  </div>
                </div>
        <!-- /page content -->