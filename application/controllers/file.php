<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class File extends CI_Controller {
	
	function __construct(){		
		parent::__construct();
		$this->authenticate();
	}

	public function do_upload(){
		$file_element_name = 'userfile';
		$config['upload_path'] = './uploads/photos';
        $config['allowed_types'] = 'gif|jpg|png';
		//$config['overwrite'] = TRUE;
		//$config['max_size'] = '500';
		//$config['max_width'] = '1024';
		//$config['max_height'] = '768';
		$this->load->model('image_model');
		$config['file_name'] = $this->image_model->generate_filename( $this->session->userdata('user_name') );				
        $this->load->library( 'upload', $config );
 
        if ( ! $this->upload->do_upload( $file_element_name ) )
        {
            //echo json_encode( array( 'status' => FALSE, 'message' => $this->upload->display_errors('', '') ) );
			$this->session->set_flashdata( 'error_upload_message', $this->upload->display_errors('', '') );
			redirect( 'pages/error_upload' );
        }
        else
        {
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];
			
			$this->load->model('user_model');
			$where = array( 'email' => $this->session->userdata('user_name') );
			$response = $this->user_model->set_pictureurl( 'uploads/photos/' . $file_name, $where );
			if( $response ){
				$this->image_model->resize_image( './uploads/photos/'.$file_name );
				$this->image_model->watermark_image( './uploads/photos/'.$file_name );	
				$status = TRUE;
				$message = 'Image successfully uploaded.';
				//echo json_encode( array( 'status' => TRUE, 'message' => 'Image successfully uploaded.' ) );
				redirect( 'pages' );
			}
			else{
				//echo json_encode( array( 'status' => FALSE, 'message' => 'Something went wrong. Please try again.' ) );
				$this->session->set_flashdata( 'error_upload_message', 'Something went wrong. Please try again.' );
				redirect( 'pages/error_upload' );
			}
        }        
		
	}	
	
	function authenticate()
	{
		if ( ! $this->session->userdata('user_name') )
		{
			redirect('login');
		}
	}
	
}
