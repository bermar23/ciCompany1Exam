<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verification extends CI_Controller {
	
	function __construct(){		
		parent::__construct();		
	}
	
	public function index()
	{
		$this->authenticate();
		$this->load->view( 'verification_view' );	
	}	
	
	function authenticate()
	{
		if ( ! $this->session->flashdata('verification_link') )
		{
			redirect('login');
		}
	}
	
	private function error_response(){
		echo json_encode( array( 'status' => false, 'message' => 'Error encountered. Please try again.' ) );
	}		
	
}
