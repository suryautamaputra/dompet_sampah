

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Status</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('index.php/admin_proses_edit/edit_status'); ?>">
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status (Lama)</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="status" name="status" class="form-control col-md-7 col-xs-12">
                            
                            <?php if( ! empty($order)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
                                      foreach($order as $data){ ?>

                            <option value="<?php echo $data->ORD_ID; ?>"><?php echo $data->STATUS; ?></option>

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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status (Baru)<!--<span class="required">*</span>-->
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="status_edit" name="status_edit" class="form-control col-md-7 col-xs-12">
                            
                            <?php if( ! empty($hasil)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
                                      foreach($hasil as $data){ ?>

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

              


            </div>
          </div>
        </div>

        <!-- /page content -->