          
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <!--<li><a href="<?= base_url('index.php/Welcome/kategori_sampah'); ?>"><i class="fa fa-trash"></i> Kategori Sampah </a> </li>-->
                  <li class="active"><a href="<?= base_url('index.php/user_order'); ?>"><i class="fa fa-bars"></i> Setor </a> </li>
                  <li><a href="<?= base_url('index.php/user_reward'); ?>"><i class="fa fa-money"></i> Reward </span></a> </li>
                  <li><a href="<?= base_url('index.php/user_proses'); ?>"><i class="fa fa-clock-o"></i> On Process </span></a> </li>
                  <li><a href="<?= base_url('index.php/user_history_order'); ?>"><i class="fa fa-history"></i> Riwayat Setor </span></a> </li>
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
                    <h2>Tambah Sampah</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    
                    <div class="container">
                        <!--<h2 align="center">PHP - Dynamically Add or Remove input fields using JQuery</h2>-->  
                        <div class="form-group">
                             <form name="add_name" method="POST" action="<?= base_url('index.php/user_order/add_order'); ?>">
                       
                                <div class="table-responsive" id="dynamic_field">  
                                    <table class="table table-bordered">  
                                        <tr>
                                          <td>Kategori Sampah</td>  
                                            <td><select id = "kategori" name="kategori" class="form-control" >
                                                <option value="0">-PILIH-</option>
                                                <?php foreach($data->result() as $row):?>
                                                    <option value="<?php echo $row->KODE_GENERAL_REF_DETAIL;?>"><?php echo $row->DESCRIPTION;?></option>
                                                <?php endforeach;?>
                                               </select></td>  
                                            
                                        </tr>
                                        <tr>
                                            <td>Item Sampah</td>   
                                            <td><select id = "item_sampah" name="item_sampah" class="subkategori form-control" >
                                                 <option value="0">-PILIH-</option>
                                                 </select></td>    
                                        </tr>
                                        <tr>
                                            <td>Berat</td>   
                                            <td><input type="number" id = "berat" name="berat" class="form-control name_list"/></td>
                                              
                                        </tr> 

                                    </table>

                                     
                                </div>
                                <div class="ln_solid"></div>
                                    <td>Lokasi</td>  
                                    <td><select id = "lokasi" name="lokasi" class="form-control" >
                                                  <option value="0">-PILIH-</option>
                                                 <?php if( ! empty($lokasi)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
                                                                    foreach($lokasi as $data){ ?>

                                                          <option value="<?php echo $data->KODE_GENERAL_REF_DETAIL; ?>"><?php echo $data->DESCRIPTION; ?></option>

                                                          <?php } }else {
                                                                    echo "string";
                                                                  } 
                                                            ?>
                                                 </select></td>
                                    <div class="ln_solid"></div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                    <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
                                    
                             </form>  
                        </div> 
                    </div>



                  </div>
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

        <!-- footer content -->


<script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
   
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<div id="row'+i+'" class="table-responsive" id="dynamic_field"><table class="table table-bordered"><div class="ln_solid"><tr><td>Item Sampah</td><td><select id = "item_sampah" name="item_sampah" class="subkategori form-control" ><option value="0">-PILIH-</option></select></td></tr><tr><td>Berat</td><td><input type="number" id = "berat" name="berat" class="form-control name_list"/></td></tr></table><div class="ln_solid"></div><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Delete</button></td></div>');});
  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
  
    });  
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#kategori').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "<?php echo base_url();?>index.php/user_order/get_subkategori",
                method : "POST",
                data : {id: id},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].ISM_ID+'>'+data[i].ISM_NAMA+'</option>';
                    }
                    $('.subkategori').html(html);
                     
                }
            });
        });
    });
</script>
