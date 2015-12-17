<script type="text/javascript" src="<?php echo $this->webroot.'js/buy_shop/jquery-1.11.1.min.js';?>"></script>

<!-- start menu -->
<script type="text/javascript" src="<?php echo $this->webroot.'js/buy_shop/megamenu.js';?>"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!-- end menu -->

<div style="float:left; width:100%" class="myaccount_box">
<div class="width1220">

<div class="women" style="float: left; width: 100%; margin-bottom:20px;">
<?php 
	
	echo "<div class='myaccount_name'>";
	echo "<strong>First Name</strong>:- ".$userdata['usrfname'];
	echo "</div>";
	
	echo "<div class='myaccount_name'>";
	echo "<strong>Last Name</strong>:- ".$userdata['usrlname'];	
	echo "</div>";
	
	echo "<div class='myaccount_name'>";
	echo "<strong>User Name</strong>:- ".$userdata['username'];
	echo "</div>";

?>
</div>

<br>

<button  class="change_pass button" value="Change Password" style="margin:20px 0">Change Password</button>

<br>

<div id="one_change" style="width:50%">

<div>
	
	<?=$this->Form->create('User');?>
	<br>
	<?=$this->Form->input('password',array('type'=>'text', 'class'=>'form-control', 'required'=>'required','label'=>'','div'=>false, 'Placeholder'=>'Please enter the old password'));?>
	<br>
	<?=$this->Form->input('new_password',array('type'=>'text', 'class'=>'form-control', 'required'=>'required','label'=>'','div'=>false, 'Placeholder'=>'Please enter the new password'));?>
	<br>
	<?=$this->Form->input('confirm_password',array('type'=>'text', 'class'=>'form-control', 'required'=>'required','label'=>'','div'=>false, 'Placeholder'=>'Please enter the new password again'));?>
	<br>
	<input type="submit" value="Save" class="button">
	
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
	  <div class="box" style="float:left;">
		<div class="box-header">
		  <!--<h3 class="box-title">Data Table With Full Features</h3>-->
		</div><!-- /.box-header -->
		<div class="box-header" style="width:auto; float:right">
		
		<a class="button" style="margin:0px;" href="<?php echo $this->webroot.'buyshops/address' ?>">Add Address</a>
		
		</div><!-- /.box-header -->
		<div class="box-body overflow">
		  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered table-striped" id="example1">
			<thead>
			  <tr>
				<th bgcolor="#00bcd4" class="text12_white">Id</th>
				<th bgcolor="#00bcd4" class="text12_white">User Id</th>
				<th bgcolor="#00bcd4" class="text12_white">First Address</th>
				<th bgcolor="#00bcd4" class="text12_white">Second Address</th>
				<th bgcolor="#00bcd4" class="text12_white">City</th>
				<th bgcolor="#00bcd4" class="text12_white"><div style="width:70px">State</div></th>
				<th bgcolor="#00bcd4" class="text12_white"><div style="width:85px">Country</div></th>
				<th bgcolor="#00bcd4" class="text12_white"><div style="width:85px">Zip Code</div></th>
				<th bgcolor="#00bcd4" class="text12_white"><div style="width:85px">Phone Number</div></th>
				<th bgcolor="#00bcd4" class="text12_white"><div style="width:85px">Is Main</div></th>
				<th bgcolor="#00bcd4" class="text12_white">Status</th>                        
				<th bgcolor="#00bcd4" class="text12_white">Action</th>                        
			  </tr>
			</thead>
			<tbody>
			  <?php
			  
			  foreach($userdata['Addresses'] as $address)
			  {
				 $address = $address['User_address'];
			  
			  ?>
				<tr class="text14_black">
				<td class="text14_black"><?php echo $address['id']; ?></td>
				<td class="text14_black"><?php echo $address['usrid']; ?></td>
				<td class="text14_black"><?php echo $address['addr1']; ?></td>
				<td class="text14_black"><?php echo $address['addr2']; ?></td>
				<td class="text14_black"><?php echo $address['usrcity']; ?></td>
				<td class="text14_black"><?php echo $address['usrstate']; ?></td>
				<td class="text14_black"><?php echo $address['usrcountry']; ?></td>
				<td class="text14_black"><?php echo $address['usrzip']; ?></td>
				<td class="text14_black"><?php echo $address['usrphones']; ?></td>
				<td class="text14_black"><?php if($address['ismain'] == 1) echo "Yes"; else echo "No"; ?></td>
				
				
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
		<div class="box-body overflow">
		  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered table-striped" id="example1_order">
			<thead>
			  <tr>
				<th bgcolor="#00bcd4" class="text12_white">Id</th>
				<th bgcolor="#00bcd4" class="text12_white">Session Id</th>
				<th bgcolor="#00bcd4" class="text12_white">Username</th>
				<th bgcolor="#00bcd4" class="text12_white">Order Start Date</th>
				<th bgcolor="#00bcd4" class="text12_white">Order End Date</th>
				<th bgcolor="#00bcd4" class="text12_white"><div style="width:70px">Order Value</div></th>
				<th bgcolor="#00bcd4" class="text12_white"><div style="width:85px">Payment Id</div></th>
				<th bgcolor="#00bcd4" class="text12_white"><div style="width:85px">Shipping Id</div></th>
				<th bgcolor="#00bcd4" class="text12_white"><div style="width:85px">Order Status</div></th>
				<th bgcolor="#00bcd4" class="text12_white">Status</th>                        
				<th bgcolor="#00bcd4" class="text12_white">Action</th>                        
			  </tr>
			</thead>
			<tbody>
			  <?php
			  
			  foreach($userdata['orders'] as $order)
			  {
				 $order = $order['Order_master'];
			  
			  ?>
				<tr class="text14_black">
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
	
</div>	  		  
</div>

<!--<script src="<?php //echo $this->webroot.'bootstrap/js/bootstrap.min.js';?>"></script>-->
<!-- DataTables -->
<script src="<?php echo $this->webroot.'plugins/datatables/jquery.dataTables.min.js';?>"></script>
<script src="<?php echo $this->webroot.'plugins/datatables/dataTables.bootstrap.min.js';?>"></script>

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