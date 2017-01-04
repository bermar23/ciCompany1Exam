<html>
<head>
<title>Carbon Digital - Verification</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<!-- Core Scripts - Include with every page -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>		
		<title>Carbon Digital - Verification</title>
		<!-- Core CSS - Include with every page -->
		<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/bootstrap/font-awesome/css/font-awesome.css" rel="stylesheet">		
		<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>		
		<!-- Override CSS - Include with every page -->		
		<style type="text/css">
		/* Override some defaults */
		html, body {
		  background-color: #eee;
		}
		body {
		  padding-top: 40px; 
		}
		.container {
		  width: 50%;
		}
  
		/* The white background content wrapper */
		.container > .content {
		  background-color: #fff;
		  padding: 20px;
		  margin: 0 -20px; 
		  -webkit-border-radius: 10px 10px 10px 10px;
			 -moz-border-radius: 10px 10px 10px 10px;
				  border-radius: 10px 10px 10px 10px;
		  -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
			 -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
				  box-shadow: 0 1px 2px rgba(0,0,0,.15);
		}
  
		.login-form {
		  margin-left: 65px;
		}
		
		.form-signin-heading{
		  text-align:center;	  
		}
		
		.center{
		  text-align:center;	  
		}
		
		legend {
		  margin-right: -50px;
		  font-weight: bold;
			color: #404040;
		}
		</style>
</head>
	<body>
		<div class="container">
			<h2 class="form-signin-heading">Verification Link</h2>
			<div class="content">								
			  <p class="center"><a href="<?php echo $this->session->flashdata('verification_link');?>"><?php echo $this->session->flashdata('verification_link');?></a></p>				
			</div>
		</div>
	</body>
</html>