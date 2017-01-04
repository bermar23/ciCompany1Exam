<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct(){		
		parent::__construct();		
	}
	
	public function index()
	{		
		$this->authenticate();
		$data['message'] =  '<p style="color:#5bc0de">Please fill-up.</p>';
		$this->load->view( 'login_view', $data );	
	}
	
	public function register()
	{
		$this->authenticate();
		$data['message'] = '<p style="color:#5bc0de">Please fill-up.</p>';
		$this->load->view( 'register_view', $data );	
	}
	
	public function verify( $code ){
		if( ! empty( $code ) ){			
			$this->load->model('user_model');
			$where = array( 'verification_code' => $code );
			$result = $this->user_model->get_userinfo( $where );			
			
			if( $result ){				
				$this->load->model( 'session_model' );
				$this->session_model->set_session_variable( $result );				
				$this->user_model->set_verified( $where );
				redirect( 'pages' );
			}
			else{				
				show_404();				
			}			
		}
		else{			
			show_404();			
		}
	}
	
	public function validate(){
		$user_name = $this->input->post( 'user_name' );		
		$password = $this->input->post( 'password' );
		$this->load->library('encrypt');
		$where = array( 'email' => $user_name, 'password' => $this->encrypt->sha1( $password ) );
		$this->load->model('user_model');
		if( $this->user_model->is_userexist( $where ) ){			
			$result = $this->user_model->get_userinfo( $where );
			$this->load->model('session_model');
			$this->session_model->set_session_variable( $result );
			redirect( 'pages' );			
		}
		else{
			$this->session->set_flashdata( 'user_validation_error_message', '<p style="color:red">Please try again.</p>' );
			redirect('login');
		}
	}
	
	public function process_registration()
	{
		$this->load->library('encrypt');
		$email = $this->input->post( 'email' );
		$first_name = $this->input->post( 'first_name' );
		$last_name = $this->input->post( 'last_name' );
		$password = $this->input->post( 'password' );
		$password_encryted = $this->encrypt->sha1( $password );
		$verification_code = $this->encrypt->sha1( $email );
		
		//Check if user already in the database and verified already
		$where = array( 'email' => $email );
		$this->load->model('user_model');
		if( $this->user_model->is_userexist( $where ) ){
			echo json_encode( array( 'status' => false, 'message' => 'Already registered. Forgot password?' ) );
			exit;
		}
		
		$this->load->model('register_model');
		$data = array();
		$data = array(
						'first_name' => $first_name,
						'last_name' => $last_name,
						'password' => $password_encryted,
						'verification_code' => $verification_code,
						'email' => $email
					  );		
		$result = $this->register_model->set_user_info( $data );
		$verification_link = site_url() . '/verify/' . $verification_code;
		$this->session->set_flashdata( 'verification_link', $verification_link );
		if( $result ){
			echo json_encode( array( 'status' => TRUE, 'message' => $verification_link ) );
		}
		else{
			$this->error_response();
		}
	}
	
	private function error_response(){
		echo json_encode( array( 'status' => false, 'message' => 'Error encountered. Please try again.' ) );
	}
	
	public function logout(){		
		$this->session->sess_destroy();
		redirect('login');
	}	
	
	function authenticate()
	{
		if ( $this->session->userdata('user_name') )
		{
			redirect('pages');
		}
	}
	
}
