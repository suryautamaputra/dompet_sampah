

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
                             <form id = "formId" name="add_name" method="POST" action="<?= base_url('index.php/user_order/add_order'); ?>">
                       
                                <div class="table-responsive" style="overflow-x: unset" id="dynamic_field">  
                                    <table id="row1" class="table table-bordered">  
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
                                            <td><select id = "itemsampah1" name="itemsampah1" class="subkategori form-control" >
                                                 <option value="0">-PILIH-</option>
                                                 </select></td>    
                                        </tr>
                                        <tr>
                                            <td>Jumlah</td>   
                                            <td><input type="number" id = "berat1" name="berat1" class="form-control name_list"/></td>
                                              
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
                        html += '<option value='+data[i].ISM_ID+'>'+data[i].ISM_NAMA+' ('+data[i].SATUAN+')</option>';
                    }
                    $('.subkategori').html(html);
                     
                }
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<table id="row'+i+'" class="table table-bordered"><tr><td>Item Sampah</td><td><select id = "itemsampah'+i+'" name="itemsampah'+i+'" class="subkategori form-control" ><option value="0">-PILIH-</option></select></td></tr><tr><td>Jumlah</td><td><input type="number" id = "berat'+i+'" name="berat'+i+'" class="form-control name_list"/></td></tr><tr><td></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Delete</button></td></tr></table>');});
  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
  
      $('#submit').click(function(){
        $('#formId').attr('action','http://localhost/dompet_sampah/index.php/user_order/add_order/'+i);
      });

    });  
</script>