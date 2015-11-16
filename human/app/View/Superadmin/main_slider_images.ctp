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
		
		<a class="login_button" href="<?php echo $this->webroot.'superadmin/add_main_slider_image'; ?>">Add slider Image</a>
						
		</div><!-- /.box-header -->
		<div class="box-body">
		  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered table-striped" id="example1">
			<thead>
			  <tr>
				<th bgcolor="#00bcd4" class="text14_white">Id</th>
				<th bgcolor="#00bcd4" class="text14_white"><div style="width:121px">Image Heading </div></th>
				<th bgcolor="#00bcd4" class="text14_white"><div style="width:141px">Short Description</div></th>
				<th bgcolor="#00bcd4" class="text14_white">Long Description</th>
				<th bgcolor="#00bcd4" class="text14_white">Category</th>
				<th bgcolor="#00bcd4" class="text14_white">Product</th>
				<th bgcolor="#00bcd4" class="text14_white">Image</th>
				<th bgcolor="#00bcd4" class="text14_white">Picture Order</th>
				<th bgcolor="#00bcd4" class="text14_white">Status</th>                        
				<th bgcolor="#00bcd4" class="text14_white"><div style="width:72px">Action</div></th>                        
			  </tr>
			</thead>
			<tbody>
			  <?php
			  
			  foreach($slider_images as $slider_image)
			  {
				  $slider_image = $slider_image['Slider_image'];
				?>
				<tr>
				<td><?php echo $slider_image['id']; ?></td>
				<td><?php echo $slider_image['heading']; ?></td>
				<td><?php echo $slider_image['short_desc']; ?></td>
				<td><?php echo $slider_image['long_desc']; ?></td>
				
				<td>
				<?php if(isset($slider_image['catname']))echo $slider_image['catname']; else echo "N/A";?>
				</td>
				
				<td>
				<?php if(isset($slider_image['prodname']))echo $slider_image['prodname']; else echo "N/A";?>
				</td>
				<td>
				<img src="<?php echo $this->webroot.'img/slider/thumb/small_images/'.$slider_image['image_path']; ?>"/>
				</td>
				
				<td>
				<?=$this->Form->input('picture_order',array('type'=>'select', 'onchange'=>'change_picture_order('.$slider_image['id'].',this.value)', 'options'=>$count_slider, 'class'=>'form-control','required'=>'required','label'=>'','div'=>false,'default'=>$slider_image['picture_order']));?>
				
				<div style="width:20px; height:20px; float:left">
                 <div id="status_<?=$slider_image['id']?>"></div>
                </div>
				</td>
					
				<script>
   
				   function change_picture_order(image_id,value)
				   {
					  alert(image_id);
					   
					  alert(value);
					  
					  $('#status_'+image_id).show();
					  $('#status_'+image_id).html('<img src="http://propelle.co/images/loading_small.gif">');
					  $.post("<?=$this->webroot?>Superadmin/change_slider_img_order/"+image_id+"/"+value,
						
						function(data,status){
						
						 alert(data);
							
						 if(data=='yes')
						 {
						  $('#status_'+image_id).html('<img src="http://www.customotion.com/green_check_small.png">');
						  $('#status_'+image_id).hide(2500);
						 }
						});
				   }   	
					
				</script>
				
				
				<td><?php if($slider_image['del_status'] == 0) echo "Active"; else echo "Deactive"; ?></td>
				<td><!--&nbsp;&nbsp;&nbsp;<a title="Edit" href="<?php //echo $this->webroot.'superadmin/main_slider_image_edit/'.$slider_image['id']; ?>"><i class="fa fa-file-picture-o"></i></a>-->&nbsp;&nbsp;&nbsp;<a title="Edit" href="<?php echo $this->webroot.'superadmin/main_slider_image_edit/'.$slider_image['id']; ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;<a title="Status Change" href="<?php echo $this->webroot.'superadmin/main_slider_image_status_change/'.$slider_image['id']; ?>"><i class="fa fa-exchange"></i></a>
				
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