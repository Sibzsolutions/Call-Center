<div id="att_one">
	
<?php
	if(isset($attribute_data))
	{
		foreach($attribute_data as $data)
		{
		  ?>
		  <div class="form-group">
		  <label for="exampleInputEmail1"><?php echo $data['Attribute_master']['attname']; ?></label>
		  <br />
		  <?php
			  
		  foreach($data['Attribute_value'] as $data_att)
		  {
			 	  ?>
				  <input type="checkbox" value="<?php echo $data_att['Attribute_value']['id']; ?>" name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][id]" value="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['id']?>][<?php echo $data_att['Attribute_value']['id']; ?>]"/>
				  
				  <?php echo $data_att['Attribute_value']['attvalue']; ?>
				  
				  <input class="form-control" type="text"  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][add_cost]" placeholder="Enter The Additional Cost"/>
				  
				  <input class="form-control" type="text"  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][less_cost]" placeholder="Enter The Less Cost"/>
				  
				  <br />
				  <?php
		  }
		  ?>
	
		  </div>
		  <?php
		}
	}
	else
	echo "No Data is available";
		
	?>
    </div>