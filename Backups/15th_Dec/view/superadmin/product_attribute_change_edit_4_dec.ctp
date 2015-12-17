<div id="att_one">
	
	<?php
	if(isset($attribute_data))
	{
  
		foreach($attribute_data as $data)
		{		
		  ?>
		  <div class="form-group">
		  <label for="exampleInputEmail1"><?php echo $data['Attribute_master']['attname']; ?></label>
		  
		  <?php
			  
		  foreach($data['Attribute_value'] as $data_att)
		  {
			  $i=0;
			  foreach($product_att_data as $product_select)
			  {
				if($product_select['id'] == $data_att['Attribute_value']['id'])  
				{
				  ?>
					
				  <input  type="checkbox" checked="checked" value="<?php echo $data_att['Attribute_value']['id']; ?>" name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][id]" value="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['id']?>][<?php echo $data_att['Attribute_value']['id']; ?>]"/>
				  
				  <?php echo $data_att['Attribute_value']['attvalue']; ?>
				  
				  <input type="text"  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][add_cost]" value="<?php echo $product_select['add_cost'] ?>"/>
				  
				  <input type="text"  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][less_cost]" value="<?php echo $product_select['less_cost'] ?>"/>
				  
				  Status
				  <select  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][del_status]">
				  <?php 
		
					  if($product_select['del_status'] == 1)
					  {
					  ?>
					  <option value="1">Yes</option>
					  <?php 
					  }
					  else
					  {
					  ?>
					  <option value="0">No</option>
					  <?php
					  }
					  ?>
					  
			  </select>
	
							
				  <br />
				  
				  <?php
				  
				  $i++;
				  
				  break;
				  
				}
			  }
			  
			  if($i==0)
			  {
				  ?>
				  <input type="checkbox" value="<?php echo $data_att['Attribute_value']['id']; ?>" name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][id]" value="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['id']?>][<?php echo $data_att['Attribute_value']['id']; ?>]"/>
				  
				  <?php echo $data_att['Attribute_value']['attvalue']; ?>
				  
				  <input type="text"  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][add_cost]"/>
				  
				  <input type="text"  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][less_cost]"/>
				  
				  <br />
				  
				  <?php
			  }
		  }
		  ?>
	
		  </div>
		  <?php
		}
	}
	else
	{
		echo "No data is available";
	}
	?>
    </div>