<!-- form start -->
<?=$this->Form->create('Home_page_box', array('role'=>'form', 'enctype'=>'multipart/form-data'));?>


<div class="box-body form_box">
<?=$this->Form->input('id',array('type'=>'hidden','class'=>'form-control','required'=>'required','label'=>'','div'=>false, 'value'=>$home_boxes_data['id']));?>
<div class="form-group">
  <label for="exampleInputEmail1">First Box Short Description </label>
  <?=$this->Form->input('first_shortdesc',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false, 'placeholder'=>'Enter Image Heading', 'value'=>$home_boxes_data['first_shortdesc']));?>
</div>

<div class="form-group" style="clear: both; width: 100%;">
  <label for="exampleInputEmail1">First Box Long Description</label>
  <?=$this->Form->input('first_longdesc',array('type'=>'textarea','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Image Long Description', 'value'=>$home_boxes_data['first_longdesc']));?>
</div>

<div class="form-group">
  <label for="exampleInputEmail1">First Box Image</label><!-- 'class'=>'form-control', -->
  <?=$this->Form->input('first_imagepath',array('type'=>'file','label'=>'','div'=>false, 'placeholder'=>'Select Slider Images', 'value'=>$home_boxes_data['first_imagepath']));?>
<br>  
<?php echo $home_boxes_data['first_imagepath']; ?>
</div>


<div class="form-group" style="clear: both;">
  <label for="exampleInputEmail1">Second Box Short Description </label>
  <?=$this->Form->input('second_shortdesc',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false, 'placeholder'=>'Enter Image Heading', 'value'=>$home_boxes_data['second_shortdesc']));?>
</div>

<div class="form-group" style="clear: both; width: 100%;">
  <label for="exampleInputEmail1">Second Box Long Description</label>
  <?=$this->Form->input('second_longdesc',array('type'=>'textarea','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Image Long Description', 'value'=>$home_boxes_data['second_longdesc']));?>
</div>

<div class="form-group">
  <label for="exampleInputEmail1">Second Box Image</label><!-- 'class'=>'form-control', -->
  <?=$this->Form->input('second_imagepath',array('type'=>'file','label'=>'','div'=>false, 'placeholder'=>'Select Slider Images', 'value'=>$home_boxes_data['second_imagepath']));?>
<br>
<?php echo $home_boxes_data['second_imagepath']; ?>
</div>


</div><!-- /.box-body -->

<div class="input_box">
<?=$this->Form->button('Saved',array('class'=>'login_button'))?>
</div>
<?=$this->Form->end()?>