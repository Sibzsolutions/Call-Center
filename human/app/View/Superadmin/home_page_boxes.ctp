<?php
?>
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
		<div class="box-header">
		
		<a class="btn btn-primary" href="<?php echo $this->webroot.'superadmin/add_main_slider_image'; ?>">Add slider Image</a>
						
		</div><!-- /.box-header -->
		<div class="box-body">
		  <table id="example1" class="table table-bordered table-striped">
			<thead>
			  <tr>
				<th>Id</th>
				<th>Image Heading </th>
				<th>Short Description</th>
				<th>Long Description</th>
				<th>Category</th>
				<th>Product</th>
				<th>Image</th>
				<th>Status</th>                        
				<th>Action</th>                        
			  </tr>
			</thead>
			<tbody>
			  <?php
			  
			  home_boxes_data
			  
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
				<td><?php if($slider_image['del_status'] == 0) echo "Active"; else echo "Deactive"; ?></td>
				<td>&nbsp;&nbsp;&nbsp;<a title="Edit" href="<?php echo $this->webroot.'superadmin/main_slider_image_edit/'.$slider_image['id']; ?>"><i class="fa fa-file-picture-o"></i></a>&nbsp;&nbsp;&nbsp;<a title="Edit" href="<?php echo $this->webroot.'superadmin/main_slider_image_edit/'.$slider_image['id']; ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;<a title="Status Change" href="<?php echo $this->webroot.'superadmin/main_slider_image_status_change/'.$slider_image['id']; ?>"><i class="fa fa-exchange"></i></a>
				
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