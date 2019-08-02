

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tambah Reward</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('index.php/admin_reward/tambah_reward'); ?>">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Reward
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <!--<span class="fa fa-trash form-control-feedback left" aria-hidden="true"></span>-->
                          <input type="text" id="reward_baru" name="reward_baru" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Poin
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="poin" name="poin" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Link Gambar
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="link" name="link" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <!--<button class="btn btn-primary" type="button">Cancel</button>-->
                          <button class="btn btn-primary" type="reset">Reset</button>
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
                  <div class="x_content">					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Reward ID</th>
                          <th>Nama Reward</th>
                          <th>Poin</th>
                          <th>Gambar</th>
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
                                        <td><?php echo $data->KODE_GENERAL_REF_DETAIL; ?></td>
                                        <td><?php echo $data->DESCRIPTION; ?></td>
                                        <td><?php echo $data->VALUE; ?></td>
                                        <td><img style="width: 50%; display: block;" src="<?php echo $data->PATH; ?>"/></td>
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
                    <h2>Edit Reward</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('index.php/admin_reward/edit_reward'); ?>">
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Reward (Lama)</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="rwd_id" name="rwd_id" class="form-control col-md-7 col-xs-12">
                            
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Reward (Baru)<!--<span class="required">*</span>-->
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <!--<span class="fa fa-trash form-control-feedback left" aria-hidden="true"></span>-->
                          <input type="text" id="reward_edit" name="reward_edit" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Poin<!--<span class="required">*</span>-->
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <!--<span class="fa fa-trash form-control-feedback left" aria-hidden="true"></span>-->
                          <input type="text" id="poin_edit" name="poin_edit" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Link Gambar<!--<span class="required">*</span>-->
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <!--<span class="fa fa-trash form-control-feedback left" aria-hidden="true"></span>-->
                          <input type="text" id="link_edit" name="link_edit" required="required" class="form-control col-md-7 col-xs-12">
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
                    <h2>Hapus Reward</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('index.php/admin_reward/hapus_reward'); ?>">
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Reward</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="reward_id" name="reward_id" class="form-control col-md-7 col-xs-12">
                            
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