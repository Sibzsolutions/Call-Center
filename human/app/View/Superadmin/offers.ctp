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
                <a class="login_button" href="<?php echo $this->webroot.'superadmin/add_offer'; ?>">Add Offer</a>
                </div><!-- /.box-header -->
                <div class="box-body" style="width:100%">
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered table-striped" id="example1">
                    <thead>
                      <tr>
                        <th bgcolor="#00bcd4" class="text14_white">Id</th>
                        <th bgcolor="#00bcd4" class="text14_white">Offer Name</th>
                        <th bgcolor="#00bcd4" class="text14_white">Offer Category Id</th>
                        <th bgcolor="#00bcd4" class="text14_white">Offer Product Id</th>
                        <th bgcolor="#00bcd4" class="text14_white">Offer Description</th>
                        <th bgcolor="#00bcd4" class="text14_white">Discount</th>
                        <th bgcolor="#00bcd4" class="text14_white">Free Shipping</th>
                        <th bgcolor="#00bcd4" class="text14_white">Offer Start Date</th>
                        <th bgcolor="#00bcd4" class="text14_white">Offer End Date</th>
                        <th bgcolor="#00bcd4" class="text14_white">Status</th>                        
                        <th bgcolor="#00bcd4" class="text14_white">Action</th>                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach($offers_data as $offer)
                      {
						$offer = $offer['Offer_master'];
                        ?>
                        <tr>
                        <td><?php echo $offer['id']; ?></td>
                        <td><?php echo $offer['offername']; ?></td>
                        <td>
						<?php 
							
						//echo $offer['offercat']; 
						foreach($offer['category_txt'] as $offer_arr)
						echo $offer_arr;

						?>
                        </td>
                        <td>
						<?php 
							
						//echo $offer['offerprod']; 
						foreach($offer['product_txt'] as $product_arr)
						echo $product_arr;							
						
						?>
                        </td>
                        <td><?php echo $offer['offerdesc']; ?></td>
                        <td><?php echo $offer['discount']; ?></td>
                        <td><?php if($offer['freeshipping'] == 1) echo "Yes"; else echo "No"; ?></td>
                        <td><?php echo $offer['offerstartdt']; ?></td>
                        <td><?php echo $offer['offerenddt']; ?></td>
                        <td><?php if($offer['del_status'] == 0) echo "Active"; else echo "Deactive"; ?></td>
                        <td>&nbsp;&nbsp;&nbsp;<a title="Edit" href="<?php echo $this->webroot.'superadmin/offer_edit/'.$offer['id']; ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;<a title="Status Change" href="<?php echo $this->webroot.'superadmin/offer_status_change/'.$offer['id']; ?>"><i class="fa fa-exchange"></i></a>
                        
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
