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
<div class="box-header" style="width:auto; float:left">
		
	<a class="button" style="margin:width: auto; margin: 0px 0px 20px 0; float: left;" href="<?php echo $this->webroot.'buyshops/profile' ?>">Edit Profile</a>
	<a class="button" style="margin:width: auto; margin: 0px 0px 20px 0; float: left;" href="<?php echo $this->webroot.'buyshops/add_address' ?>">Add Address</a>
		
	</div>
	
	<div class="success_box"><?=$this->Session->flash();?></div>
	
<!--<button  class="change_pass button" value="Change Password" style="margin:0px 0 0 20px">Change Password</button>-->
<br>

<div id="one_change">

<div style="clear:both; margin-bottom:20px;" class="contact_box">
	
	<?php
	/*
	
	echo $this->Form->create('User');?>
    <div class="input_box">
	<?=$this->Form->input('password',array('type'=>'text', 'class'=>'', 'required'=>'required','label'=>'','div'=>false, 'Placeholder'=>'Please enter the old password'));?>
    </div>
    <div class="input_box">
	<?=$this->Form->input('new_password',array('type'=>'text', 'class'=>'', 'required'=>'required','label'=>'','div'=>false, 'Placeholder'=>'Please enter the new password'));?>
    </div>
    <div class="input_box">
	<?=$this->Form->input('confirm_password',array('type'=>'text', 'class'=>'', 'required'=>'required','label'=>'','div'=>false, 'Placeholder'=>'Please enter the new password again'));?>
    </div>
	<input type="submit" value="Save" class="button" style="margin:0px;">
	
	<?=$this->Form->end();
	
	die();
	*/
	?>
	
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



<div class="width100">
	  <div class="width100" style="float:left; margin:20px 0">
		<div class="box-header">
		  <!--<h3 class="box-title">Data Table With Full Features</h3>-->
		</div><!-- /.box-header -->
		<!-- /.box-header -->
		<div class="box-body width100">
        
        
		  <!--<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered table-striped" id="example1">
			<thead>
			  <tr>
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
			  
			  /*
			  foreach($user_address_data as $address)
			  {
				 $address = $address['User_address'];
			  
			  ?>
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
				
				</td>
				</tr>
			  
			  <?php
			  }
			  */
			  
			  
			  
			  ?>
			  
			</tbody>
		  </table>-->
          
          <div id="example1">
          <?php
			  
			  $count_add = count($user_address_data);
			  foreach($user_address_data as $address)
			  {
				 $address = $address['User_address'];
			  
			  ?>
              
              <div class="myaccount_list">
                <div class="phone_box">Phone Number : <?php echo $address['usrphones']; ?></div>
                <div class="country_list">
                  <div class="list1">Country:</div>
                  <div class="list2"><?php echo $address['usrcountry']; ?></div>
                  <div class="list1">State:</div>
                  <div class="list2"><?php echo $address['usrstate']; ?></div>
                  <div class="list1">City:</div>
                  <div class="list2"><?php echo $address['usrcity']; ?></div>
                  <div class="list1">Zip Code:</div>
                  <div class="list2"><?php echo $address['usrzip']; ?></div>
                  <div class="list1">Is Main:</div>
                  <div class="list2"><?php if($address['ismain'] == 1) echo "Yes"; else echo "No"; ?></div>
                </div>
                <div class="add_box">
                  <span style="color:#0866e4">First Address:</span><br />
                  <?php 
				  
				  if(strlen($address['addr1'])<=60)
				  {
					echo $address['addr1'];
				  }
				  else
				  {
					$page_content = substr($address['addr1'],0,60) . '...';
					echo $page_content;
				  }
				  
				  ?>
                  <br /><br />
                  <span style="color:#0866e4">Secound Address:</span><br />
                  <?php
				  //echo $address['addr2']; 
				  
				  if(strlen($address['addr2'])<=60)
				  {
					echo $address['addr2'];
				  }
				  else
				  {
					$page_content = substr($address['addr2'],0,60) . '...';
					echo $page_content;
				  }				  
				  ?>
                </div>
                <div class="action_box">
                  <a title="Edit" href="<?php echo $this->webroot.'buyshops/address_edit/'.$address['id']; ?>"><img src="<?php echo $this->webroot.'img/only_human_userside/edit.jpg';?>" /></a>
				  <?php
				  if($count_add>1)
				  {
					  ?>
					  <a title="Status Change" href="<?php echo $this->webroot.'buyshops/address_status_change/'.$address['id']; ?>"><img src="<?php echo $this->webroot.'img/only_human_userside/change_status.jpg';?>" /></a>
					  <?php
				  }
				  ?>
                  
                  
				  <?php if($address['del_status'] == 0) echo "<div class='active_butn'>Status : Active</div>"; else echo "<div class='inactive_butn'>Status : Inactive</div>"; ?>
                </div>
              </div>
              
              <?php
			  }
			  
			if(count($user_address_data)>4)
			{	
			echo "<div class='pagination'>";
				?>		
				
				<?php //$this->paginator->options(array('update' => '#result_sort','before' => $this->Js->get('#spinner')->effect('fadeIn', array('buffer' => false)),'complete' => $this->Js->get('#spinner')->effect('fadeOut', array('buffer' => false))));?>
				<!--Showing Page <?php echo $this->paginator->counter(); ?><br />-->
				<?php echo $this->paginator->prev(); ?> – &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<?php echo $this->paginator->numbers(array('separator'=>' | ')); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<?php echo $this->paginator->next('Next Page'); ?>
				<?php echo $this->Js->writeBuffer();
				echo "</div>";
			}
			  
			  ?>
              
              </div>
          
		</div>
	  </div>
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
			  
				<!--<th bgcolor="#00bcd4" class="text12_white">Id</th>
				<th bgcolor="#00bcd4" class="text12_white">Session Id</th>
				<th bgcolor="#00bcd4" class="text12_white">Username</th>-->
				<th bgcolor="#00bcd4" class="text12_white">Order Start Date</th>
				<th bgcolor="#00bcd4" class="text12_white">Order End Date</th>
				<th bgcolor="#00bcd4" class="text12_white"><div style="width:70px">Order Value</div></th>
				<th bgcolor="#00bcd4" class="text12_white"><div style="width:85px">Payment Id</div></th>
				<th bgcolor="#00bcd4" class="text12_white"><div style="width:85px">Shipping Id</div></th>
				<th bgcolor="#00bcd4" class="text12_white"><div style="width:85px">Order Status</div></th>
				<!--<th bgcolor="#00bcd4" class="text12_white">Status</th>-->
				<th bgcolor="#00bcd4" class="text12_white">Action</th>                        
			  </tr>
			</thead>
			<tbody>
			  <?php
			  
			  foreach($userdata['orders'] as $order)
			  {
				  if(!empty($order['Order_master']))
				  {
					$order = $order['Order_master'];  
				 
			  
			  ?>
				<!--<tr class="text14_black">
				<td><?php //echo $order['id']; ?></td>
				<td><?php //echo $order['session_id']; ?></td>
				<td><?php //echo $userdata['usrfname'].' '.$userdata['usrlname']; ?></td>-->
				<td><?php echo $order['orderstartdate']; ?></td>
				<td><?php echo $order['orderenddate']; ?></td>
				<td><?php echo $order['ordervalue']; ?></td>
				<td><?php echo $order['payment']; ?></td>
				<td><?php echo $order['shipping']; ?></td>
				<td><?php echo $order['orderstatus']; ?></td>
				
				<!--<td><?php //if($order['del_status'] == 0) echo "Active"; else echo "Inactive"; ?></td>-->
				
				<td>&nbsp;&nbsp;&nbsp;<a title="View Products" href="<?php echo $this->webroot.'buyshops/order_details/'.$order['id']; ?>"><i class="fa fa-database"></i></a>&nbsp;&nbsp;&nbsp;<!--<a title="Status Change" href="<?php //echo $this->webroot.'buyshops/order_status_change/'.$order['id']; ?>"><i class="fa fa-exchange"></i></a>-->
                        
                <!--&nbsp;&nbsp;&nbsp;<a title="Delete" href="<?php echo $this->webroot.'superadmin/user_delete/'.$order_data['id']; ?>"><i class="fa  fa-trash"></i></a>-->
				
				</td>
				</tr>
			  
			  <?php
			   }
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
