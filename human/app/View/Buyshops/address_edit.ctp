<?php ?>
<div class="box-body form_box">
    <?php echo $this->Form->create('User_address', array('id'=>'target'));?>
	
					<div>						
						<?=$this->Form->input('id',array('type'=>'hidden', 'style'=>'width:500px', 'class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the First Address'));?>
						<!--<input type="text"> -->
					 </div>	
					 <div>
						<span>First Address<label>*</label></span>
						<?=$this->Form->input('addr1',array('type'=>'textarea', 'style'=>'width:500px', 'class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the First Address'));?>
						
						<!--<input type="text"> -->
					 </div>
					 <div>
						<span>Second Address<label>*</label></span>
						<?=$this->Form->input('addr2',array('type'=>'textarea', 'style'=>'width:500px','class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the Second Address'));?>
						<!--<input type="text"> -->
					 </div>
					 <div>
						<span>City<label>*</label></span>
						<?=$this->Form->input('usrcity',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the City'));?>
						<!--<input type="text"> -->
					 </div>
					 <div>
						<span>State<label>*</label></span>
						<?=$this->Form->input('usrstate',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the State'));?>
						<!--<input type="text"> -->
					 </div>
					 
					<div>
						<span>Country<label>*</label></span>
						<?=$this->Form->input('usrcountry',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the Country'));?>
						
						<!--<input type="text"> -->
					 </div>								 
					 <div>
						<span>Zip Code<label>*</label></span>
						<?=$this->Form->input('usrzip',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the Zip Code'));?>
						
						<!--<input type="text"> -->
					 </div>			
					<div>
						 <span>Phone Number<label>*</label></span>
						 <?=$this->Form->input('usrphones',array('type'=>'number', 'style'=>'width:560px','class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the Phone Number'));?>
						 <!--<input type="text"> -->
					 </div>
					 
					 <div>
						 <span>Is Main<label>*</label></span>
						 <?=$this->Form->input('ismain',array('type'=>'select', 'style'=>'width:560px','options'=>array(1=>'Yes', 0=>'No'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Select the Is Main'));?>
						 <!--<input type="text"> -->
					 </div>
					 
					 <div>
						 <span>Status<label>*</label></span>
						 <?=$this->Form->input('del_status',array('type'=>'select', 'style'=>'width:560px','options'=>array(0=>'Yes', 1=>'No'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Select the Is Main'));?>
						 <!--<input type="text"> -->
					 </div>
					
					  <div class="input_box">
					  
							<?=$this->Form->button('Saved',array('class'=>'login_button', 'id'=>'other'))?>
						  </div>
						<?=$this->Form->end()?>

					 
  </div><!-- /.box-body -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$("#other").click(function() {

  $("#target").submit();
});</script>            