<?php ?>
<!-- Page Content -->
<div class="container">

<div class="row">

    <div class="col-md-3">
        <p class="lead">Shop Name</p>
        <div class="list-group">
            <a href="#" class="list-group-item">Category 1</a>
            <a href="#" class="list-group-item">Category 2</a>
            <a href="#" class="list-group-item">Category 3</a>
        </div>
    </div>

    <div class="col-md-9">

        <div class="row carousel-holder">

            <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                            </div>
            </div>

        </div>

        <div class="row">
			
            <?php 
				
			foreach($products as $product)
			{
				$product = $product['Produc_master'];								
				
				?>
				<div class="col-sm-4 col-lg-4 col-md-4">
					<div class="thumbnail">
                    <!-- style="width:320px;height:"150px;" -->
                    	<a href="<?php echo $this->webroot.'only_human/product_details/'.$product['id']; ?>"><img src="<?php 
						//http://placehold.it/320x150" 
						
						if(isset($product['images']['Default']))
						{
							//thumb/small_images/
							echo $this->webroot.'app/img/product/'.$product['images']['Default']['imagepath'];
							?>" alt="<?php echo $product['images']['Default']['imgalt'];
						}
						else
						{
							//thumb/small_images/
							echo $this->webroot.'app/img/product/'.$product['images']['all']['imagepath'];
							?>" alt="<?php echo $product['images']['all']['imgalt'];
                        }
						?>">
                        </a>
						<div class="caption">
							<h4 class="pull-right"><?php echo $product['prodprice']; ?></h4>
							<h4><a href="#"><?php echo $product['prodname']; ?></a>
							</h4>
							<p><?php echo $product['prodscdes']; ?>
                            <!--See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>-->.</p>
						</div>
						<div class="ratings">
							<p class="pull-right">15 reviews</p>
							<p>
								<span class="glyphicon glyphicon-star"></span>
								<span class="glyphicon glyphicon-star"></span>
								<span class="glyphicon glyphicon-star"></span>
								<span class="glyphicon glyphicon-star"></span>
								<span class="glyphicon glyphicon-star"></span>
							</p>
						</div>
					</div>
				</div>
			
            <?php }	?>
        
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
