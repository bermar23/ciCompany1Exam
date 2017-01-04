<html>
<head>
<title>Carbon Digital Inc.</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<!-- Core Scripts - Include with every page -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>		
		<title>Carbon Digital Inc.</title>
		<!-- Core CSS - Include with every page -->
		<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>
		<link href="<?php echo base_url(); ?>assets/bootstrap/css/sb-admin.css" rel="stylesheet"/>
		<link href="<?php echo base_url(); ?>assets/bootstrap/font-awesome/css/font-awesome.css" rel="stylesheet">		
		<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>
		
		<!-- Script and CSS Specifically for this page only -->		
		
</head>
	<body>
		<div id="wrapper">
			<div id="toggle-div"></div>
			<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
				<div class="navbar-header">
					<a class="navbar-brand" href="">Carbon Digital, Inc. - Exam by Bermar Balibalos</a>
				</div>
				
				<ul class="nav navbar-top-links navbar-right">					
					<li><a href=""><i class="fa fa-user fa-fw"></i><?php echo $this->session->userdata('full_name'); ?><input id="user-id" type="hidden" value="<?php echo $this->session->userdata('user_id'); ?>"/></a></li>
					<li><a href="<?php echo site_url() . '/logout';?>"><i class="fa fa-sign-out fa-fw"></i></i>Logout</a></li>					
				</ul>
			</nav>