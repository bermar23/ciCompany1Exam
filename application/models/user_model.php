<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Description: Register model
 */
class User_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
	public function get_userinfo( $where ){
		$result = array();
		$this->db->select( '*' );
		$this->db->from( 'user' );
		$this->db->where( $where );		
		$result = $this->db->get();		
		return ( $result ? $result->row_array() : FALSE );				
	}
	
	public function is_userexist( $where ){
		$result = array();
		$this->db->select( '*' );
		$this->db->from( 'user' );
		$this->db->where( $where );
		$this->db->where( 'is_verified', 1 );
		$result = $this->db->get();		
		return ( $result->num_rows() > 0 ? TRUE : FALSE );		
	}
	
	public function get_users( $data ){
		$this->db->select( '*' );		
		$this->db->like( 'first_name', $data );
		$this->db->or_like( 'last_name', $data );		
		$query = $this->db->get('user');
		if($query->num_rows > 0){
		  foreach ($query->result_array() as $row){
			$new_row['id']=htmlentities(stripslashes($row['id']));
			$new_row['label']=htmlentities(stripslashes($row['first_name'] . ' ' . $row['last_name'] ));
			$new_row['value']=htmlentities(stripslashes($row['first_name'] . ' ' . $row['last_name'] ));
			$row_set[] = $new_row; 
		  }
		  echo json_encode($row_set);
		}
	}
	
	public function set_pictureurl( $data, $where ){		
		$data  = array( 'picture_url' => $data );
		$this->db->where( $where );
		$query = $this->db->update( 'user', $data );
		//echo $this->db->last_query();
		return ( ( $query ) ? TRUE : FALSE );
	}
	
	public function set_verified( $where ){
		$data  = array( 'is_verified' => 1 );
		$this->db->where( $where );
		$this->db->update( 'user', $data );		
		return ( $this->db->affected_rows() ? TRUE : FALSE );
	}	
    
}
?>