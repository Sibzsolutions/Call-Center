<?php ?>
<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Quick Example</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
      <?=$this->Form->create('Produc_master', array('role'=>'form', 'enctype'=>'multipart/form-data'));?>
      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Product Name</label>
          <?=$this->Form->input('prodname',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Name'));?>
        </div>        
        <div class="form-group">
          <label for="exampleInputEmail1">Product Short Description</label>
          <?=$this->Form->input('prodscdes',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Title'));?>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Product Long Description</label>
          <?=$this->Form->input('proddesc',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Title'));?>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Product Images</label>
          <?=$this->Form->input('prodimg',array('type'=>'file','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Keywords', 'multiple', 'name'=>'data[Produc_master][catimg][]'));?>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Product Price</label>
          <?=$this->Form->input('prodprice',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Title'));?>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Clearance</label>
          <?=$this->Form->input('clearance',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Title'));?>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Url Alias</label>
          <?=$this->Form->input('urlalias',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Title'));?>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Meta Title</label>
          <?=$this->Form->input('prodmtitle',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Meta Title'));?>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Meta Keywords</label>
          <?=$this->Form->input('prodmkeywords',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Meta Kaywords'));?>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Meta Description</label>
          <?=$this->Form->input('prodmdesc',array('type'=>'textarea','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Meta Decription'));?>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Canonnical Url</label>
          <?=$this->Form->input('prodcanonical',array('type'=>'text','class'=>'form-control','label'=>'','div'=>false,  'placeholder'=>'Enter Canonnical Url'));?>
        </div>
        <!--<div class="form-group">
        <label for="exampleInputEmail1">Page Content</label>
        <?php //echo $this->Form->input('page_content',array('type'=>'textarea', 'id'=>'editor1', 'name'=>'editor1', 'rows'=>'10', 'cols'=>'80', 'class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Content'));?>
        </div>-->
        <div class="form-group">
          <label for="exampleInputEmail1">Status</label>
          <?=$this->Form->input('del_status',array('type'=>'select', 'options'=>array(1=>'Active', 0=>'Inactive'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
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