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
                
                <a class="login_button" href="<?php echo $this->webroot.'superadmin/users'; ?>">Back</a>
				
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered table-striped" id="example1">
                    <thead>
                      <tr>
                        <th bgcolor="#00bcd4" class="text14_white">Id</th>
                        <th bgcolor="#00bcd4" class="text14_white">Session Id</th>
                        <th bgcolor="#00bcd4" class="text14_white">User Name</th>
                        <th bgcolor="#00bcd4" class="text14_white">Order Start Date</th>
                        <th bgcolor="#00bcd4" class="text14_white">Order End Date</th>
						<th bgcolor="#00bcd4" class="text14_white"><div style="width:70px">Order Value</div></th>
                        <th bgcolor="#00bcd4" class="text14_white">Payment Id</th>
						<th bgcolor="#00bcd4" class="text14_white">Shipping Id</th>
						<th bgcolor="#00bcd4" class="text14_white">Order Status</th>
						<th bgcolor="#00bcd4" class="text14_white">Status</th>                        
                        <th bgcolor="#00bcd4" class="text14_white">Action</th>                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach($orders as $order)
                      {
						  $order_data = $order['Order_master'];
						  
						  $order_details = $order['Order_detail'];
						   
						   if(isset($order['User_detail']['User']))
						  $user_data = $order['User_detail']['User'];
                      ?>
                        <tr>
                        <td><?php echo $order_data['id']; ?></td>
                        <td><?php echo $order_data['session_id']; ?></td>
                        <td><?php echo $user_data['usrfname'].' '.$user_data['usrlname']; ?></td>
                        <td><?php echo $order_data['orderstartdate']; ?></td>
                        <td><?php echo $order_data['orderenddate']; ?></td>
                        <td><?php echo $order_data['ordervalue']; ?></td>
                        <td><?php echo $order_data['paymentid']; ?></td>
						<td><?php echo $order_data['shippingid']; ?></td>
						
						<td>						
						<select onchange=change_status(<?php echo $order_data['id'];?>,this.value)>
						<?php 
						
							$arr_data = array(0=>'Pending', 1=>'Received');
							
							foreach($arr_data as $key=>$arr)
							{
								if($arr == $order_data['orderstatus'])
								{
									?>
									<option value="<?php echo $key; ?>" selected="selected"><?php echo $arr; ?></option>
									<?php
								}
								else
								{
									?>
									<option value="<?php echo $key; ?>"><?php echo $arr; ?></option>
									<?php
								}								
							}
						?>
						</select>
						
						<div style="width:20px; height:20px; float:left">
						<div id="status_<?=$order_data['id']?>"></div>
						</div>
							
						<?php //echo $this->Form->input('order_status',array('type'=>'select','options'=>array(0=>'Pending', 1=>'Received'), 'value'=>$order_data['orderstatus'], 'label'=>false,'onchange'=>'change_status('.$order_data['id'].',this.value)')); ?>
						
						</td>
                        
						<script>

						   function change_status(order_id,value)
						   {
							  alert(order_id);
							   
							  alert("value"+value);
							   //alert("value"+value);
							  
							  $('#status_'+order_id).show();
							  
							  $('#status_'+order_id).html('<img src="http://propelle.co/images/loading_small.gif">');
							  $.post("<?=$this->webroot?>Superadmin/change_order_status/"+order_id+"/"+value,
							
								function(data,status){
									
  								 alert(data);
								
								 if(data=='yes')
								 {
									  $('#status_'+order_id).html('<img src="http://www.customotion.com/green_check_small.png">');
									  $('#status_'+order_id).hide(2500);
								 }
								});
						   }  
						   
						</script>

						
						<td><?php if($order_data['del_status'] == 0) echo "Active"; else echo "Inactive"; ?></td>
                        <td>&nbsp;&nbsp;&nbsp;<a title="Edit" href="<?php echo $this->webroot.'superadmin/order_details/'.$order_data['id']; ?>"><i class="fa fa-database"></i></a>&nbsp;&nbsp;&nbsp;<a title="Status Change" href="<?php echo $this->webroot.'superadmin/order_status_change/'.$order_data['id']; ?>"><i class="fa fa-exchange"></i></a>
                        
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
