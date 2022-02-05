<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siteengineer extends MY_Controller {

	public $user_id;

	function __construct() {
        parent::__construct();
		$this->userlogin_type=$this->session->userdata('ses_userlogin_type');
    	$this->user_id=$this->session->userdata('ses_userlogin_id');
    }
	
	public function Projects()
	{
		$user_id=$this->session->userdata('ses_userlogin_id');
		$sel="select * from project_tbl where id IN (select project_id from sites_tbl where site_engineer='$user_id' GROUP BY project_id order by id DESC)";
		$q=$this->db->query($sel);
		$res=$q->result_array();
		$data['project_list']=$res;
		$this->load->view('admin/common/header');
		$this->load->view('admin/siteengineer_project',$data);
		$this->load->view('admin/common/footer');
	}
	public function start_survey($site_id)
	{
		$this->load->view('admin/common/header');
		$this->load->view('admin/testn_view');
		$this->load->view('admin/common/footer');
	}
	
	public function sites($project_id)
	{
		$user_id=$this->session->userdata('ses_userlogin_id');
		$where1=array(
			'project_id'=>$project_id,
			'site_engineer'=>$user_id
		);
		$data['sites_list']=$this->Common_models->get_entry('sites_tbl',$where1,'id','DESC',2);
		$data['project_detail']=$this->Common_models->get_entry_row('project_tbl',array('id'=>$project_id));
		
		$this->load->view('admin/common/header');
		$this->load->view('admin/Siteengineer/sites_list',$data);
		$this->load->view('admin/common/footer');
	}
	
	public function updatesite($site_id)
	{
		$postdata=$this->input->post();
		
		$arr_post=array('circle_name', 'land_district', 'land_village', 'land_taluka', 'workorder_no', 'beneficiary_id', 'beneficiary_name', 'mobilen_number', 'land_address', 'pump_load', 'category', 'work_order_date', 'application_status', 'installation_status', 'installation_date', 'remarks', 'lot', 'cdate', 'added_by', 'site_engineer', 'area_manager', 'contractor', 'assigned', 'site_received_date', 'site_name', 'habitation', 'block', 'product_type', 'pump_type', 'aadhar_no', 'water_source', 'subdivision_name', 'division_name', 'tender_no', 'land_pin');
		$updatepost=array();
		foreach($postdata as $key=>$valuess)
		{
			if(!empty($postdata[$key]))
			{
				$updatepost[$key]=$valuess;
			}
		}
		$add_data=$this->Common_models->update_entry('sites_tbl',$updatepost,array('id'=>$site_id));
		
		$this->session->set_flashdata('response','<p class="alert alert-success">Success! Data Updated.</p>');
		return redirect('Siteengineer/edit_site/'.$site_id);
	}
	public function edit_site($site_id)
	{
		$where1=array(
			'id'=>$site_id
		);
		$data['site_detail']=$this->Common_models->get_entry_row('sites_tbl',$where1);
		$this->load->view('admin/common/header');
		$this->load->view('admin/Siteengineer/edit_site_view',$data);
		$this->load->view('admin/common/footer');
	}
	public function sites_server($project_id)
	{
		$user_id=$this->session->userdata('ses_userlogin_id');
		$get_data=$this->input->get();
		$start=$get_data['start'];
		$limit=$get_data['length'];
		$where1=array(
			'project_id'=>$project_id,
			'site_engineer'=>$user_id
		);
		$recordsTotal=$this->Common_models->counts_data('sites_tbl',$where1);
		$arrayList = [];
		$result 	= $this->Common_models->get_entry('sites_tbl',$where1,'id','DESC',$limit,$start); 
		$i=$this->input->get('start');
		foreach($result as $list) {
			$site_engineer=$area_manager=$contractor='';
			if($list['site_engineer'])
			{
				$whereoo=array('id'=>$list['site_engineer']);
				$enter_res=$this->Common_models->get_entry_row('admin_tbl',$whereoo);
				$site_engineer=$enter_res['name'];
			}
			if($list['area_manager'])
			{
				$whereoo=array('id'=>$list['area_manager']);
				$enter_res=$this->Common_models->get_entry_row('admin_tbl',$whereoo);
				$area_manager=$enter_res['name'];
			}
			if($list['contractor'])
			{
				$whereoo=array('id'=>$list['contractor']);
				$enter_res=$this->Common_models->get_entry_row('admin_tbl',$whereoo);
				$contractor=$enter_res['name'];
			}
			$action='<a href="'.base_url('Siteengineer/edit_site/'.$list['id']).'" type="button" class="btn btn-block btn-danger">Gather</a>';
			
			$action.='<a href="'.base_url('Siteengineer/start_survey/'.$list['id']).'" type="button" class="btn btn-block btn-primary">Survey Update</a>';

			$action.='<a href="'.base_url('Siteengineer/contractor_execution/'.$list['id']).'" type="button" class="btn btn-block btn-success">Execution</a>';

			$arrayList [] = [
				++$i,
				$list['circle_name'],
				$list['land_district'],
				$list['land_village'],
				$list['land_taluka'],
				$list['workorder_no'],
				$list['beneficiary_id'],
				$list['beneficiary_name'],
				$list['mobilen_number'],
				$list['land_address'],
				$list['pump_load'],
				$list['category'],
				$list['work_order_date'],
				$list['application_status'],
				$list['installation_status'],
				$list['installation_date'],
				$list['remarks'],
				$list['lot'],
				$site_engineer,
				$area_manager,
				$contractor,
				$action
			];
		}
		$output = array(
			"draw" 				=> $this->input->get('draw'),
			"recordsTotal" 		=> $recordsTotal,
			"recordsFiltered"	=> $recordsTotal,
			"data" 				=> $arrayList,
		);
		echo json_encode($output);
	}
	


	public function contractor_execution($site_id)
	{
		$where = array(
			'created_by' => $this->user_id,
			'site_id' => $site_id
		);
		$data=$this->Common_models->get_entry_row('contractor_execution',$where,'id','DESC');

		// echo "<pre>"; print_r($data); die;

		$data['site_id'] = $site_id;

		$this->load->view('admin/common/header');
		$this->load->view('admin/Siteengineer/contractor_execution', $data);
		$this->load->view('admin/common/footer');
	}

	public function add_contractor_execution()
	{
		$postdata=$this->input->post();

		$insertdata['contractor_name']=$postdata['contractor_name'];
		$insertdata['civil_start_date']=$postdata['civil_start_date'];
		$insertdata['civil_end_date']=$postdata['civil_end_date'];
		$insertdata['installation_start_date']=$postdata['installation_start_date'];
		$insertdata['installation_end_date']=$postdata['installation_end_date'];
		$insertdata['pump_no']=$postdata['pump_no'];
		$insertdata['pumpset_make']=$postdata['pumpset_make'];
		$insertdata['motor_no']=$postdata['motor_no'];
		$insertdata['motor_make']=$postdata['motor_make'];
		$insertdata['controller_no']=$postdata['controller_no'];
		$insertdata['controller_make']=$postdata['controller_make'];
		$insertdata['rms_no']=$postdata['rms_no'];
		$insertdata['panel_no']=$postdata['panel_no'];
		$insertdata['panel_capacity']=$postdata['panel_capacity'];
		$insertdata['panel_make']=$postdata['panel_make'];
		$insertdata['latitude']=$postdata['latitude'];
		$insertdata['longitude']=$postdata['longitude'];
		$insertdata['rms_communication_status']=$postdata['rms_communication_status'];
		$insertdata['created_by']=$this->user_id;
		$insertdata['site_id']=$postdata['site_id'];
		$insertdata['created_at']=date('Y-m-d H:i:s');
		
		if(!empty($_FILES['civil_file']['name']))
		{
			$ext=explode(".",$_FILES['civil_file']['name']);
			$ext1=end($ext);
			$file_name=rand(22,9999).time().".".$ext1;
			if(move_uploaded_file($_FILES['civil_file']['tmp_name'],"assets/project_document/$file_name"))
			{
				$insertdata['civil_file']=$file_name;
			}
		}

		if(!empty($_FILES['installation_file']['name']))
		{
			$ext=explode(".",$_FILES['installation_file']['name']);
			$ext1=end($ext);
			$file_name=rand(22,9999).time().".".$ext1;
			if(move_uploaded_file($_FILES['installation_file']['tmp_name'],"assets/project_document/$file_name"))
			{
				$insertdata['installation_file']=$file_name;
			}
		}

		$add_data=$this->Common_models->add_entry('contractor_execution',$insertdata);

		if ($add_data) {
			$this->session->set_flashdata('response','<p class="alert alert-success">Success! contractor execution added successfully.</p>');
		} else {
			$this->session->set_flashdata('response','<p class="alert alert-danger">Failed! unable to add.</p>');
		}

		return redirect('Siteengineer/contractor_execution/'.$postdata['site_id']);
	}
}
?>