<html>
<head>
<title>Carbon Digital - Register</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<!-- Core Scripts - Include with every page -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/validation/jquery.validate.min.js"></script>
		<title>Carbon Digital - Register</title>
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
		  width: 500px;
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
		
		.error{
		  color:red;
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
			<h2 class="form-signin-heading">Register</h2>
			<div class="content">				
				<form id="frm_register" class="form-signin" action="">
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" placeholder="Email" name="email" id="email" required/>
					</div>
					<div class="form-group">
						<label for="first_name">First name</label>
						<input type="text" class="form-control" placeholder="First name" name="first_name" id="first_name" required/>
					</div>
					<div class="form-group">
						<label for="last_name">Last name</label>
						<input type="text" class="form-control" placeholder="Last name" name="last_name" id="last_name" required/>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" placeholder="Password" name="password" id="password" required/>
					</div>
					<div class="form-group">
						<label for="confirm_password">Confirm Password</label>
						<input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" id="confirm_password" required/>
					</div>
					<div class="clearfix">
					  <button class="btn btn-primary pull-right" type="button" id="register_btn"><i class="fa fa-check"></i> Submit</button>
					</div>	
					<hr/>
					<p class="center"><a href="<?php echo site_url() . '/login';?>">Login?</a></p>
				</form>
			</div>
		</div>
		
		<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="submit-modal-label" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title" id="submit-modal-label">Message</h4>
					</div>
					<div class="modal-body">
						<span id="server-message"></span>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Close
						</button>				
					</div>
				</div>
			</div>
		</div>
		
<script>
$(document).ready(function() {
    
  $( "#frm_register" ).validate({
	rules: {
	  email: {
			  required: true,
			  email: true
	  },	  
	  first_name: "required",
	  last_name: "required",
	  password: "required",
	  confirm_password: {
		equalTo: "#password"
	  }
	}
  });
    
  
  $('#register_btn').click(function() {	
	if( $("#frm_register").valid() ){
	  var email = $('#email').val();
	  var first_name = $('#first_name').val();
	  var last_name = $('#last_name').val();
	  var password = $('#password').val();	  
	  
	  $.post('<?php echo site_url();?>/process_registration', { 'email' : email, 'first_name' : first_name, 'last_name' : last_name, 'password' : password }, function(data){					
		  var status = data.status;
		  var message = data.message;					
		  if ( status ) {
			$('#server-message').html( "Validation link : <a href='" + message + "'>" + message + "</a>" );
			$('#register-modal').modal('show');
			reset();
		  }
		  else {				
			$('#server-message').html( message );
			$('#register-modal').modal('show');
			reset();
		  }				
	  }, "json");
	}	
  });
  
  function reset(){
	$('#email').val('');
	$('#first_name').val('');
	$('#last_name').val('');
	$('#password').val('');
	$('#confirm_password').val('');
  }
  
});
</script>
	</body>
</html>