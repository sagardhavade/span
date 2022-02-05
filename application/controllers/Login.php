<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
        if($this->session->userdata('ses_userlogin_id'))
        {
        	redirect('Dashboard');
        }
    }
	public function index()
	{
		$this->load->view('admin/login_view');
	}
	public function do_login()
	{
		$postdata=$this->input->post();
		$userdata['email']=$postdata['email'];
		$userdata['position_type']=$postdata['position_type'];
		$results=$this->Common_models->get_entry_row('admin_tbl',$userdata);
		if($results)
		{
			if($results['password']==$postdata['password'])
			{
				if(!$results['status'])
				{
					$this->session->set_flashdata('response','<p class="alert alert-danger">Error! Your account has been blocked, please contact to admin for more info.</p>');
					return redirect('Login');
				}
				$this->session->set_userdata('ses_userlogin_id', $results['id']);
				$this->session->set_userdata('ses_userlogin_type', $results['position_type']);
				return redirect('Dashboard');
			}
			
		}
		$this->session->set_flashdata('response','<p class="alert alert-danger">Error! Invalid login details.</p>');
		return redirect('Login');
	}
}
