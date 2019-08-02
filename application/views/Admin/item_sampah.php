

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tambah Item Sampah</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('index.php/admin_sampah/tambah_item_sampah'); ?>">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Item Sampah
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="item_sampah_baru" name="item_sampah_baru" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori Sampah</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="ksm_id" name="ksm_id" class="form-control col-md-7 col-xs-12">
                            
                            <?php if( ! empty($kategori_sampah)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
                                      foreach($kategori_sampah as $data){ ?>

                            <option value="<?php echo $data->KODE_GENERAL_REF_DETAIL; ?>"><?php echo $data->DESCRIPTION; ?></option>

                            <?php } }else {
                                      echo "string";
                                    } 
                              ?>

                          </select>
                          <!--<span class="fa fa-bookmark form-control-feedback left" aria-hidden="true"></span>-->
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Satuan Sampah</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="ssm_id" name="ssm_id" class="form-control col-md-7 col-xs-12">
                            
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
                    <h2>List Item Sampah</h2>
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
                          <th>ID Item Sampah</th>
                          <th>Nama Item Sampah</th>
                          <th>Kategori Sampah</th>
                          <th>Satuan Sampah</th>
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
                        <?php if( ! empty($ism_s)){
                                      //foreach($satuan_sampah as $data2)
                                      foreach($ism_s as $data)
                                        { ?>
                        
                        <tr>
                                        <td><?php echo $data->ISM_ID; ?></td>
                                        <td><?php echo $data->ISM_NAMA; ?></td>
                                        <td><?php echo $data->KATEGORI; ?></td>
                                        <td><?php echo $data->SATUAN; ?></td>
                                        <!--<td>
                                          <?php echo $data2->DESCRIPTION; ?>
                                          <?php echo base_url('index.php/admin_sampah/item_sampah/'.$data->DESCRIPTION) ?>
                                           
                                          <a href="<?= base_url('index.php/admin_sampah/item_sampah/'.$data->DESCRIPTION) ?>"></a>
                                        </td>-->
                                        
                                        
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
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('index.php/admin_sampah/edit_item_sampah'); ?>">
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Item Sampah (Lama)</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="ism_id" name="ism_id" class="form-control col-md-7 col-xs-12">
                            
                            <?php if( ! empty($semua_query)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
                                      foreach($semua_query as $data){ ?>

                            <option value="<?php echo $data->ISM_ID; ?>"><?php echo $data->ISM_NAMA; ?></option>

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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Item Sampah (Baru)
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="item_sampah_edit" name="item_sampah_edit" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori Sampah (Baru)</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="ksm_id_edit" name="ksm_id_edit" class="form-control col-md-7 col-xs-12">
                            
                            <?php if( ! empty($kategori_sampah)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
                                      foreach($kategori_sampah as $data){ ?>

                            <option value="<?php echo $data->KODE_GENERAL_REF_DETAIL; ?>"><?php echo $data->DESCRIPTION; ?></option>

                            <?php } }else {
                                      echo "string";
                                    } 
                              ?>

                          </select>
                          <!--<span class="fa fa-bookmark form-control-feedback left" aria-hidden="true"></span>-->
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Satuan Sampah (Baru)</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="ssm_id_edit" name="ssm_id_edit" class="form-control col-md-7 col-xs-12">
                            
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
                    <h2>Hapus Item Sampah</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('index.php/admin_sampah/hapus_item_sampah'); ?>">
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kategori Sampah</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="ism_id" name="ism_id" class="form-control col-md-7 col-xs-12">
                            
                            <?php if( ! empty($semua_query)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
                                      foreach($semua_query as $data){ ?>

                            <option value="<?php echo $data->ISM_ID; ?>"><?php echo $data->ISM_NAMA; ?></option>

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

                    </form>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>
        <!-- /page content -->