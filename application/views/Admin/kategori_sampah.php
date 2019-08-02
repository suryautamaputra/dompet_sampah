

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tambah Kategori Sampah</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('index.php/admin_sampah/tambah_kategori_sampah'); ?>">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kategori Sampah<!--<span class="required">*</span>-->
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <!--<span class="fa fa-trash form-control-feedback left" aria-hidden="true"></span>-->
                          <input type="text" id="kategori_sampah_baru" name="kategori_sampah_baru" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <!--<button class="btn btn-primary" type="button">Cancel</button>
                          <button class="btn btn-primary" type="reset">Reset</button>-->
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            
          <!-- Tabel -->          
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List Kategori Sampah</h2>
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
                          <th>ID Kategori Sampah</th>
                          <th>Nama Kategori Sampah</th>
                          <th>Edit</th>
                          <th>Delete</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php if( ! empty($semua)){
                                      foreach($semua as $data){ ?>
                        
                        <tr>
                                        <td><?php echo $data->KODE_GENERAL_REF_DETAIL; ?></td>
                                        <td><?php echo $data->DESCRIPTION; ?></td>
                                        <td><a href="<?= site_url('')?>/admin_sampah/edit_kategori_sampah_e/<?= $data->KODE_GENERAL_REF_DETAIL?>" class="btn btn-success">Edit</a></td>
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
                    <h2>Edit Kategori Sampah</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('index.php/admin_sampah/edit_kategori_sampah'); ?>">
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kategori Sampah (Lama)</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="ksm_id" name="ksm_id" class="form-control col-md-7 col-xs-12">
                            
                            <?php if( ! empty($semua)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
                                      foreach($semua as $data){ ?>

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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kategori Sampah (Baru)<!--<span class="required">*</span>-->
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <!--<span class="fa fa-trash form-control-feedback left" aria-hidden="true"></span>-->
                          <input type="text" id="kategori_sampah_edit" name="kategori_sampah_edit" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <!--<button class="btn btn-primary" type="button">Cancel</button>
                          <button class="btn btn-primary" type="reset">Reset</button>-->
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
                    <h2>Hapus Kategori Sampah</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('index.php/admin_sampah/hapus_kategori_sampah'); ?>">
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kategori Sampah</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="ksm_id" name="ksm_id" class="form-control col-md-7 col-xs-12">
                            
                            <?php if( ! empty($semua)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
                                      foreach($semua as $data){ ?>

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