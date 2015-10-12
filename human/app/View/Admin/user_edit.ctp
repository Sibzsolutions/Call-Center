<?php ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Quick Example</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
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
                      <label for="exampleInputEmail1">Email</label>
                      <?=$this->Form->input('username',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Email', 'value'=>$edit_user_data['username']));?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Last Login</label>
                      <?=$this->Form->input('last_login',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Last Login', 'value'=>$edit_user_data['last_login']));?>
                    </div>
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
              </div>
          <!-- /.row -->
          <!-- Main row -->
          <!-- /.row (main row) -->

        </section><!-- /.content -->
      </div>