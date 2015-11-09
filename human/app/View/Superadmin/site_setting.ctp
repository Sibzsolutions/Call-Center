<?php ?>
<script src="<?php echo $this->webroot."plugins/jQuery/jQuery-2.1.4.min.js"; ?>"></script>

                  <?=$this->Form->create('Site_setting', array("role"=>"form"));?>
                  <div class="box-body form_box">
                  
                  <?=$this->Form->input('id',array('type'=>'hidden','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Site Url',  'value'=>$site_setting['Site_setting']['id']));?>
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Site Url</label>
                      <?=$this->Form->input('site_url',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Site Url',  'value'=>$site_setting['Site_setting']['site_url']));?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Site Name</label>
                      <?=$this->Form->input('site_name',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Site Name',  'value'=>$site_setting['Site_setting']['site_name']));?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Default Meta Title</label>
                      <?=$this->Form->input('defaulttitle',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Default Meta Title',  'value'=>$site_setting['Site_setting']['defaulttitle']));?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Default Meta Key</label>
                      <?=$this->Form->input('defaultdesc',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Default Meta Key',  'value'=>$site_setting['Site_setting']['defaultdesc']));?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Default Meta Description</label>
                      <?=$this->Form->input('defaultkeywords',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Default Meta Description',  'value'=>$site_setting['Site_setting']['defaultkeywords']));?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Default Canonical Tag</label>
                      <?=$this->Form->input('defaultcanonical',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Default Canonical Tag',  'value'=>$site_setting['Site_setting']['defaultcanonical']));?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Contact Us Email</label>
                      <?=$this->Form->input('contactemail',array('type'=>'email','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Contact Us Email',  'value'=>$site_setting['Site_setting']['contactemail']));?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Registration Email</label>
                      <?=$this->Form->input('registeremail',array('type'=>'email','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Registration Email',  'value'=>$site_setting['Site_setting']['registeremail']));?>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Order Email</label>
                      <?=$this->Form->input('orderemail',array('type'=>'email','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Order Email',  'value'=>$site_setting['Site_setting']['orderemail']));?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Free Shipping Price</label>
                      <?=$this->Form->input('freeshipping',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Free Shipping Price',  'value'=>$site_setting['Site_setting']['freeshipping']));?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Maintainance</label>
                      <?=$this->Form->input('maintainance',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Maintainance Value',  'value'=>$site_setting['Site_setting']['maintenance']));?>
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

                  <div class="input_box">
           		    <?=$this->Form->button('Saved',array('class'=>'login_button'))?>
                  </div>
                  <?=$this->Form->end()?>