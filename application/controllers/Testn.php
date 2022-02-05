<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Testn extends MY_Controller {

	function __construct() {
        parent::__construct();
		//$this->userlogin_type=$this->session->userdata('ses_userlogin_type');
		
    }
	function data1()
	{
		$this->load->view('admin/common/header');
		$this->load->view('admin/testn_view');
		$this->load->view('admin/common/footer');
	}
}
?>