<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modal extends CI_Controller {

	
	function __construct()
    {
        parent::__construct();
		$this->load->database();
		$this->load->library('session');
		/*cache control*/
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
    }
	
	/***default functin, redirects to login page if no admin logged in yet***/
	public function index()
	{
		
	}
	
	
	/*
	*	$page_name		=	The name of page
	*/
	function popup($page_name = '' , $param2 = '' , $param3 = '')
	{
		$account_type		=	$this->session->userdata('login_type');
		$page_data['param2']		=	$param2;
		$page_data['param3']		=	$param3;
		$page_data['param4']        =   $account_type;
		$this->load->view( 'backend/'.$account_type.'/'.$page_name.'.php' ,$page_data);
		
		echo '<script src="assets/js/neon-custom-ajax.js"></script>';
	}
	
	function print_from_popup($page_name="",$param2="",$param3="")
	{
		$account_type		=	$this->session->userdata('login_type');
		$page_data['param2']		=	$param2;
		$page_data['param3']		=	$param3;
		$page_data['param4']        =   $account_type;
		$page_data['neon_cstm_ajx_location'] =   '<script src="'.base_url().'assets/js/neon-custom-ajax.js"></script>';
		$this->load->view( 'backend/'.$account_type.'/'.$page_name.'.php' ,$page_data);
	}
        
        function modal_student_marksheet_print($student_id,$class_id="")
        {
            $account_type		= $this->session->userdata('login_type');
            $page_data['student_id']	= $student_id;
            $page_data['account_type']  = $account_type;
            $page_data['class_id']      = $class_id;
            $this->load->view( 'backend/'.$account_type.'/mark_sheet_print.php' ,$page_data);
        }
}

