<?php 
	
	echo "<br>".$userdata['usrfname'];
	
	echo "<br>".$userdata['usrlname'];	
	
	echo "<br>".$userdata['username'];	
	
?>
<br>

<button style="width:50px;height:50px" class="change_pass" value="Change Password"></button>

<br>

<div id="one_change">

<div>
	
	<?=$this->Form->create('User');?>

	<?=$this->Form->input('password',array('type'=>'text', 'class'=>'form-control', 'required'=>'required','label'=>'','div'=>false));?>

	<?=$this->Form->input('new_password',array('type'=>'text', 'class'=>'form-control', 'required'=>'required','label'=>'','div'=>false));?>
	
	<?=$this->Form->input('confirm_password',array('type'=>'text', 'class'=>'form-control', 'required'=>'required','label'=>'','div'=>false));?>
	
	<input type="submit" value="Save">
	
	<?=$this->Form->end()?>

</div>

<script>

	$(document).ready(function(){
		
		$('#one_change').hide();
		
		$('.change_pass').click(function(){
			
			alert("pass_click");
			
			$('#one_change').show();
			
			/*
			var id = $(this).attr('id');
			
			$.post("<?php echo $this->webroot?>buyshops/sort_products", {type_id:id}, function(result){
				
				$("#result_sort").html(result);
			});								
			
			*/
			
		});
		});
				
</script>