<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Description: Register model
 */
class Register_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
	public function set_user_info( $data ){
		$this->db->insert( 'user', $data );
		$result = $this->db->insert_id();
		return ( $result ? $result : FALSE );		
	}	
    
}
?>