<?php ?>
<script>
	
	$(document).ready(function(){
	
	$('#see_more').click(function(){
		$('.itinerary').show();
		});
	$('#hide').click(function(){
		$('.itinerary').hide();
		});
	});

	function hide(id)
	{
		id = id.split("_");
		$('#see_'+id[1]).hide();
	}
	
	function show(id)
	{
		id = id.split("_");
		$('#see_'+id[1]).show();
	}
	
</script>

<style>
.container {
    width: 100%;
}
</style>

<div class="width1240">

  <div class="container">
    <div class="packages_right">
	<div id="one_form">
    <div class="package_list contact_box" style="padding: 20px;">
	<?php echo $this->Form->create('Tell_a_friend',array('type'=>'file'));?>
	
    <div class="form-group">
	<?=$this->Form->input('name', array('type'=>'text','class'=>'form-control'));?>
	</div>
    
    <div class="form-group">
	<?=$this->Form->input('email', array('type'=>'text','class'=>'form-control'));?>
	</div>
    
    <div class="form-group">
	<?=$this->Form->input('friend_name', array('type'=>'text','class'=>'form-control','name'=>'friend_name'));?>
	</div>
    
    <div class="form-group">
	<?=$this->Form->input('friend_email', array('type'=>'text','class'=>'form-control','name'=>'friend_email'));?>
	</div>
  
  <div class="input_fields_wrap add_more_box">
  <div style="float:left; width:80%; margin-bottom:10px;">
  <?php				
  
	echo $this->Form->input('Invite more friends', array('label'=>'','type' => 'button','div'=>'false','class'=>'org_button add_field_button yellow_button', 'style'=>'border:0px; float:left')); 
  
  ?>
  </div>
  </div>				
  <br>
  <br>
  <div class="form-group">
	<?=$this->Form->submit('Send', array('class' => 'org_button'));?>
  </div>
  </div>
</div> 	
</div>

	<?php						
        echo $this->Form->end();
    ?>
   
<script>		

    $(document).ready(function() {
    
    var max_fields      = 100; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    var counter =2;
    
    $(add_button).click(function(e){ //on add input button click
    
	e.preventDefault();
	
	if(counter>100){
		alert("Only 100 Images are allowed");
		return false;
	}	   
	
	if(x < max_fields){ //max input box allowed
		x++; //text box increment
        
$(wrapper).append('<div id="mayur_div"><div class="add_sept form-group"><input type="text" name="invite_friend_name.'+counter+'" class="form-control" placeholder="Enter the name of friend"/></div><div class="add_sept form-group"><input type="text" name="invite_friend_email.'+counter+'" class="form-control"  placeholder="Enter the email of friend"/></div></div>');
        
        }    
        counter++;
    });
   
    });
    
</script>

<script>
	
	$(document).ready(function(){
		
	$(".shash_two").keyup(function(){ 
	
	var e = $('.shash_two').val();
	
	$.post("<?php echo $this->webroot; ?>Grt/ajax_search_package/",
	{Search_data_text:e},
	function(adata,status){
	
		$('#one_form').html(adata);
	
	});
	});
	
	$(".shash_one").change(function(){ 
		
	var d = $('.shash_one').val();
	$.post("<?php echo $this->webroot; ?>Grt/ajax_search_type_package/",
	{Search_data_type:d},
	function(data,status){
	
	});		
	});
	
	
		$('.i-check_one').click(function(){			
		if($(this).is(":checked"))
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{first_checked:id_data_first,checked:1,id:88},
			function(data,status){
			$('#one_form').html(data);
			});
		}
		else
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{first_checked:id_data_first,checked:0,id:88},
			function(data,status){
			$('#one_form').html(data);
			});
		}

		});	
		
		$('.i-check_two').click(function(){			
		if($(this).is(":checked"))
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{second_checked:id_data_first,checked:1,id:89},
			function(data,status){
			$('#one_form').html(data);
			});
		}
		else
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{second_checked:id_data_first,checked:0,id:89},
			function(data,status){
			$('#one_form').html(data);
			});
		}

		});	
		
		$('.i-check_three').click(function(){			
		if($(this).is(":checked"))
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{third_checked:id_data_first,checked:1,id:90},
			function(data,status){
			$('#one_form').html(data);
			});
		}
		else
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{third_checked:id_data_first,checked:0,id:90},
			function(data,status){
			$('#one_form').html(data);
			});
		}

		});	
		
		
		
		// Best For 
		
		$('.i-check_one_best').click(function(){			
		if($(this).is(":checked"))
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{one_checked_best:id_data_first,checked:1,id:88},
			function(data,status){
			$('#one_form').html(data);
			});
		}
		else
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{one_checked_best:id_data_first,checked:0,id:88},
			function(data,status){
			$('#one_form').html(data);
			});
		}

		});	
		
		$('.i-check_two_best').click(function(){			
		if($(this).is(":checked"))
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{two_checked_best:id_data_first,checked:1,id:89},
			function(data,status){
			$('#one_form').html(data);
			});
		}
		else
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{two_checked_best:id_data_first,checked:0,id:89},
			function(data,status){
			$('#one_form').html(data);
			});
		}

		});	
		
		$('.i-check_three_best').click(function(){			
		if($(this).is(":checked"))
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{three_checked_best:id_data_first,checked:1,id:90},
			function(data,status){
			$('#one_form').html(data);
			});
		}
		else
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{three_checked_best:id_data_first,checked:0,id:90},
			function(data,status){
			$('#one_form').html(data);
			});
		}

		});	
		
		$('.i-check_four_best').click(function(){			
		if($(this).is(":checked"))
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{four_checked_best:id_data_first,checked:1,id:90},
			function(data,status){
			$('#one_form').html(data);
			});
		}
		else
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{four_checked_best:id_data_first,checked:0,id:90},
			function(data,status){
			$('#one_form').html(data);
			});
		}

		});	

		$('.i-check_five_best').click(function(){			
		if($(this).is(":checked"))
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{five_checked_best:id_data_first,checked:1,id:90},
			function(data,status){
			$('#one_form').html(data);
			});
		}
		else
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{five_checked_best:id_data_first,checked:0,id:90},
			function(data,status){
			$('#one_form').html(data);
			});
		}

		});	

	
		
		
		
		
		
		// Peoples 
		
		$('.i-check_one_people').click(function(){			
		if($(this).is(":checked"))
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{one_checked_people:id_data_first,checked:1,id:88},
			function(data,status){
			$('#one_form').html(data);
			});
		}
		else
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{one_checked_people:id_data_first,checked:0,id:88},
			function(data,status){
			$('#one_form').html(data);
			});
		}

		});	
		
		$('.i-check_two_people').click(function(){			
		if($(this).is(":checked"))
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{two_checked_people:id_data_first,checked:1,id:89},
			function(data,status){
			$('#one_form').html(data);
			});
		}
		else
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{two_checked_people:id_data_first,checked:0,id:89},
			function(data,status){
			$('#one_form').html(data);
			});
		}

		});	
		
		$('.i-check_three_people').click(function(){			
		if($(this).is(":checked"))
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{three_checked_people:id_data_first,checked:1,id:90},
			function(data,status){
			$('#one_form').html(data);
			});
		}
		else
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{three_checked_people:id_data_first,checked:0,id:90},
			function(data,status){
			$('#one_form').html(data);
			});
		}

		});	
		
		$('.i-check_four_people').click(function(){			
		if($(this).is(":checked"))
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{four_checked_people:id_data_first,checked:1,id:90},
			function(data,status){
			$('#one_form').html(data);
			});
		}
		else
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{four_checked_people:id_data_first,checked:0,id:90},
			function(data,status){
			$('#one_form').html(data);
			});
		}

		});	
	


		
		
		// Peoples 
		
		$('.i-check_one_duration').click(function(){			
		if($(this).is(":checked"))
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{one_checked_duration:id_data_first,checked:1,id:88},
			function(data,status){
			$('#one_form').html(data);
			});
		}
		else
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{one_checked_duration:id_data_first,checked:0,id:88},
			function(data,status){
			$('#one_form').html(data);
			});
		}

		});	
		
		$('.i-check_two_duration').click(function(){			
		if($(this).is(":checked"))
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{two_checked_duration:id_data_first,checked:1,id:89},
			function(data,status){
			$('#one_form').html(data);
			});
		}
		else
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{two_checked_duration:id_data_first,checked:0,id:89},
			function(data,status){
			$('#one_form').html(data);
			});
		}

		});	
		
		$('.i-check_three_duration').click(function(){			
		if($(this).is(":checked"))
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{three_checked_duration:id_data_first,checked:1,id:90},
			function(data,status){
			$('#one_form').html(data);
			});
		}
		else
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{three_checked_duration:id_data_first,checked:0,id:90},
			function(data,status){
			$('#one_form').html(data);
			});
		}

		});	
		
		$('.i-check_four_duration').click(function(){			
		if($(this).is(":checked"))
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{four_checked_duration:id_data_first,checked:1,id:90},
			function(data,status){
			$('#one_form').html(data);
			});
		}
		else
		{
			var id_data_first=$(this).attr('id');					
			$.post("<?php echo $this->webroot; ?>Grt/rating_search_one/",
			{four_checked_duration:id_data_first,checked:0,id:90},
			function(data,status){
			$('#one_form').html(data);
			});
		}

		});	

	});

</script>