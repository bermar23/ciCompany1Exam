<link href="<?php echo base_url(); ?>assets/jquery-ui/jquery-ui-1.10.3.full.min.css" rel="stylesheet"/>
<!--<link rel="stylesheet" href="<?php //echo base_url(); ?>assets/fileupload/jquery.fileupload.css">-->
<script src="<?php echo base_url(); ?>assets/jquery-ui/jquery-ui-1.10.3.full.min.js" type="text/javascript"></script>
  <style>
	/* workarounds */
	.ui-autocomplete {
	position: absolute;
	top: 100%;
	left: 0;
	z-index: 1000;
	float: left;
	display: none;
	min-width: 160px;
	width: 160px;
	padding: 4px 0;
	margin: 2px 0 0 0;
	list-style: none;
	background-color: #ffffff;
	border-color: #ccc;
	border-color: rgba(0, 0, 0, 0.2);
	border-style: solid;
	border-width: 1px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	-webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	-moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	-webkit-background-clip: padding-box;
	-moz-background-clip: padding;
	background-clip: padding-box;
	*border-right-width: 2px;
	*border-bottom-width: 2px;
	 
	.ui-menu-item > a.ui-corner-all {
	display: block;
	padding: 3px 15px;
	clear: both;
	font-weight: normal;
	line-height: 18px;
	color: #555555;
	white-space: nowrap;
	 
	&.ui-state-hover, &.ui-state-active {
	color: #ffffff;
	text-decoration: none;
	background-color: #0088cc;
	border-radius: 0px;
	-webkit-border-radius: 0px;
	-moz-border-radius: 0px;
	background-image: none;
	}
	}
	}
  </style>
  <div id="page-wrapper">
	<div class="row">
	  <br/>
		<div class="panel-primary">
		  <div class="panel-heading">
			  Registration
		  </div>
		  <div class="panel-body">
			<form class="form-horizontal" id="search-form">
			  <div class="form-group">
				<label class="col-lg-2 control-label" for="search-autocomplete">Search:</label>			  
				<div class="col-lg-3">
				  <input class="form-control" type="text" id="search-autocomplete"/>
				</div>
			  </div>
			</form>
			<hr/>
			
			
			  <table>
				<tr>				  
				  <td class="col-lg-3">
					<form class="form-horizontal">
					  <div class="form-group">
						<label class="col-lg-3 control-label" for="first_name">First name:</label>
						<div class="col-lg-5">
						  <input type="hidden" id="profile_id"/>
						  <input class="form-control col-sm-4" type="text" id="first_name" readonly/>
						</div>								
					  </div>
					  <div class="form-group">
						<label class="col-lg-3 control-label" for="last_name">Last name:</label>
						<div class="col-lg-5">
						  <input class="form-control col-sm-4" type="text" id="last_name" readonly/>
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-lg-3 control-label" for="email">Email:</label>
						<div class="col-lg-5">
						  <input class="form-control col-sm-4" type="text" id="email" readonly/>
						</div>
					  </div>
					</form>
				  </td>
				  <td class="col-lg-3">
					<div class="col-lg-3" id="image-main-container">
					  <div id="image-container" class="pull-right"><img width="200px" src="<?php echo base_url() . '/uploads/temp/avatar.png';?>" id="picture_url"/></div>					  
					</div>										
					<div id="file-upload-container" hidden>
					<?php echo form_open_multipart('file/do_upload');?>
						<fieldset>
							<input type="file" id="userfile" name="userfile" accept='image/*'/>
						</fieldset>
						<div class="">
							<button class="btn btn-sm btn-success" type="submit" id="file_upload_button">
							Submit
							<i class="fa fa-arrow-right"></i>
							</button>
						</div>												
					</form>
					</div>
				  </td>
				</tr>
			  </table>
			
		  </div>
		  <div class="panel-footer">
			<p></p>
		  </div>
		</div>
	  
	</div>
  </div>
  <script>
  $(document).ready(function() {
	
	$("#search-autocomplete").autocomplete({
	  source: "user/autocomplete",
	  select: function( e, ui ) {		
		$.post('<?php echo site_url();?>/profile', { 'id' : ui.item.id }, function(data){		  
		  var response = data.result;
		  $('#userfile').val( '' );
		  $('#picture_url').attr("src", '');
		  $('#profile_id').val( response.id );
		  $('#first_name').val( response.first_name );
		  $('#last_name').val( response.last_name );
		  $('#email').val( response.email );
		  if ( response.picture_url == null || response.picture_url == '' ) {
			var src = '<?php echo base_url();?>/uploads/temp/avatar.png';
			$('#picture_url').attr("src", src);
		  }
		  else{			
			var src = '<?php echo base_url();?>' + response.picture_url;
			$('#picture_url').attr("src", src);
		  }
		  
		  $user_id = $('#user-id').val();		  
		  if ( $user_id == response.id ){
			$('#file-upload-container').removeAttr('hidden');			
		  }
		  else{
			$('#file-upload-container').attr('hidden', 'true');						
		  }		  
		}, "json");
	  },
	  appendTo: "#search-form"
	});
	
	$("#uploadbutton").click(function () {
        var filename = $("#file").val();

        $.ajax({
            type: "POST",
            url: "addFile.do",
            enctype: 'multipart/form-data',
            data: {
                file: filename
            },
            success: function () {
                alert("Data Uploaded: ");
            }
        });
    });
	
  });
  </script>
  

