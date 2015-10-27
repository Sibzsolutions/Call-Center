<?php ?>
<!-- Page Content -->
<div class="container">

<div class="row">

    <div class="col-md-3">
        <p class="lead">Shop Name</p>
        <div class="list-group">
		
			<?php 
				
				
				echo "<br>Id:- ".$product_details['Produc_master']['id'];
				
				echo "<br>prodname:- ".$product_details['Produc_master']['prodname'];
				
				echo "<br>prodscdes:- ".$product_details['Produc_master']['prodscdes'];
				
				echo "<br>proddesc:- ".$product_details['Produc_master']['proddesc'];
				
				echo "<br>prodprice:- ".$product_details['Produc_master']['prodprice'];
				
				echo "<br>clearance:- ".$product_details['Produc_master']['clearance'];
				
				echo "<br>date_added:- ".$product_details['Produc_master']['date_added'];
				
				echo "<br>url_alias:- ".$product_details['Produc_master']['url_alias'];
				
				echo "<br>prodmtitle:- ".$product_details['Produc_master']['prodmtitle'];
				
				echo "<br>prodmdesc:- ".$product_details['Produc_master']['prodmdesc'];
				
				echo "<br>prodmkeywords:- ".$product_details['Produc_master']['prodmkeywords'];
				
				echo "<br>prodcanonical:- ".$product_details['Produc_master']['prodcanonical'];
				
				echo "<br>del_status:- ".$product_details['Produc_master']['del_status'];				
				?>
				<br>
				<img src="
				<?php
				if(isset($product_details['Produc_master']['images']['Default']))
				{
					//thumb/small_images/
					echo $this->webroot.'app/img/product/'.$product_details['Produc_master']['images']['Default']['imagepath'];
					?>" alt="<?php echo $product_details['Produc_master']['images']['Default']['imgalt'];?>">
					<?php
				}
				else
				{
					//thumb/small_images/
					echo $this->webroot.'app/img/product/'.$product_details['Produc_master']['images']['all']['imagepath'];
					?>" alt="<?php echo $product_details['Produc_master']['images']['all']['imgalt'];?>">
					<?php
				}				
			?>
        </div>
    </div>

    <div class="col-md-9">

        <div class="row">
		<?php 

			
			
		?>	
        </div>
		
    </div>

</div>

</div>
<!-- /.container -->

<div class="container">

<hr>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="<?php echo $this->webroot.'js/only_human/jquery.js'; ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo $this->webroot.'js/only_human/bootstrap.min.js'; ?>"></script>
