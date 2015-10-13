<?php ?>
  <?=$this->Form->create('Dynamic_page', array("role"=>"form"));?>
  <div class="box-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Page Name</label>
      <?=$this->Form->input('name',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Name'));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Page Title</label>
      <?=$this->Form->input('meta_title',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Title'));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Keywords</label>
      <?=$this->Form->input('meta_keywords',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Keywords'));?>
    </div>
    
    <div class="form-group">
      <label for="exampleInputEmail1">Description</label>
      <?=$this->Form->input('meta_description',array('type'=>'textarea','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Description'));?>
    </div>
    
    <div class="form-group">
    <label for="exampleInputEmail1">Page Content</label>
    <?=$this->Form->input('page_content',array('type'=>'textarea', 'id'=>'editor1', 'name'=>'editor1', 'rows'=>'10', 'cols'=>'80', 'class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Content'));?>
    </div>
                                            
    <div class="form-group">
      <label for="exampleInputEmail1">Script</label>
      <?=$this->Form->input('script',array('type'=>'textarea','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Script'));?>
    </div>
    
    
    <div class="form-group">
      <label for="exampleInputEmail1">Status</label>
      <?=$this->Form->input('status',array('type'=>'select', 'options'=>array(0=>'Active', 1=>'Inactive'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
    </div>
  </div><!-- /.box-body -->

  <div class="box-footer">
    <?=$this->Form->button('Saved',array('class'=>'btn btn-primary'))?>
  </div>
  <?=$this->Form->end()?>
      
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo $this->webroot.'plugins/jQuery/jQuery-2.1.4.min.js'; ?>"></script>
<script src="<?php echo $this->webroot.'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'; ?>"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
      