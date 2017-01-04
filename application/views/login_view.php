<html>
<head>
<title>Carbon Digital - Login</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<!-- Core Scripts - Include with every page -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>		
		<title>Carbon Digital - Login</title>
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
		  width: 300px;
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
			<h2 class="form-signin-heading">Login</h2>
			<div class="content">				
				<?php
					$attributes_login = array( 'class' => 'form-signin', 'id' => 'frm_login' );							
					echo form_open( 'login/validate', $attributes_login );
					echo $message;
				?>				
					<div class="form-group">						
						<input type="email" class="form-control" placeholder="Email" name="user_name" id="user_name" required/>
					</div>
					<div class="form-group">						
						<input type="password" class="form-control" placeholder="Password" name="password" id="password" required/>
					</div>
					<div>
					  <?php echo $this->session->flashdata('user_validation_error_message'); ?>
					</div>
					<button class="btn btn-primary btn-block" type="submit">Submit</button>
					<hr/>
					<p class="center"><a href="<?php echo site_url() . '/login/register';?>">Register?</a></p>
				</form>
			</div>
		</div>
	</body>
</html>