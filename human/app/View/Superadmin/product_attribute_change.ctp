<script type="text/javascript" src="<?php echo $this->webroot.'js/buy_shop/jquery-1.11.1.min.js';?>"></script>

<div id="att_one">
<?php
	if(isset($attribute_data))
	{
		foreach($attribute_data as $data)
		{
			if($data['Attribute_master']['attname'] == 'Color')
			{			
				?>
				<div class="form-group" style="width:31%">
				<label for="exampleInputEmail1"><?php echo $data['Attribute_master']['attname']; ?></label>
				
				<!--<select multiple="multiple" class="form-control" name="data[Produc_master][attribute][]">-->
				<?php
				foreach($data['Attribute_value'] as $data_att)
				{
				  ?>
				  <div class="width100">
				  <input type="checkbox" value="<?php echo $data_att['Attribute_value']['id']; ?>" name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][id]" value="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['id']?>][<?php echo $data_att['Attribute_value']['id']; ?>]"/>
				  <?php echo $data_att['Attribute_value']['attvalue']; ?>
				  <select  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][del_status]" class="form-control" style="float:right">
				  <option value="1">Status Yes</option>
				  <option value="0">Status No</option>
				  </select>
				  
				  <div class="width100">
						
					  <input class="form-control" type="file" multiple  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']; ?>][color_imgs][]"  placeholder="Enter Product Images" style="width:100%; margin:0 0 10px 0"/>				  					  
					  
					  <input class="form-control" type="number" multiple  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']; ?>][product_quantity]"  placeholder="Enter Product Quantity" style="width:100%; margin:0 0 10px 0"/>				  					  
					  
					  
					  <select class="form-control"   name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][cost_type]">
					  <option value="1">Additional Cost</option>
					  <option value="0">Less Cost</option>
					  </select>
					  
					  <!--<label for="exampleInputEmail1">Enter Cost</label>	  -->
					  <input class="form-control" type="text" name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][cost]"  placeholder="Enter Cost"/>				  
					  
				  </div>
				  </div>
				  <br />
				  <!--<option value="<?php //echo $data_att['Attribute_value']['id']; ?>"><?php //echo $data_att['Attribute_value']['attvalue'][]; ?></option>-->
				  <?php
				}
				?>
				<!--</select>-->
				</div>
				<?php
			}
			else
			{
				?>
				<div class="form-group" style="width:31%">
				<label for="exampleInputEmail1"><?php echo $data['Attribute_master']['attname']; ?></label>
				<!--<select multiple="multiple" class="form-control" name="data[Produc_master][attribute][]">-->
				<?php
				foreach($data['Attribute_value'] as $data_att)
				{
				  ?>
				  <div class="width100">
				  <input type="checkbox" value="<?php echo $data_att['Attribute_value']['id']; ?>" name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][id]" value="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['id']?>][<?php echo $data_att['Attribute_value']['id']; ?>]"/>
				  <?php echo $data_att['Attribute_value']['attvalue']; ?>
				  <div style="float:right">
				  
				  <select  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][del_status]" class="form-control" style="width:27%;">
				  <option value="1">Status Yes</option>
				  <option value="0">Status No</option>
				  </select>
				  
				  
				  
				  <!--<div class="width100">
					  <input class="form-control" type="text"  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][add_cost]"  placeholder="Additional Cost" style="margin-right:5px;"/>
					  
					  <input class="form-control" type="text"  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][less_cost]"  placeholder="Less Cost"/>				  
				  </div>-->
				  
				  <select class="form-control"   name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][cost_type]">
					  <option value="0">Additional Cost</option>
					  <option value="1">Less Cost</option>
					  </select>
					  
					  <!--<label for="exampleInputEmail1">Enter Cost</label>	  -->
					  <input class="form-control" type="text" name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][cost]"  placeholder="Enter Cost"/>				  
				  
				  </div>
				  </div>
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
	}
	else
	echo "No Data is available";
	?>
</div>