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
              </div>
          <!-- /.row -->
          <!-- Main row -->
          <!-- /.row (main row) -->

        </section><!-- /.content -->
      </div>