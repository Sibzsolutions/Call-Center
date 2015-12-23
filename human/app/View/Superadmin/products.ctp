<?php ?>
<script src="<?php echo $this->webroot."plugins/jQuery/jQuery-2.1.4.min.js"; ?>"></script>
<!-- Bootstrap 3.3.5 -->
<link rel="stylesheet" href="<?php echo $this->webroot.'bootstrap/css/bootstrap.min.css';?>">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo $this->webroot.'plugins/datatables/dataTables.bootstrap.css';?>">
<!-- Theme style -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<div class="row">
            <div class="col-xs-12">
              
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Table With Full Features</h3>
                </div><!-- /.box-header -->
                <div class="box-header" style="width:100%; float:left">
                
                <a class="login_button" href="<?php echo $this->webroot.'superadmin/add_products'; ?>">Add Product</a>
                                
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered table-striped" id="example1">
                    <thead>
                      <tr>
                        <th bgcolor="#00bcd4" class="text12_white">Id</th>
                        <th bgcolor="#00bcd4" class="text12_white">Name</th>
                        <th bgcolor="#00bcd4" class="text12_white">Short Description</th>
                        <th bgcolor="#00bcd4" class="text12_white">Long Description</th>
                        <th bgcolor="#00bcd4" class="text12_white">Product Price</th>
                        <th bgcolor="#00bcd4" class="text12_white">Clearance</th>
                        <th bgcolor="#00bcd4" class="text12_white">Date Added</th>
                        <th bgcolor="#00bcd4" class="text12_white">Url Aliase</th>
                        <th bgcolor="#00bcd4" class="text12_white">Meta Title</th>
                        <th bgcolor="#00bcd4" class="text12_white">Meta Description</th>
                        <th bgcolor="#00bcd4" class="text12_white">Meta Keywords</th>
                        <th bgcolor="#00bcd4" class="text12_white">Canonicle Url</th>                        
                        <th bgcolor="#00bcd4" class="text12_white">Status</th>                        
                        <th bgcolor="#00bcd4" width="65" class="text12_white" align="center">Action</th>                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach($products_data as $product)
                      {
						  $product = $product['Produc_master'];
                        ?>
                        <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['prodname']; ?></td>
                        <td><?php echo $product['prodscdes']; ?></td>
                        <td><?php echo $product['proddesc']; ?></td>
                        <td><?php echo $product['prodprice']; ?></td>
                        <td><?php if($product['clearance']==1) echo "Yes"; else echo "No"; ?></td>
                        <td><?php echo $product['date_added']; ?></td>
                        <td><?php echo $product['url_alias']; ?></td>
                        <td><?php echo $product['prodmtitle']; ?></td>
                        <td><?php echo $product['prodmkeywords']; ?></td>
                        <td><?php echo $product['prodmdesc']; ?></td>                        
                        
                        <!--<td>
                        <img src="<?php //echo $this->webroot.'img/category/thumb/small_images/'.$product['catimg']; ?>"/>
                        </td>-->
                        
                        <td>
						<?php 
							
							if($product['prodcanonical']!='')
							echo $product['prodcanonical']; 
							else
							echo "N/A";
						?>
                        </td>
                        <td><?php if($product['del_status'] == 0) echo "Active"; else echo "Deactive"; ?></td>
                        <td>&nbsp;&nbsp;&nbsp;<a title="View Images" href="<?php echo $this->webroot.'superadmin/product_images/'.$product['id']; ?>"><i class="fa fa-file-picture-o"></i></a>&nbsp;&nbsp;&nbsp;<a title="Edit" href="<?php echo $this->webroot.'superadmin/product_edit/'.$product['id']; ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;<a title="Status Change" href="<?php echo $this->webroot.'superadmin/product_status_change/'.$product['id']; ?>"><i class="fa fa-exchange"></i></a>
                        
                        <!--&nbsp;&nbsp;&nbsp;<a title="Delete" href="<?php //echo $this->webroot.'superadmin/user_delete/'.$category_data['id']; ?>"><i class="fa  fa-trash"></i></a>-->
                        </td>
                        </tr>
                      
					  <?php
                      }
                      ?>
                      
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div>
          
<script src="<?php echo $this->webroot.'plugins/jQuery/jQuery-2.1.4.min.js';?>"></script>
<!-- Bootstrap 3.3.5 -->
<!--<script src="<?php //echo $this->webroot.'bootstrap/js/bootstrap.min.js';?>"></script>-->
<!-- DataTables -->
<script src="<?php echo $this->webroot.'plugins/datatables/jquery.dataTables.min.js';?>"></script>
<script src="<?php echo $this->webroot.'plugins/datatables/dataTables.bootstrap.min.js';?>"></script>
<!-- SlimScroll -->
<script src="<?php echo $this->webroot.'plugins/slimScroll/jquery.slimscroll.min.js';?>"></script>
<!-- FastClick -->
<script src="<?php echo $this->webroot.'plugins/fastclick/fastclick.min.js';?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo $this->webroot.'dist/js/app.min.js';?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $this->webroot.'dist/js/demo.js';?>"></script>
<!-- page script -->

<script>
  $(function () {
	$("#example2").DataTable();
	$('#example1').DataTable({
	  "aaSorting": [],
	  "paging": true,
	  "lengthChange": true,
	  "searching": true,
	  "ordering": true,
	  "info": true,
	  "autoWidth": true
	});
  });
</script>
