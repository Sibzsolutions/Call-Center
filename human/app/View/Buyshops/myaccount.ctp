<?php 
	
	echo "<br>First Name:- ".$userdata['usrfname'];
	
	echo "<br>Last Name:- ".$userdata['usrlname'];	
	
	echo "<br>User Name:- ".$userdata['username'];	
	
?>

<br>
<br>

<button  class="change_pass" value="Change Password">Change Password</button>

<br>

<div id="one_change">

<div>
	
	<?=$this->Form->create('User');?>
	<br>
	<?=$this->Form->input('password',array('type'=>'text', 'class'=>'form-control', 'required'=>'required','label'=>'','div'=>false, 'Placeholder'=>'Please enter the old password'));?>
	<br>
	<?=$this->Form->input('new_password',array('type'=>'text', 'class'=>'form-control', 'required'=>'required','label'=>'','div'=>false, 'Placeholder'=>'Please enter the new password'));?>
	<br>
	<?=$this->Form->input('confirm_password',array('type'=>'text', 'class'=>'form-control', 'required'=>'required','label'=>'','div'=>false, 'Placeholder'=>'Please enter the new password again'));?>
	<br>
	<input type="submit" value="Save">
	
	<?=$this->Form->end()?>

</div>
</div>

<script>

	$(document).ready(function(){
		
		$('#one_change').hide();
		
		$('.change_pass').click(function(){
			
			$('#one_change').show();
			
			/*
			var id = $(this).attr('id');
			
			$.post("<?php echo $this->webroot?>buyshops/sort_products", {type_id:id}, function(result){
				
				$("#result_sort").html(result);
			});								
			
			*/
			
		});
		});
				
</script>

<br />
<br />

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
		
		<a class="login_button" href="<?php echo $this->webroot.'buyshops/address' ?>">Add Address</a>
		
		</div><!-- /.box-header -->
		<div class="box-body">
		  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered table-striped" id="example1">
			<thead>
			  <tr>
				<th bgcolor="#00bcd4" class="text14_white">Id</th>
				<th bgcolor="#00bcd4" class="text14_white">User Id</th>
				<th bgcolor="#00bcd4" class="text14_white">First Address</th>
				<th bgcolor="#00bcd4" class="text14_white">Second Address</th>
				<th bgcolor="#00bcd4" class="text14_white">City</th>
				<th bgcolor="#00bcd4" class="text14_white"><div style="width:70px">State</div></th>
				<th bgcolor="#00bcd4" class="text14_white"><div style="width:85px">Country</div></th>
				<th bgcolor="#00bcd4" class="text14_white"><div style="width:85px">Zip Code</div></th>
				<th bgcolor="#00bcd4" class="text14_white"><div style="width:85px">Phone Number</div></th>
				<th bgcolor="#00bcd4" class="text14_white"><div style="width:85px">Is Main</div></th>
				<th bgcolor="#00bcd4" class="text14_white">Status</th>                        
				<th bgcolor="#00bcd4" class="text14_white">Action</th>                        
			  </tr>
			</thead>
			<tbody>
			  <?php
			  
			  foreach($userdata['Addresses'] as $address)
			  {
				 $address = $address['User_address'];
			  
			  ?>
				<tr>
				<td><?php echo $address['id']; ?></td>
				<td><?php echo $address['usrid']; ?></td>
				<td><?php echo $address['addr1']; ?></td>
				<td><?php echo $address['addr2']; ?></td>
				<td><?php echo $address['usrcity']; ?></td>
				<td><?php echo $address['usrstate']; ?></td>
				<td><?php echo $address['usrcountry']; ?></td>
				<td><?php echo $address['usrzip']; ?></td>
				<td><?php echo $address['usrphones']; ?></td>
				<td><?php if($address['ismain'] == 1) echo "Yes"; else echo "No"; ?></td>
				
				
				<td><?php if($address['del_status'] == 0) echo "Active"; else echo "Inactive"; ?></td>
				<td>&nbsp;&nbsp;&nbsp;<a title="Edit" href="<?php echo $this->webroot.'buyshops/address_edit/'.$address['id']; ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;<a title="Status Change" href="<?php echo $this->webroot.'buyshops/address_status_change/'.$address['id']; ?>"><i class="fa fa-exchange"></i></a>
				
				<!--&nbsp;&nbsp;&nbsp;<a title="Delete" href="<?php echo $this->webroot.'buyshops/address_delete/'.$address['id']; ?>"><i class="fa  fa-trash"></i></a>-->
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



<div class="row">
	<div class="col-xs-12">
	  
	  <div class="box">
		<div class="box-header">
		  <!--<h3 class="box-title">Data Table With Full Features</h3>-->
		</div><!-- /.box-header -->
		<div class="box-header" style="width:100%; float:left">
		<h1>Orders:</h1>
		
		<!--<a class="login_button" href="<?php //echo $this->webroot.'buyshops/address' ?>">Add Address</a>-->
		
		</div><!-- /.box-header -->
		<div class="box-body">
		  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered table-striped" id="example1_order">
			<thead>
			  <tr>
				<th bgcolor="#00bcd4" class="text14_white">Id</th>
				<th bgcolor="#00bcd4" class="text14_white">Session Id</th>
				<th bgcolor="#00bcd4" class="text14_white">Username</th>
				<th bgcolor="#00bcd4" class="text14_white">Order Start Date</th>
				<th bgcolor="#00bcd4" class="text14_white">Order End Date</th>
				<th bgcolor="#00bcd4" class="text14_white"><div style="width:70px">Order Value</div></th>
				<th bgcolor="#00bcd4" class="text14_white"><div style="width:85px">Payment Id</div></th>
				<th bgcolor="#00bcd4" class="text14_white"><div style="width:85px">Shipping Id</div></th>
				<th bgcolor="#00bcd4" class="text14_white"><div style="width:85px">Order Status</div></th>
				<th bgcolor="#00bcd4" class="text14_white">Status</th>                        
				<th bgcolor="#00bcd4" class="text14_white">Action</th>                        
			  </tr>
			</thead>
			<tbody>
			  <?php
			  
			  foreach($userdata['orders'] as $order)
			  {
				 $order = $order['Order_master'];
			  
			  ?>
				<tr>
				<td><?php echo $order['id']; ?></td>
				<td><?php echo $order['session_id']; ?></td>
				<td><?php echo $userdata['usrfname'].' '.$userdata['usrlname']; ?></td>
				<td><?php echo $order['orderstartdate']; ?></td>
				<td><?php echo $order['orderenddate']; ?></td>
				<td><?php echo $order['ordervalue']; ?></td>
				<td><?php echo $order['paymentid']; ?></td>
				<td><?php echo $order['shippingid']; ?></td>
				<td><?php echo $order['orderstatus']; ?></td>
				
				<td><?php if($order['del_status'] == 0) echo "Active"; else echo "Inactive"; ?></td>
				
				<td>&nbsp;&nbsp;&nbsp;<a title="Edit" href="<?php echo $this->webroot.'buyshops/order_details/'.$order['id']; ?>"><i class="fa fa-database"></i></a>&nbsp;&nbsp;&nbsp;<a title="Status Change" href="<?php echo $this->webroot.'buyshops/order_status_change/'.$order['id']; ?>"><i class="fa fa-exchange"></i></a>
                        
                <!--&nbsp;&nbsp;&nbsp;<a title="Delete" href="<?php echo $this->webroot.'superadmin/user_delete/'.$order_data['id']; ?>"><i class="fa  fa-trash"></i></a>-->
				
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
	$("#example2_order").DataTable();
	$('#example1_order').DataTable({
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

<script>

  $(function () {
	$("#example2").DataTable();
	$('#example1').DataTable({
	  "aaSorting": [],
	  "paging": true,
	  "lengthChange": true,
	  "searching": false,
	  "ordering": true,
	  "info": true,
	  "autoWidth": true
	});
  });

  </script>