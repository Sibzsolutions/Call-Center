<?php ?>
<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Quick Example</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                  <?=$this->Form->create('Category', array('role'=>'form', 'enctype'=>'multipart/form-data'));?>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category Name</label>
                      <?=$this->Form->input('catname',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Name'));?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category Description</label>
                      <?=$this->Form->input('catdesc',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Title'));?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category Images</label>
                      <?=$this->Form->input('catimg',array('type'=>'file','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Keywords', 'multiple'));//, 'name'=>'data[Category][catimg][]?>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">url alias</label>
                      <?=$this->Form->input('url_alias',array('type'=>'text','class'=>'form-control','label'=>'','div'=>false,  'placeholder'=>'Enter Description'));?>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Meta Title</label>
                      <?=$this->Form->input('catmtitle',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Meta Title'));?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Meta Keywords</label>
                      <?=$this->Form->input('catmkeywords',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Meta Kaywords'));?>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Meta Description</label>
                      <?=$this->Form->input('catmdesc',array('type'=>'textarea','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Meta Decription'));?>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Canonnical Url</label>
                      <?=$this->Form->input('catcanonical',array('type'=>'text','class'=>'form-control','label'=>'','div'=>false,  'placeholder'=>'Enter Canonnical Url'));?>
                    </div>
                    
                    <!--<div class="form-group">
                    <label for="exampleInputEmail1">Page Content</label>
                    <?php //echo $this->Form->input('page_content',array('type'=>'textarea', 'id'=>'editor1', 'name'=>'editor1', 'rows'=>'10', 'cols'=>'80', 'class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Content'));?>
                    </div>-->
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Status</label>
                      <?=$this->Form->input('status',array('type'=>'select', 'options'=>array(1=>'Active', 0=>'Inactive'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
           		    <?=$this->Form->button('Saved',array('class'=>'btn btn-primary'))?>
                  </div>
                  <?=$this->Form->end()?>
              </div>
              
              
              
              
              
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
          
          
          
          
          
          
          <!-- /.row -->
          <!-- Main row -->
          <!-- /.row (main row) -->

        </section><!-- /.content -->
      </div>
              
              
              
              
              
              