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
                  <!--<h3 class="box-title">Data Table With Full Features</h3>-->
                </div><!-- /.box-header -->
                <div class="box-header" style="width:100%; float:left">
                
                <!--<a class="login_button" href="<?php //echo $this->webroot.'superadmin/add_user' ?>">Add User</a>-->
				
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered table-striped" id="example1">
                    <thead>
                      <tr>
                        
						<th bgcolor="#00bcd4" class="text14_white">Id</th>
						
						<th bgcolor="#00bcd4" class="text14_white">User</th>
						<th bgcolor="#00bcd4" class="text14_white">Username</th>
						<th bgcolor="#00bcd4" class="text14_white"><div style="width:85px">Last Login</div></th>
						
						<th bgcolor="#00bcd4" class="text14_white">Product Name</th>
						<th bgcolor="#00bcd4" class="text14_white">Product Short Description</th>
						<th bgcolor="#00bcd4" class="text14_white">Product Price</th>
						
						
						<th bgcolor="#00bcd4" class="text14_white">Review Text</th>
						
                        <th bgcolor="#00bcd4" class="text14_white">Status</th>                        
                        <th bgcolor="#00bcd4" class="text14_white">Action</th>                        
						
                      </tr>
                    </thead>
                    <tbody>
                      <?php
					  
                      foreach($reviews as $review)
                      {
							$review_data = $review['Review_master'];
							$products_data = $review['Produc_master'];
							$user_data = $review['User'];						  
                      ?>
                        <tr>
						
                        <td><?php echo $review_data['id']; ?></td>
						<td><?php echo $user_data['usrfname'].' '.$user_data['usrlname']; ?></td>
                        <td><?php echo $user_data['username']; ?></td>
                        <td><?php echo $user_data['last_login']; ?></td>
						<td><?php echo $products_data['prodname']; ?></td>
						<td><?php echo $products_data['prodscdes']; ?></td>
						<td><?php echo $products_data['prodprice']; ?></td>
						<td><?php echo $review_data['review_txt']; ?></td>
                        <td><?php if($review_data['del_status'] == 0) echo "Active"; else echo "Inactive"; ?></td>
						<td>&nbsp;&nbsp;&nbsp;
						<a title="Edit" href="<?php echo $this->webroot.'superadmin/review_approved/'.$review_data['id']; ?>">
						
						<?php 
						if($review_data['approval'] == 1)
						{ 
							?>
							<i class="fa fa-thumbs-up"></i>
							<?php 
						}
						else
						{
							?>
							<i class="fa fa-thumbs-down"></i>
							<?php 
						}
						?>
						
						</a>&nbsp;&nbsp;&nbsp;<a title="Status Change" href="<?php echo $this->webroot.'superadmin/review_status_change/'.$review_data['id']; ?>"><i class="fa fa-exchange"></i></a>
                        <!--&nbsp;&nbsp;&nbsp;<a title="Delete" href="<?php //echo $this->webroot.'superadmin/user_delete/'.$review_data['id']; ?>"><i class="fa  fa-trash"></i></a>-->
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
