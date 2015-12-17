<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

//$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
//$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>

<!DOCTYPE html>
<html>
<head>
	<?php //echo $this->Html->charset(); 
	
	if(isset($dynamic_page_data['Dynamic_page']) !='')
	{
		if(($dynamic_page_data['Dynamic_page']['name'] == 'index') || (!(isset($dynamic_page_data['Dynamic_page']['name']))))
		{
			?>
			<title><?php echo $site_setting['Site_setting']['defaulttitle']; ?></title>
			<meta name="keywords" content="<?php echo $site_setting['Site_setting']['defaultkeywords']; ?>" />
			<meta name="description" content="<?php echo $site_setting['Site_setting']['defaultdesc']; ?>" />	
            <?php //echo $site_setting['Site_setting']['script']; ?>
			<?php			
		}
		else
		{
			?>
			<title><?php echo $dynamic_page_data['Dynamic_page']['meta_title']; ?></title>
			<meta name="keywords" content="<?php echo $dynamic_page_data['Dynamic_page']['meta_keywords']; ?>" />
			<meta name="description" content="<?php echo $dynamic_page_data['Dynamic_page']['meta_description']; ?>" />	
			<?php
			if($dynamic_page_data['Dynamic_page']['script'] != 'No script is here')
			echo $dynamic_page_data['Dynamic_page']['script'];
		}
	}
	else
	{
		?>
			<title><?php echo $site_setting['Site_setting']['defaulttitle']; ?></title>
			<meta name="keywords" content="<?php 
			if(isset($site_setting['Site_setting']))
			echo $site_setting['Site_setting']['defaultkeywords']; ?>" />
			<meta name="description" content="<?php 
			if(isset($site_setting['Site_setting']))
			echo $site_setting['Site_setting']['defaultdesc']; ?>" />	
            <?php //echo $site_setting['Site_setting']['script']; 
	}

	?>
	<!--<title>
		<?php //echo $cakeDescription ?>:
		<?php //echo $title_for_layout; ?>
        <?php //echo "Only Human"; ?>:
	</title>-->
	
	
	<!-- Start Head section of the only human new theme -->
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Dashboard</title>
	<style type="text/css">
	body {
		background-color: #FFF;
		margin-left: 0px;
		margin-top: 0px;
		margin-right: 0px;
		margin-bottom: 0px;
	}
	</style>
	<link href="<?php echo $this->webroot.'css/local/style.css'; ?>" rel="stylesheet" type="text/css" />
	
	<!-- End Head section of the only human new theme -->
	
	<!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo $this->webroot.'bootstrap/css/bootstrap.min.css';?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php //echo $this->webroot.'css/temp_first/AdminLTE.min.css';?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php //echo $this->webroot.'css/temp_first/skins/_all-skins.min.css';?>">
    
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo $this->webroot.'plugins/iCheck/flat/blue.css';?>">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo $this->webroot.'plugins/morris/morris.css';?>">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo $this->webroot.'plugins/jvectormap/jquery-jvectormap-1.2.2.css';?>">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo $this->webroot.'plugins/datepicker/datepicker3.css';?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo $this->webroot.'plugins/daterangepicker/daterangepicker-bs3.css';?>">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo $this->webroot.'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css';?>">

	<link href="<?php echo $this->webroot.'img/local/favicon.ico'; ?>" type="image/x-icon" rel="icon" />
	
	<?php
		
	//echo $this->Html->meta('icon');

	//echo $this->Html->css('cake.generic');

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	
	?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
	
	<div class="wrapper">
	
	  <?php echo $this->Element('superadmin_header'); ?>
	  
	  <div class="content">
		<div class="heading55">
		<?php echo str_replace("_"," ",ucfirst($this->request->params['action'])); ?>
		</div>
		<div class="gray_box text12_black">&nbsp;&nbsp;Super Administrator > <?php echo str_replace("_"," ",ucfirst($this->request->params['action'])); ?></div>
		<div class="width100">
		
		<?php echo $this->fetch('content'); ?>
		
		</div>
	  </div>
		
		<?php echo $this->Element('superadmin_footer'); ?>
	  
	</div>
	<?php 
	/*
	?>
	<!-- jQuery 2.1.4 -->
	<!--<script src="<?php //echo $this->webroot."plugins/jQuery/jQuery-2.1.4.min.js";?>"></script>-->
	<!-- jQuery UI 1.11.4 -->
	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

	<!-- Bootstrap 3.3.5 -->
	<script src="<?php echo $this->webroot."bootstrap/js/bootstrap.min.js";?>"></script>
	<!-- Morris.js charts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="<?php echo $this->webroot."plugins/morris/morris.min.js";?>"></script>
	<!-- Sparkline -->
	<script src="<?php echo $this->webroot."plugins/sparkline/jquery.sparkline.min.js";?>"></script>
	<!-- jvectormap -->
	<script src="<?php echo $this->webroot."plugins/jvectormap/jquery-jvectormap-1.2.2.min.js";?>"></script>
	<script src="<?php echo $this->webroot."plugins/jvectormap/jquery-jvectormap-world-mill-en.js";?>"></script>
	<!-- jQuery Knob Chart -->
	<script src="<?php echo $this->webroot."plugins/knob/jquery.knob.js";?>"></script>
	<!-- daterangepicker -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
	<script src="<?php echo $this->webroot."plugins/daterangepicker/daterangepicker.js";?>"></script>
	<!-- datepicker -->
	<script src="<?php echo $this->webroot."plugins/datepicker/bootstrap-datepicker.js";?>"></script>
	<!-- Bootstrap WYSIHTML5 -->
	<script src="<?php echo $this->webroot."plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js";?>"></script>
	<!-- Slimscroll -->
	<script src="<?php echo $this->webroot."plugins/slimScroll/jquery.slimscroll.min.js";?>"></script>
	<!-- FastClick -->
	<script src="<?php echo $this->webroot."plugins/fastclick/fastclick.min.js";?>"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo $this->webroot."js/temp_first/app.min.js";?>"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="<?php echo $this->webroot."js/temp_first/pages/dashboard.js";?>"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo $this->webroot."js/temp_first/demo.js";?>"></script>
	<script>
		
		  $.widget.bridge('uibutton', $.ui.button);
		  
	</script>
	
	<?php
	*/
	?>
	
</body>
  
	<!--<div id="container">
		<div id="header">
			<h1><?php //echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
		</div>
		<div id="content">

			<?php //echo $this->Session->flash(); ?>

			<?php //echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php /*
					echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
				*/
			?>
			<p>
				<?php //echo $cakeVersion; ?>
			</p>
		</div>
	</div>-->
   
	<?php //echo $this->element('sql_dump'); ?>
	
</body>
</html>
