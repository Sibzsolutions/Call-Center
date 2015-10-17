<div id="att_one">
<?php
	if(isset($attribute_data))
	{
		foreach($attribute_data as $data)
		{
			?>
			<div class="form-group">
			<label for="exampleInputEmail1"><?php echo $data['Attribute_master']['attname']; ?></label>
			
			<!--<select multiple="multiple" class="form-control" name="data[Produc_master][attribute][]">-->
			<?php
			foreach($data['Attribute_value'] as $data_att)
			{
			  ?>
			  <input type="checkbox" value="<?php echo $data_att['Attribute_value']['id']; ?>" name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][id]" value="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['id']?>][<?php echo $data_att['Attribute_value']['id']; ?>]"/>
			  <?php echo $data_att['Attribute_value']['attvalue']; ?>
			  
			  <input type="text"  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][add_cost]"/>
			  
			  <input type="text"  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][less_cost]"/>
			  
			  <br />
			  <!--<option value="<?php //echo $data_att['Attribute_value']['id']; ?>"><?php //echo $data_att['Attribute_value']['attvalue'][]; ?></option>-->
			  <?php
			}
			?>
			<!--</select>-->
			
			</div>
			<?php
		}
	}
	else
	echo "No Data is available";
	?>
</div>