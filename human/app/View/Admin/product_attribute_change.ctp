<div id="shashi_one">

<?php
if(isset($attribute_data))
{
	foreach($attribute_data as $data)
	{
		?>
	  <div class="form-group">
	  <label for="exampleInputEmail1"><?php echo $data['Attribute_master']['attname']; ?></label>
	  
	  <select multiple="multiple" class="form-control" name="data[Produc_master][attribute][]">
	  <?php
	  foreach($data['Attribute_value'] as $data_att)
	  {
		  ?>
		  <option value="<?php echo $data_att['Attribute_value']['id']; ?>"><?php echo $data_att['Attribute_value']['attvalue']; ?></option>
		  <?php
	  }
	  ?>
	  </select>
	
	</div>
		
	<?php
	}
}
else
echo "No Any Attribute found";

?>
    
</div>