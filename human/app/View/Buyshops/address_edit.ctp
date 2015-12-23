<div class="middle_content">
<div class="width1220 address_edit_box">

    <?php echo $this->Form->create('User_address', array('id'=>'target'));?>
	<div class="register-top-grid">
		<?=$this->Form->input('id',array('type'=>'hidden', 'class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the First Address', 'value'=>$user_add_data['id']));?>
	 <div>
		<span>First Address<label>*</label></span>
		<?=$this->Form->input('addr1',array('type'=>'textarea', 'class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the First Address', 'value'=>$user_add_data['addr1']));?>
	 </div>
	 <div>
		<span>Second Address<label>*</label></span>
		<?=$this->Form->input('addr2',array('type'=>'textarea', 'class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the Second Address', 'value'=>$user_add_data['addr2']));?>
	 </div>
	 <div>
		<span>City<label>*</label></span>
		<?=$this->Form->input('usrcity',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the City', 'value'=>$user_add_data['usrcity']));?>
	 </div>
	 <div>
		<span>State<label>*</label></span>
		<?=$this->Form->input('usrstate',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the State', 'value'=>$user_add_data['usrstate']));?>
	 </div>
	 
	<div>
		<span>Country<label>*</label></span>
		<?=$this->Form->input('usrcountry',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the Country', 'value'=>$user_add_data['usrcountry']));?>
	 </div>								 
	 <div>
		<span>Zip Code<label>*</label></span>
		<?=$this->Form->input('usrzip',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the Zip Code', 'value'=>$user_add_data['usrzip']));?>
	 </div>			
	<div>
		 <span>Phone Number<label>*</label></span>
		 <?=$this->Form->input('usrphones',array('type'=>'text', 'class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the Phone Number', 'value'=>$user_add_data['usrphones']));?>
	 </div>
	 
	 <div>
		 <span>Is Main<label>*</label></span>
		 <?=$this->Form->input('ismain',array('type'=>'select', 'options'=>array(1=>'Yes', 0=>'No'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Select the Is Main', 'default'=>$user_add_data['ismain']));?>
	 </div>
	 
	 <div>
		 <span>Status<label>*</label></span>
		 <?=$this->Form->input('del_status',array('type'=>'select','options'=>array(0=>'Yes', 1=>'No'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Select the Is Main', 'default'=>$user_add_data['del_status']));?>
	 </div>
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