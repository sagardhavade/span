<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projectmanager extends MY_Controller {

	function __construct() {
        parent::__construct();
		$this->userlogin_type=$this->session->userdata('ses_userlogin_type');
    }
	public function Projects()
	{
		$user_id=$this->session->userdata('ses_userlogin_id');
		$sel="select * from project_tbl where FIND_IN_SET($user_id,project_manager) and assigned=1 order by id DESC";
		$q=$this->db->query($sel);
		$res=$q->result_array();
		$data['project_list']=$res;
		$where1=array(
			'position_type='=>'project_manager',
			'status'=>1
		);
		$data['project_managers']=$this->Common_models->get_entry('admin_tbl',$where1,'id','DESC');
		$this->load->view('admin/common/header');
		$this->load->view('admin/projectmanager_project',$data);
		$this->load->view('admin/common/footer');
	}
	public function sites($project_id)
	{
		$where1=array(
			'project_id'=>$project_id
		);
		$data['sites_list']=$this->Common_models->get_entry('sites_tbl',$where1,'id','DESC',2);
		$data['project_detail']=$this->Common_models->get_entry_row('project_tbl',array('id'=>$project_id));
		
		$where1=array(
			'position_type='=>'site_engineer',
			'status'=>1
		);
		$data['site_engineers']=$this->Common_models->get_entry('admin_tbl',$where1,'id','DESC');
		
		$where1=array(
			'position_type='=>'area_manager',
			'status'=>1
		);
		$data['area_managers']=$this->Common_models->get_entry('admin_tbl',$where1,'id','DESC');
		
		$where1=array(
			'position_type='=>'contractor',
			'status'=>1
		);
		$data['contractors']=$this->Common_models->get_entry('admin_tbl',$where1,'id','DESC');
		
		$this->load->view('admin/common/header');
		$this->load->view('admin/sites_list',$data);
		$this->load->view('admin/common/footer');
	}
	public function sites_server($project_id)
	{
		$get_data=$this->input->get();
		$start=$get_data['start'];
		$limit=$get_data['length'];
		$where1=array(
			'project_id'=>$project_id
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
				$contractor
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
	public function assign_eqsite()
	{
		$postdata=$this->input->post();
		$assign_siteengineer=$postdata['assign_siteengineer'];
		$assign_areamanager=$postdata['assign_areamanager'];
		$assign_contractor=$postdata['assign_contractor'];
		$project_id=$postdata['project_id'];
		$where1=array(
			'project_id'=>$project_id
		);
		$recordsTotal=$this->Common_models->counts_data('sites_tbl',$where1);
		
		$site_engineer_count=count($assign_siteengineer);
		$assign_areamanager_count=count($assign_areamanager);
		$assign_contractor_count=count($assign_contractor);
		
		$i1=0;
		$i2=0;
		$i3=0;
		$results=$this->Common_models->get_entry('sites_tbl',$where1,'id','DESC');
		foreach($results as $list)
		{
			if($i1==$site_engineer_count)
			{
				$i1=0;
			}
			if($i2==$assign_areamanager_count)
			{
				$i2=0;
			}
			if($i3==$assign_contractor_count)
			{
				$i3=0;
			}
			$updatedata['site_engineer']=$assign_siteengineer[$i1];
			$updatedata['area_manager']=$assign_areamanager[$i2];
			$updatedata['contractor']=$assign_contractor[$i3];
			$updatedata['assigned']=1;
			
			$this->Common_models->update_entry('sites_tbl',$updatedata,array('id'=>$list['id']));
			
			$i1++;
			$i2++;
			$i3++;
		}
		$update1['assigned_sites']=1;
		$this->Common_models->update_entry('project_tbl',$update1,array('id'=>$project_id));
		$this->session->set_flashdata('response','<p class="alert alert-success">Sites Equally assign to all.</p>');
		return redirect('Projectmanager/sites/'.$project_id);
	}
}
?>