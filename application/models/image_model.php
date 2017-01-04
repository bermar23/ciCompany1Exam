<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Description: Register model
 */
class Image_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
	public function resize_image( $data ){		
		$config['image_library'] = 'gd2';
		$config['source_image'] = $data;		
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 300;
		$config['height'] = 300;
		$this->load->library( 'image_lib', $config );
		
		if( $this->image_lib->resize() ){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	public function watermark_image( $data ){
		$this->load->library('image_lib');
		$config['source_image'] = $data;
		$config['wm_overlay_path'] = './uploads/overlay/overlay.png';
		$config['wm_opacity'] = 40;
		$config['wm_type'] = 'overlay';				
		$config['wm_vrt_alignment'] = 'bottom';
		$config['wm_hor_alignment'] = 'right';
		$config['wm_padding'] = '20';
		
		$this->image_lib->initialize( $config );
		
		if( $this->image_lib->watermark() ){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	public function generate_filename( $data ){
		$this->load->library('encrypt');
		return $this->encrypt->sha1( $data );		 
	}
	
    
}
?>