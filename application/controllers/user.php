<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	
	function __construct(){		
		parent::__construct();
		$this->authenticate();
	}
	
	public function index(){
		
	}
	
	public function autocomplete(){
		$password = $this->input->post( 'password' );
		$this->load->model('user_model');		
		if ( isset( $_GET['term'] ) ){
			$data = strtolower( $_GET['term'] );
			$this->user_model->get_users( $data );
		}		
	}
	
	public function profile(){
		$id = $this->input->post( 'id' );
		$this->load->model('user_model');
		$where = array( 'id' => $id );
		$result = $this->user_model->get_userinfo( $where );
		echo json_encode( array( 'result' => $result ) );
	}
	
	function authenticate()
	{
		if ( ! $this->session->userdata('user_name') )
		{
			redirect('login');
		}
	}
	
}
