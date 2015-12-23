<div class="middle_content">
<div class="width1220 address_edit_box">
	<!--<a class="button" style="margin:width: auto; margin: 0px 0px 20px 0; float: left;" href="<?php echo $this->webroot.'buyshops/myaccount' ?>">Back</a>-->	
	
    <?php echo $this->Form->create('User', array('id'=>'target'));?>
	<div class="register-top-grid">
					 <?=$this->Form->input('id',array('type'=>'hidden', 'class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the id', 'value'=>$user_data['id']));?>
						<!--<input type="text"> -->
					 <div>
						<span>First Name<label>*</label></span>
						<?=$this->Form->input('usrfname',array('type'=>'text', 'class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the First Name', 'value'=>$user_data['usrfname']));?>
						
					 </div>
					 <div>
						<span>Last Name<label>*</label></span>
						<?=$this->Form->input('usrlname',array('type'=>'text', 'class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the Last Name', 'value'=>$user_data['usrlname']));?>
					 </div>
					 <div>
						<span>Username<label>*</label></span>
						<?=$this->Form->input('username',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the username', 'value'=>$user_data['username']));?>
					 </div>
					 <div>
						<span>Email<label>*</label></span>
						<?=$this->Form->input('email',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the email', 'value'=>$user_data['email']));?>
					 </div>
					 
					<div>
						<span>Password</span>
						<?=$this->Form->input('password',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the new password'));?>
					 </div>							
					 
					 <!--<div>
						<span>Zip Code<label>*</label></span>
						<?php //echo $this->Form->input('usrzip',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the Zip Code', 'value'=>$user_add_data['usrzip']));?>
						
						
					 </div>			
					<div>
						 <span>Phone Number<label>*</label></span>
						 <?php //echo $this->Form->input('usrphones',array('type'=>'text', 'class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the Phone Number', 'value'=>$user_add_data['usrphones']));?>						 
					 </div>
					 
					 <div>
						 <span>Is Main<label>*</label></span>
						 <?php //echo $this->Form->input('ismain',array('type'=>'select', 'options'=>array(1=>'Yes', 0=>'No'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Select the Is Main', 'default'=>$user_add_data['ismain']));?>
					 </div>
					 
					 <!--<div>
						 <span>Status<label>*</label></span>
						 <?php //echo $this->Form->input('del_status',array('type'=>'select','options'=>array(0=>'Yes', 1=>'No'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Select the Is Main', 'default'=>$user_add_data['del_status']));?>
						 
					 </div>-->
</div>
							<div class="clearfix"> </div>
                            <div class="register-but">
							<?=$this->Form->button('Saved',array('class'=>'button','style'=>'margin:0px;', 'id'=>'other'))?>
						  </div>
						<?=$this->Form->end()?>

					 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$("#other").click(function() {

  $("#target").submit();
});</script>            
</div>
</div>

<?php
	
	
?>