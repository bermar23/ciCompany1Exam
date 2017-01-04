<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {
	
	function __construct(){		
		parent::__construct();
		$this->authenticate();
	}
	
	public function index(){				
		$this->load->view( 'templates/header' );
		$this->load->view( 'profile_view' );
		$this->load->view( 'templates/footer' );
	}
	
	public function error_upload(){
		if ( ! $this->session->flashdata('error_upload_message') )
		{
			redirect('pages');
		}
		$this->load->view( 'error_upload_view');		
	}
	
	function authenticate()
	{
		if ( ! $this->session->userdata('user_name') )
		{
			redirect('login');
		}
	}
	
}
