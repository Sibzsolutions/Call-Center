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
                  <?=$this->Form->create('Category', array("role"=>"form", 'enctype'=>'multipart/form-data'));?>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category Id</label>
                      <?=$this->Form->input('id',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Id', 'value'=>$category_data['id']));?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <?=$this->Form->input('catname',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter First Name', 'value'=>$category_data['catname']));?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
                      <?=$this->Form->input('catdesc',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Last Name', 'value'=>$category_data['catdesc']));?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Images</label>
                      <?=$this->Form->input('catimg',array('type'=>'file','class'=>'form-control','label'=>'','div'=>false,  'placeholder'=>'Enter Email', 'value'=>$category_data['catimg']));
					  echo $category_data['catimg'];
					  ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Url Alias</label>
                      <?=$this->Form->input('url_alias',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Last Login', 'value'=>$category_data['url_alias']));?>
                    </div>
	                  <div class="form-group">
                      <label for="exampleInputEmail1">Meta Title</label>
                      <?=$this->Form->input('catmtitle',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Last Login', 'value'=>$category_data['catmtitle']));?>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Meta Keywords</label>
                      <?=$this->Form->input('catmkeywords',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Last Login', 'value'=>$category_data['catmkeywords']));?>
                    </div>
					
                    <div class="form-group">
                      <label for="exampleInputEmail1">Meta Description</label>
                      <?=$this->Form->input('catmdesc',array('type'=>'textarea','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Last Login', 'value'=>$category_data['catmdesc']));?>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Default Canonical Tag</label>
                      <?=$this->Form->input('catcanonical',array('type'=>'text', 'class'=>'form-control','label'=>'','div'=>false));?>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Status</label>
                      <?=$this->Form->input('del_status',array('type'=>'select', 'options'=>array(1=>'Active', 0=>'Inactive'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
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