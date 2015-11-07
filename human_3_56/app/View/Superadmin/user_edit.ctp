<?php ?>
  <?=$this->Form->create('User', array("role"=>"form"));?>
  <div class="box-body">
    <div class="form-group">
      <label for="exampleInputEmail1">User Id</label>
      <?=$this->Form->input('id',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Id', 'value'=>$edit_user_data['id']));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">First Name</label>
      <?=$this->Form->input('usrfname',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter First Name', 'value'=>$edit_user_data['usrfname']));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Last Name</label>
      <?=$this->Form->input('usrlname',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Last Name', 'value'=>$edit_user_data['usrlname']));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Username</label>
      <?=$this->Form->input('username',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Email', 'value'=>$edit_user_data['username']));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <?=$this->Form->input('email',array('type'=>'email','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Email', 'value'=>$edit_user_data['email']));?>
    </div>
    <!--<div class="form-group">
      <label for="exampleInputEmail1">Last Login</label>
      <?php //echo $this->Form->input('last_login',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Last Login', 'value'=>$edit_user_data['last_login']));?>
    </div>-->
    <div class="form-group">
      <label for="exampleInputEmail1">Default Canonical Tag</label>
      <?=$this->Form->input('del_status',array('type'=>'select', 'options'=>array(0=>'Active', 1=>'Inactive'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
    </div>
    
    <!--<div class="form-group">
      <label for="exampleInputEmail1">Google Analytics</label>
      <?php //echo $this->Form->input('',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Google Analytics Script'));?>
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox"> Check me out
      </label>
    </div>-->
  </div><!-- /.box-body -->

  <div class="box-footer">
    <?=$this->Form->button('Saved',array('class'=>'btn btn-primary'))?>
  </div>
  <?=$this->Form->end()?>
            