<?php 
	
	echo $userdata['usrfname'];
	
	echo $userdata['usrlname'];	
	
	echo $userdata['username'];	
	
?>
<button class="change_pass" value="Change Password"></button>


<div id="one_change">

Enter Old Password:-<input type="text">

<input type="text">

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
				
</script>