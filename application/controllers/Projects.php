<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends MY_Controller {

	function __construct() {
        parent::__construct();
		$this->userlogin_type=$this->session->userdata('ses_userlogin_type');
    }
	public function index()
	{
		$user_id=$this->session->userdata('ses_userlogin_id');
		/*
		$where='';
		$data['project_list']=$this->Common_models->get_entry('project_tbl',$where,'id','DESC');
		*/
		if($this->userlogin_type=='project_manager')
		{
			$sel="select * from project_tbl where FIND_IN_SET($user_id,project_manager) and assigned=1 order by id DESC";
			$q=$this->db->query($sel);
			$res=$q->result_array();
			$data['project_list']=$res;
		}
		else 
		{
			$where='';
			$data['project_list']=$this->Common_models->get_entry('project_tbl',$where,'id','DESC');
		}
		$where1=array(
			'position_type='=>'project_manager',
			'status'=>1
		);
		$data['project_managers']=$this->Common_models->get_entry('admin_tbl',$where1,'id','DESC');
		$this->load->view('admin/common/header');
		$this->load->view('admin/projectlist_view',$data);
		$this->load->view('admin/common/footer');
	}
	public function create()
	{
		$where=array(
			'position_type='=>'project_manager',
			'status'=>1
		);
		$data['project_managers']=$this->Common_models->get_entry('admin_tbl',$where,'id','DESC');
		$data['statelists']=$this->Common_models->get_entry('states','','name','ASC');
		$this->load->view('admin/common/header');
		$this->load->view('admin/create_project_view',$data);
		$this->load->view('admin/common/footer');
	}
	public function add_project()
	{
		$postdata=$this->input->post();
		$this->form_validation->set_rules('state', 'State', 'trim|required');
		$this->form_validation->set_rules('project_name', 'Project Name', 'trim|required');
		$this->form_validation->set_rules('project_manager[]', 'Project Manager', 'trim|required');
		$this->form_validation->set_rules('define_phase', 'Phase', 'trim|required');
		if($this->form_validation->run() == FALSE)
        {
			$where=array(
			'position_type='=>'project_manager',
			'status'=>1
			);
			$data['project_managers']=$this->Common_models->get_entry('admin_tbl',$where,'id','DESC');
			$data['statelists']=$this->Common_models->get_entry('states','','name','ASC');
			$this->load->view('admin/common/header');
			$this->load->view('admin/create_project_view',$data);
			$this->load->view('admin/common/footer');
		}
		else 
		{
			$project_manager='';
			if($postdata['project_manager'])
			{
				$project_manager=implode(",",$postdata['project_manager']);
			}
			$user_id=$this->session->userdata('ses_userlogin_id');
			$insertdata['state']=$postdata['state'];
			$insertdata['project_name']=$postdata['project_name'];
			$insertdata['project_manager']=$project_manager;
			$insertdata['define_phase']=$postdata['define_phase'];
			$insertdata['scope_deadlines']=$postdata['work_deadlines'];
			$insertdata['created_by']=$user_id;
			$insertdata['created_at']=date('Y-m-d H:i:s');
			if(!empty($_FILES['site_file']['name']))
			{
				$ext=explode(".",$_FILES['site_file']['name']);
				$ext1=end($ext);
				$file_name=rand(22,9999).time().".".$ext1;
				if(move_uploaded_file($_FILES['site_file']['tmp_name'],"assets/project_document/$file_name"))
				{
					$insertdata['site_file']=$file_name;
				}
			}
			if(!empty($_FILES['survey_file']['name']))
			{
				$ext=explode(".",$_FILES['survey_file']['name']);
				$ext1=end($ext);
				$file_name=rand(22,9999).time().".".$ext1;
				if(move_uploaded_file($_FILES['survey_file']['tmp_name'],"assets/project_document/$file_name"))
				{
					$insertdata['survey_file']=$file_name;
				}
			}
			if(!empty($_FILES['icr_file']['name']))
			{
				$ext=explode(".",$_FILES['icr_file']['name']);
				$ext1=end($ext);
				$file_name=rand(22,9999).time().".".$ext1;
				if(move_uploaded_file($_FILES['icr_file']['tmp_name'],"assets/project_document/$file_name"))
				{
					$insertdata['icr_file']=$file_name;
				}
			}
			$add_data=$this->Common_models->add_entry('project_tbl',$insertdata);
			if($add_data)
			{
				if(!empty($insertdata['site_file']))
				{
					$row = 1;
					if (($handle = fopen("assets/project_document/".$insertdata['site_file'], "r")) !== FALSE) {
					  while(($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
						$num = count($data);
						if($row==1)
						{
							$row++;
							continue;
						}
						$row++;
						$array_site=array();
						$array_site['circle_name']=$data[0];
						$array_site['land_district']=$data[1];
						$array_site['land_village']=$data[2];
						$array_site['land_taluka']=$data[3];
						$array_site['workorder_no']=$data[4];
						$array_site['beneficiary_id']=$data[5];
						$array_site['beneficiary_name']=$data[6];
						$array_site['mobilen_number']=$data[7];
						$array_site['land_address']=$data[8];
						$array_site['pump_load']=$data[9];
						$array_site['category']=$data[10];
						$array_site['work_order_date']=date('Y-m-d H:i:s',strtotime($data[11]));
						$array_site['application_status']=$data[12];
						$array_site['installation_status']=$data[13];
						$array_site['installation_date']=date('Y-m-d',strtotime($data[14]));
						$array_site['remarks']=$data[15];
						$array_site['lot']=$data[16];
						$array_site['cdate']=date('Y-m-d H:i:s');
						$array_site['project_id']=$add_data;
						$array_site['added_by']=$user_id;
						$this->Common_models->add_entry('sites_tbl',$array_site);
					  }
					  fclose($handle);
					}
				}
			}
			$this->session->set_flashdata('response','<p class="alert alert-success">Success! Project added successfully.</p>');
			return redirect('Projects/create');
		}
	}
	public function assign_manager($project_id)
	{
		$user_id=$this->session->userdata('ses_userlogin_id');
		$postdata=$this->input->post();
		$this->form_validation->set_rules('assign_project_manager[]', 'Project Manager', 'trim|required');
		if($this->form_validation->run() == FALSE)
        {
			$this->session->set_flashdata('response','<p class="alert alert-danger">Error! Please select a Project managers.</p>');
		}
		else 
		{
			$project_manager='';
			if($postdata['assign_project_manager'])
			{
				$project_manager=implode(",",$postdata['assign_project_manager']);
			}
			$updatedata['project_manager']=$project_manager;
			$updatedata['assigned']=1;
			$updatedata['assigned_by']=$user_id;
			$updatedata['assigned_at']=date('Y-m-d H:i:s');
			$where['id']=$project_id;
			$update=$this->Common_models->update_entry('project_tbl',$updatedata,$where);
			$this->session->set_flashdata('response','<p class="alert alert-success">Success! Project assigned successfully.</p>');
			
		}
		return redirect('Projects');
	}
}
?>