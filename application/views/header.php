<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?= $this->config->item("app_name"); ?></title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/chain/css/style.default.css">

    <?php if (!empty($css_files)) : ?>
        <?php foreach($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />     
        <?php endforeach; ?>
    <?php else: ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/grocery_crud/css/jquery_plugins/chosen/chosen.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/grocery_crud/themes/datatables/css/datatables.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/grocery_crud/css/ui/simple/jquery-ui-1.10.1.custom.min.css">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/DataTables/datatables.min.css"/> 
    <?php endif; ?>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/style.css">

    <script src="<?php echo base_url(); ?>assets/jquery.js"></script>    

</head>
<?php
    $current_page = str_replace("/", "_", $current_page);
?>

<script>
    var base_url = "<?php echo base_url(); ?>";
</script>

<body class="<?= $current_page ?>">

<div id="container">

	<?php if (!empty($login) && $login["status"] == 1) : ?>
		<header>
            <div class="headerwrapper">
                <div class="header-left">
                    <a href="index.html" class="logo">
                        <img src="<?= base_url(); ?>images/logo.png" alt="" /> 
                    </a>
                    <div class="pull-right">
                        <a href="" class="menu-collapse">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                </div><!-- header-left -->
                
                <div class="header-right">
                    
                    <divv class="pull-right">
                    	<div class="btn-group btn-group-option">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-caret-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">                              
                              <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Settings</a></li>
                              <li class="divider"></li>
                              <li><a href="<?= base_url() . 'login/logout/'; ?>"><i class="glyphicon glyphicon-log-out"></i>Sign Out</a></li>
                            </ul>
                        </div><!-- btn-group -->

                    </divv>
                    
                </div><!-- header-right -->
                
            </div><!-- headerwrapper -->
        </header>	

	    <section>
	        <div class="mainwrapper">
    <?php endif; ?>