    <div id="att_one" class="attribute_box" style="float: left; width: 100%;">
	
	<?php
	  
	foreach($attribute_data as $data)
	{		
	  ?>
	  <div class="form-group" style="width:31%">
	  <label for="exampleInputEmail1"><?php echo $data['Attribute_master']['attname']; ?></label>
	  
      <?php
	  	 
		$attname = $data['Attribute_master']['attname'];
		 		 
	  foreach($data['Attribute_value'] as $data_att)
	  {
		  $i=0;
		  foreach($product_att_data as $product_key=>$product_select)
		  {
			if($product_select['id'] == $data_att['Attribute_value']['id'])  
			{
				if(isset($product_select['att_master']))
				{
					if($product_select['att_master'] == 'Color')
					{
						?>
						<div class="width100">
						  <input  type="checkbox" checked="checked" value="<?php echo $data_att['Attribute_value']['id']; ?>" name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][id]" value="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['id']?>][<?php echo $data_att['Attribute_value']['id']; ?>]"/>
						  
						  <?php echo $data_att['Attribute_value']['attvalue']; ?>
						  <div style="float:right">
							
							<select  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][del_status]">
						  <?php 
				
							  if($product_select['del_status'] == 1)
							  {
								  ?>
								  <option selected="selected" value="1">Status Yes</option>
								  <option value="0">Status No</option>
								  <?php
							  }
							  if($product_select['del_status'] == 0)
							  {
								  ?>
								  <option value="1">Status Yes</option>
								  <option selected="selected" value="0">Status No</option>
								  <?php
							  }
							  ?>
							  
							</select>
						  </div>
						  <div class="width100">
						  
						  <input class="form-control" type="file" multiple  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']; ?>][color_imgs][]"  placeholder="Enter Product Images"/>				  					  
								  
							<input class="form-control" type="number" multiple  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']; ?>][product_quantity]"  placeholder="Enter Product Quantity" value="<?php echo $product_select['qty']; ?>"/>				  				
						  
						  <!--<input class="form-control" type="text"  name="data[Produc_master][attribute][<?php //echo $data_att['Attribute_value']['attvalue']?>][add_cost]" value="<?php //echo $product_select['add_cost'] ?>" style="margin-right:5px;"/>
						  
						  <input class="form-control" type="text"  name="data[Produc_master][attribute][<?php //echo $data_att['Attribute_value']['attvalue']?>][less_cost]" value="<?php //echo $product_select['less_cost'] ?>"/>-->
						  
						  
						  <div style="float:right">
							Cost
						  <select  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][cost_type]">
							<?php 
				
							  if($product_select['add_cost'] != '')
							  {
								  ?>
								  <option selected="selected" value="1">Additional Cost</option>
								  <?php
							  }
							  else
							  {
								  ?>
								  <option value="1">Additional Cost</option>
								  <?php
							  }
							  if($product_select['less_cost'] != '')
							  {
								  ?>
								  <option selected="selected" value="0">Less Cost</option>
								  <?php
							  }
							  else
							  {
								  ?>
								  <option value="0">Less Cost</option>
								  <?php
							  }
							?>
							</select>
							
							<?php
							if($product_select['add_cost'] != '')
							{
								?>
								<input class="form-control" type="text"  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][cost]" value="<?php echo $product_select['add_cost'] ?>" style="margin-right:5px;"/>
								<?php
							}
							else
							{
								?>
								<input class="form-control" type="text"  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][cost]" value="<?php echo $product_select['less_cost'] ?>" style="margin-right:5px;"/>
								<?php
							}
							?>
							
						  </div>
									  
						  </div>
						  </div>
					<?php
					}
				}
				else
				{
				
				?>
                
                <input  type="checkbox" checked="checked" value="<?php echo $data_att['Attribute_value']['id']; ?>" name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][id]" value="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['id']?>][<?php echo $data_att['Attribute_value']['id']; ?>]"/>
				  
				  <?php echo $data_att['Attribute_value']['attvalue']; ?>
					<div class="width100">
                    
				  
					
					<select style="width:27%;" name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][del_status]" class="form-control">
				  <?php 
		
					  if($product_select['del_status'] == 1)
					  {
						  ?>
						  <option selected="selected" value="1">Status Yes</option>
						  <option value="0">Status No</option>
						  <?php
					  }
					  if($product_select['del_status'] == 0)
					  {
						  ?>
						  <option value="1">Status Yes</option>
						  <option selected="selected" value="0">Status No</option>
						  <?php
					  }
					  ?>
					  
					</select>

				  
				  <!--<input class="form-control" type="text"  name="data[Produc_master][attribute][<?php //echo $data_att['Attribute_value']['attvalue']?>][add_cost]" value="<?php //echo $product_select['add_cost'] ?>" style="margin-right:5px;"/>
				  
				  <input class="form-control" type="text"  name="data[Produc_master][attribute][<?php //echo $data_att['Attribute_value']['attvalue']?>][less_cost]" value="<?php //echo $product_select['less_cost'] ?>"/>-->
				  
					
				  <select  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][cost_type]" class="form-control">
					<?php 
		
					  if($product_select['add_cost'] != '')
					  {
						  ?>
						  <option selected="selected" value="1">Additional Cost</option>
						  
						  <?php
					  }
					  else
					  {
						  ?>
						  <option value="1">Additional Cost</option>
						  <?php
					  }
					  if($product_select['less_cost'] != '')
					  {
						  ?>
						  <option selected="selected" value="0">Less Cost</option>
						  <?php
					  }
					  else
					  {
						  ?>
						  <option value="0">Less Cost</option>
						  <?php
					  }
					?>
					</select>
					
					<?php
					if($product_select['add_cost'] != '')
					{
						?>
						<input class="form-control" type="text"  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][cost]" value="<?php echo $product_select['add_cost'] ?>" style="margin-right:5px;"/>
						<?php
					}
					else
					{
						?>
						<input class="form-control" type="text"  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][cost]" value="<?php echo $product_select['less_cost'] ?>" style="margin-right:5px;"/>
						<?php
					}
					?>
					
							  
				  </div>
					<?php
				}
			  ?>

                        
              <br />
  			  
              <?php
			  
			  $i++;
			  
			  break;			  
			}
		  }
		  
		  if($i==0)
		  {
			if($attname == 'Color')
			{
				?>				
				
			  <div class="width100" style="padding:10px 0px 30px 0px;">
				 
			  <!--<input class="form-control" type="file" multiple  name="data[Produc_master][attribute][<?php //echo $data_att['Attribute_value']['attvalue']; ?>][color_imgs][]"  placeholder="Enter Product Images"/>				  					  
			  
			  <input class="form-control" type="number" multiple  name="data[Produc_master][attribute][<?php //echo $data_att['Attribute_value']['attvalue']; ?>][product_quantity]"  placeholder="Enter Product Quantity" <?php echo $product_select['qty']; ?>/>-->				  				
 
			  <input type="checkbox" value="<?php echo $data_att['Attribute_value']['id']; ?>" name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][id]" value="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['id']?>][<?php echo $data_att['Attribute_value']['id']; ?>]"/>
			  
			  <?php echo $data_att['Attribute_value']['attvalue']; ?>
			  
              <select style="float:right; margin-bottom:10px;" name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][del_status]" class="form-control">
              <?php 
	
				  if($product_select['del_status'] == 1)
				  {
					  ?>
					  <option selected="selected" value="1">Status Yes</option>
					  <option value="0">Status No</option>
					  <?php
				  }
				  if($product_select['del_status'] == 0)
				  {
					  ?>
					  <option value="1">Status Yes</option>
					  <option selected="selected" value="0">Status No</option>
					  <?php
				  }
				  ?>
                  </select>
			  
              <div style="float:right">
              
			  
			  <input class="form-control" type="file" style="width:100%; margin:0 0 10px 0" multiple  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']; ?>][color_imgs][]"  placeholder="Enter Product Images"/>				  					  
					  
			  <input class="form-control" type="number" style="width:100%; margin:0 0 10px 0" multiple  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']; ?>][product_quantity]"  placeholder="Enter Product Quantity"/>				  				
			  
              <div style="float:right; width:100%">
				
              <select  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][cost_type]" class="form-control">
				<?php 
	
				  if($product_select['add_cost'] != '')
				  {
					  ?>
					  <option selected="selected" value="1">Additional Cost</option>
					  
					  <?php
				  }
				  else
				  {
					  ?>
					  <option value="1">Additional Cost</option>
					  <?php
				  }
				  if($product_select['less_cost'] != '')
				  {
					  ?>
					  <option selected="selected" value="0">Less Cost</option>
					  <?php
				  }
				  else
				  {
					  ?>
					  <option value="0">Less Cost</option>
					  <?php
				  }
				?>
                </select>
				
				<?php
				if($product_select['add_cost'] != '')
				{
					?>
					<input class="form-control" type="text"  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][cost]" value="<?php echo $product_select['add_cost'] ?>" style="margin-right:0px; float:right"/>
					<?php
				}
				else
				{
					?>
					<input class="form-control" type="text"  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][cost]" value="<?php echo $product_select['less_cost'] ?>" style="margin-right:0px; float:right"/>
					<?php
				}
				?>
              </div>				
          	  </div>
			  
              </div>
				<?php				
			}
			else
			{
				?>
				 <div class="width100">
			  <input type="checkbox" value="<?php echo $data_att['Attribute_value']['id']; ?>" name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][id]" value="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['id']?>][<?php echo $data_att['Attribute_value']['id']; ?>]"/>
			  
			  <?php echo $data_att['Attribute_value']['attvalue']; ?>
			  <div style="float:right">
              
              <select style="width:27%" name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][del_status]" class="form-control">
              <?php 
	
				  if($product_select['del_status'] == 1)
				  {
					  ?>
					  <option selected="selected" value="1">Status Yes</option>
					  <option value="0">Status No</option>
					  <?php
				  }
				  if($product_select['del_status'] == 0)
				  {
					  ?>
					  <option value="1">Status Yes</option>
					  <option selected="selected" value="0">Status No</option>
					  <?php
				  }
				  ?>
                  </select>
                 
				
              <select  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][cost_type]" class="form-control">
				<?php 
	
				  if($product_select['add_cost'] != '')
				  {
					  ?>
					  <option selected="selected" value="1">Additional Cost</option>
					  
					  <?php
				  }
				  else
				  {
					  ?>
					  <option value="1">Additional Cost</option>
					  <?php
				  }
				  if($product_select['less_cost'] != '')
				  {
					  ?>
					  <option selected="selected" value="0">Less Cost</option>
					  <?php
				  }
				  else
				  {
					  ?>
					  <option value="0">Less Cost</option>
					  <?php
				  }
				?>
                </select>
				
				<?php
				if($product_select['add_cost'] != '')
				{
					?>
					<input class="form-control" type="text"  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][cost]" value="<?php echo $product_select['add_cost'] ?>" style="margin-right:5px;"/>
					<?php
				}
				else
				{
					?>
					<input class="form-control" type="text"  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][cost]" value="<?php echo $product_select['less_cost'] ?>" style="margin-right:5px;"/>
					<?php
				}
				?>
				
			  </div>
              </div>
				<?php
			}
			  
			  ?>
             
			  <br />
			  
			  <?php
		  }
		  $i++;
	  }
	  ?>

      </div>
	  <?php
    }
	?>
    </div>
            