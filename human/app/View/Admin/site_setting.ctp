<?php ?>
<script src="<?php echo $this->webroot."plugins/jQuery/jQuery-2.1.4.min.js"; ?>"></script>
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
                  <?=$this->Form->create('Site_setting', array("role"=>"form"));?>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Site Url</label>
                      <?=$this->Form->input('site_url',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Site Url'));?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Site Name</label>
                      <?=$this->Form->input('site_name',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Site Name'));?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Default Meta Title</label>
                      <?=$this->Form->input('defaulttitle',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Default Meta Title'));?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Default Meta Key</label>
                      <?=$this->Form->input('defaultdesc',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Default Meta Key'));?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Default Meta Description</label>
                      <?=$this->Form->input('defaultkeywords',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Default Meta Description'));?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Default Canonical Tag</label>
                      <?=$this->Form->input('defaultcanonical',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Default Canonical Tag'));?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Contact Us Email</label>
                      <?=$this->Form->input('contactemail',array('type'=>'email','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Contact Us Email'));?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Registration Email</label>
                      <?=$this->Form->input('registeremail',array('type'=>'email','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Registration Email'));?>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Order Email</label>
                      <?=$this->Form->input('orderemail',array('type'=>'email','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Order Email'));?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Free Shipping Price</label>
                      <?=$this->Form->input('freeshipping',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Free Shipping Price'));?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Maintainance</label>
                      <?=$this->Form->input('maintainance',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Maintainance Value'));?>
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
      