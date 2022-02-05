<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teams extends MY_Controller {

	function __construct() {
        parent::__construct();
		$this->userlogin_type=$this->session->userdata('ses_userlogin_type');
		if($this->userlogin_type!=='admin')
		{
			return redirect('dashboard');
		}
    }
	public function index()
	{
		$where=array(
			'position_type!='=>'admin'
		);
		$data['userslist']=$this->Common_models->get_entry('admin_tbl',$where,'id','DESC');
		$this->load->view('admin/common/header');
		$this->load->view('admin/teams_view',$data);
		$this->load->view('admin/common/footer');
	}
	public function add_team() 
	{
		$postdata=$this->input->post();
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[admin_tbl.email]');
		$this->form_validation->set_rules('position_type', 'Position', 'trim|required');
		$this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|regex_match[/^[0-9]{10}$/]');
		if($this->form_validation->run() == FALSE)
        {
			$where=array(
			'position_type!='=>'admin'
			);
			$data['userslist']=$this->Common_models->get_entry('admin_tbl',$where,'id','DESC');
			$this->load->view('admin/common/header');
			$this->load->view('admin/teams_view',$data);
			$this->load->view('admin/common/footer');
		}
		else 
		{
			$d=explode("@",$postdata['email']);
			$uid=$d[0];
			$password=$this->Common_models->generateRandomString(8);
			$inserdata['name']=$postdata['name'];
			$inserdata['email']=$postdata['email'];
			$inserdata['mobile']=$postdata['mobile'];
			$inserdata['position_type']=$postdata['position_type'];
			$inserdata['created_by']=date('Y-m-d H:i:s');
			$inserdata['password']=$password;
			$add_data=$this->Common_models->add_entry('admin_tbl',$inserdata);
			if($add_data)
			{
				$uid=$uid.$add_data;
				$updata['user_id']=$uid;
				$this->Common_models->update_entry('admin_tbl',$updata,array('id'=>$add_data));
			}
			$this->session->set_flashdata('response','<p class="alert alert-success">Success! Team added successfully.</p>');
			return redirect('Teams');
		}
	}
	public function deactivate_team($user_id)
	{
		$updata['status']=0;
		$this->Common_models->update_entry('admin_tbl',$updata,array('id'=>$user_id));
		$this->session->set_flashdata('response','<p class="alert alert-success">Success! Account deactived.</p>');
		return redirect('Teams');
	}
	public function activate_team($user_id)
	{
		$updata['status']=1;
		$this->Common_models->update_entry('admin_tbl',$updata,array('id'=>$user_id));
		$this->session->set_flashdata('response','<p class="alert alert-success">Success! Account activated.</p>');
		return redirect('Teams');
	}
	
	
}
