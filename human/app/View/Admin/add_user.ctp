<?php ?>
  <?=$this->Form->create('User', array("role"=>"form"));?>
  <div class="box-body">
    <div class="form-group">
      <label for="exampleInputEmail1">First Name</label>
      <?=$this->Form->input('usrfname',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter First Name'));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Last Name</label>
      <?=$this->Form->input('usrlname',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Last Name'));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <?=$this->Form->input('username',array('type'=>'email','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Email'));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Password</label>
      <?=$this->Form->input('password',array('type'=>'password','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Email'));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">User Type</label>
      <?=$this->Form->input('usrtype',array('type'=>'select', 'options'=>array(0=>'User', 1=>'Modrator', 2=>'Superadministrator'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
    </div>
  </div><!-- /.box-body -->

  <div class="box-footer">
    <?=$this->Form->button('Saved',array('class'=>'btn btn-primary'))?>
  </div>
  <?=$this->Form->end()?>
            