          
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <!--<li><a href="<?= base_url('index.php/Welcome/kategori_sampah'); ?>"><i class="fa fa-trash"></i> Kategori Sampah </a> </li>-->
                  <li class="active"><a href="<?= base_url('index.php/user_order'); ?>"><i class="fa fa-bars"></i> Order </a> </li>
                  <li><a href="<?= base_url('index.php/user_reward'); ?>"><i class="fa fa-money"></i> Reward </span></a> </li>
                  <li><li><a href="<?= base_url('index.php/user_history_order'); ?>"><i class="fa fa-history"></i> History Order </span></a> </li>
                  <!--<li><a href="<?= base_url('index.php/Welcome/order'); ?>"><i class="fa fa-bars"></i> Order </span></a> </li>
                  <li><a href="<?= base_url('index.php/Welcome/reward'); ?>"><i class="fa fa-money"></i> Reward </span></a> </li>
                  <li><a href="<?= base_url('index.php/Welcome/redeem'); ?>"><i class="fa fa-credit-card"></i> Redeem </span></a> </li>-->
                </ul>
              </div>
            </div>
          </div>
        </div>

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
                    
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
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
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Sampah <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control">
                            <option>Choose option</option>
                            <option>Option one</option>
                            <option>Option two</option>
                            <option>Option three</option>
                            <option>Option four</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Berat Sampah<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Lokasi <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control">
                            <option>Choose option</option>
                            <option>Option one</option>
                            <option>Option two</option>
                            <option>Option three</option>
                            <option>Option four</option>
                          </select>
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
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Rician Order</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <section class="content invoice">

                      <!-- Table row -->
                      <div class="row">
                        <div class="col-xs-12 table">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Qty</th>
                                <th>Product</th>
                                <th>Serial #</th>
                                <th style="width: 59%">Description</th>
                                <th>Subtotal</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td>Call of Duty</td>
                                <td>455-981-221</td>
                                <td>El snort testosterone trophy driving gloves handsome gerry Richardson helvetica tousled street art master testosterone trophy driving gloves handsome gerry Richardson
                                </td>
                                <td>$64.50</td>
                              </tr>
                              <tr>
                                <td>1</td>
                                <td>Need for Speed IV</td>
                                <td>247-925-726</td>
                                <td>Wes Anderson umami biodiesel</td>
                                <td>$50.00</td>
                              </tr>
                              <tr>
                                <td>1</td>
                                <td>Monsters DVD</td>
                                <td>735-845-642</td>
                                <td>Terry Richardson helvetica tousled street art master, El snort testosterone trophy driving gloves handsome letterpress erry Richardson helvetica tousled</td>
                                <td>$10.70</td>
                              </tr>
                              <tr>
                                <td>1</td>
                                <td>Grown Ups Blue Ray</td>
                                <td>422-568-642</td>
                                <td>Tousled lomo letterpress erry Richardson helvetica tousled street art master helvetica tousled street art master, El snort testosterone</td>
                                <td>$25.99</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!--<div class="row">
                        <!-- accepted payments column -->
                        <!--<div class="col-xs-6">
                          <p class="lead">Payment Methods:</p>
                          <img src="images/visa.png" alt="Visa">
                          <img src="images/mastercard.png" alt="Mastercard">
                          <img src="images/american-express.png" alt="American Express">
                          <img src="images/paypal.png" alt="Paypal">
                          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                          </p>
                        </div>
                        <!-- /.col -->
                        <!--<div class="col-xs-6">
                          <p class="lead">Amount Due 2/22/2014</p>
                          <div class="table-responsive">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <th style="width:50%">Subtotal:</th>
                                  <td>$250.30</td>
                                </tr>
                                <tr>
                                  <th>Tax (9.3%)</th>
                                  <td>$10.34</td>
                                </tr>
                                <tr>
                                  <th>Shipping:</th>
                                  <td>$5.80</td>
                                </tr>
                                <tr>
                                  <th>Total:</th>
                                  <td>$265.24</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>-->
                        <!-- /.col -->
                      <!--</div>
                      <!-- /.row -->

                      <!-- this row will not appear when printing -->
                      <div class="row no-print">
                        <div class="col-xs-12">
                          <!--<button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>-->
                          <button class="btn btn-success pull-right"><!--<i class="fa fa-credit-card"></i>--> Submit</button>
                          <!--<button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>-->
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </div>

          <!--<div class="container">
            <div class="panel panel-default">
              <div class="panel-heading">Add Remove input fields Dynamically using jQuery Bootstrap</div>
              <div class="panel-body">
                  <form action="" >
                  <div class="input-group control-group after-add-more">
                   <input type="text" name="addmore[]" class="form-control" placeholder="Enter Name Here">
                      <div class="input-group-btn"> 
                      <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                      </div>
                  </div>         
                  </form>
                  <!-- Copy Fields-These are the fields which we get through jquery and then add after the above input,-->
                  <!--<div class="copy-fields hide">
                    <div class="control-group input-group" style="margin-top:10px">
                      <input type="text" name="addmore[]" class="form-control" placeholder="Enter Name Here">
                      <div class="input-group-btn"> 
                        <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                      </div>
                    </div>
                  </div>
            </div>
            </div>
          </div>-->


          <div class="container">
            <div class="panel panel-default">
              <div class="panel-heading">Add Remove input fields Dynamically using jQuery Bootstrap</div>
              <div class="panel-body">
                  <form action="" >
                  <div class="input-group control-group after-add-more col-xs-8">

                   <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori Sampah</label>
                   <select id = "addmore[]" name="addmore[]" class="form-control" >
                    <?php if( ! empty($kategori_sampah)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
                                      foreach($kategori_sampah as $data){ ?>

                            <option value="<?php echo $data->KODE_GENERAL_REF_DETAIL; ?>"><?php echo $data->DESCRIPTION; ?></option>

                            <?php } }else {
                                      echo "string";
                                    } 
                              ?>
                   </select>
                   <label class="control-label col-md-3 col-sm-3 col-xs-12">Item Sampah</label>
                   <select id = "addmore[]" name="addmore[]" class="form-control" >
                   <?php if( ! empty($item_sampah)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
                                      foreach($item_sampah as $data){ ?>

                            <option value="<?php echo $data->ISM_ID; ?>"><?php echo $data->ISM_NAMA; ?></option>

                            <?php } }else {
                                      echo "string";
                                    } 
                              ?>
                   </select>
                   <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Sampah</label>
                   <input type="number" name="addmore[]" class="form-control" ">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="input-group-btn "> 
                        <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                        </div>
                      </div>
                  </div>
                  <div class = "col-xs-8">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12">Lokasi</label>
                   <select id = "addmore[]" name="addmore[]" class="form-control" >
                   <?php if( ! empty($lokasi)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
                                      foreach($lokasi as $data){ ?>

                            <option value="<?php echo $data->KODE_GENERAL_REF_DETAIL; ?>"><?php echo $data->DESCRIPTION; ?></option>

                            <?php } }else {
                                      echo "string";
                                    } 
                              ?>
                   </select>
                  </div>
                          
                  </form>
                  <!-- Copy Fields-These are the fields which we get through jquery and then add after the above input,-->
                  <div class="copy-fields hide">
                    <div class="control-group input-group" style="margin-top:10px">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori Sampah</label>
                   <select id = "addmore[]" name="addmore[]" class="form-control" >
                    <?php if( ! empty($kategori_sampah)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
                                      foreach($kategori_sampah as $data){ ?>

                            <option value="<?php echo $data->KODE_GENERAL_REF_DETAIL; ?>"><?php echo $data->DESCRIPTION; ?></option>

                            <?php } }else {
                                      echo "string";
                                    } 
                              ?>
                   </select>
                   <label class="control-label col-md-3 col-sm-3 col-xs-12">Item Sampah</label>
                   <select id = "addmore[]" name="addmore[]" class="form-control" >
                   <?php if( ! empty($item_sampah)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
                                      foreach($item_sampah as $data){ ?>

                            <option value="<?php echo $data->ISM_ID; ?>"><?php echo $data->ISM_NAMA; ?></option>

                            <?php } }else {
                                      echo "string";
                                    } 
                              ?>
                   </select>
                   <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Sampah</label>
                   <input type="number" name="addmore[]" class="form-control" ">
                     <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="input-group-btn"> 
                        <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                      </div>
                     </div> 
                    </div>
                    
                  </div>
            </div>
            </div>
          </div>


            <!--<div class="col-md-12 col-sm-12 col-xs-12">
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
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('index.php/admin_sampah/tambah_item_sampah'); ?>">
                      
                        
                        <div class="input-group control-group after-add-more">
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori Sampah</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="addmore[]" class="form-control" placeholder="Enter Name Here">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Item Sampah</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="addmore[]" class="form-control" placeholder="Enter Name Here">
                            </div>
                            <div class="input-group-btn"> 
                          <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                          </div>
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
                        <!--</div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <!--<button class="btn btn-primary" type="button">Cancel</button>
                          <button class="btn btn-primary" type="reset">Reset</button>-->
                          <!--<button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>-->

                    </form>
                  </div>
                </div>
              </div>
             
            


          <!-- Tabel -->          
              <!--<div class="col-md-12 col-sm-12 col-xs-12">
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
                          <th>Nama Item Sampah</th>
                          <th>Kategori Sampah</th>
                          <!--<th>First name</th>
                          <th>Last name</th>
                          <th>Position</th>
                          <th>Office</th>
                          <th>Age</th>
                          <th>Start date</th>
                          <th>Salary</th>
                          <th>Extn.</th>
                          <th>E-mail</th>-->
                        <!--</tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
					
					
                  </div>
                </div>
              </div>-->
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
<script type="text/javascript">
 
    $(document).ready(function() {
 
  //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
      $(".add-more").click(function(){ 
          var html = $(".copy-fields").html();
          $(".after-add-more").after(html);
      });
//here it will remove the current value of the remove button which has been pressed
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
 
    });
 
</script>

<script type="text/javascript">
  $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append(' <div class="input_fields_wrap"> <input type="text" name="mytext[]" placeholder="Account Title"> <input type="text" name="mytext2[]" placeholder="Description"> <input type="text" name="mytext3[]" placeholder="Credit"> <input type="text" name="mytext4[]" placeholder="Debit"> <button type="submit" class="btn btn-success remove_field">Remove</button></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>
