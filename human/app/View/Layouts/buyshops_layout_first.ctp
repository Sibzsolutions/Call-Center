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

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>

	<!--<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop Homepage - Start Bootstrap Template</title>-->
	
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
        <meta name="keywords" content="<?php echo $site_setting['Site_setting']['defaultkeywords']; ?>" />
        <meta name="description" content="<?php echo $site_setting['Site_setting']['defaultdesc']; ?>" />	
        <?php //echo $site_setting['Site_setting']['script']; 
    }

    ?>
    
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $this->webroot.'css/only_human/bootstrap.min.css'; ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $this->webroot.'css/only_human/shop-homepage.css'; ?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
        	<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

			<h1><?php //echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

			<?php //echo $this->Html->link($this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),'http://www.cakephp.org/',array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered'));
			?>
			<p>
				<?php //echo $cakeVersion; ?>
			</p>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
