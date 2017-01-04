<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Description: Register model
 */
class Session_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
	/*
	 * Set session variables
	 * @param array() $data array results from get user info
	 */
	public function set_session_variable( $data ){		
		$data = array(
					'user_name' 	=>	$data['email'],
					'user_id' 		=>	$data['id'],
					'first_name'	=>	$data['first_name'],
					'last_name'		=>	$data['last_name'],
					'picture_url'	=>	$data['picture_url'],
					'full_name'		=>	$data['first_name'] . ' ' . $data['last_name'],
					'email' 		=>	$data['email']
				);
		$this->session->set_userdata( $data );
	}
    
}
?>