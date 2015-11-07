<?php ?>
  <?=$this->Form->create('User', array("role"=>"form"));?>
  <div class="box-body form_box">
    <div class="form-group">
      <label for="exampleInputEmail1">First Name</label>
      <?=$this->Form->input('usrfname',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter First Name'));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Last Name</label>
      <?=$this->Form->input('usrlname',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Last Name'));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Username</label>
      <?=$this->Form->input('username',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Username'));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <?=$this->Form->input('email',array('type'=>'email','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Email'));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Password</label>
      <?=$this->Form->input('password',array('type'=>'password','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Email'));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">User Type</label>
      <?=$this->Form->input('usrtype',array('type'=>'select', 'options'=>array(0=>'User', 1=>'Modrator', 2=>'Superadministrator'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
    </div>
    
    <div class="form-group">
      <label for="exampleInputEmail1">Status</label>
      <?=$this->Form->input('del_status',array('type'=>'select', 'options'=>array(0=>'Active', 1=>'Deactive'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
    </div>
    
  </div><!-- /.box-body -->

  <div class="input_box">
    <?=$this->Form->button('Saved',array('class'=>'login_button'))?>
  </div>
  <?=$this->Form->end()?>
            