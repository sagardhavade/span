<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workorder extends MY_Controller {

	function __construct() {
        parent::__construct();
    }
	public function index()
	{
		$where=array(
			'position_type='=>'project_head',
			'status'=>1
		);
		$data['project_heads']=$this->Common_models->get_entry('admin_tbl',$where,'id','DESC');
		$where1=array(
		);
		$data['workorder_list']=$this->Common_models->get_entry('workorder_tbl',$where1,'id','DESC');
		$this->load->view('admin/common/header');
		$this->load->view('admin/workorder_view',$data);
		$this->load->view('admin/common/footer');
	}
	public function add_order() 
	{
		$postdata=$this->input->post();
		//print_r($postdata); die;
		$this->form_validation->set_rules('loi_number', 'LOI NO', 'trim|required');
		$this->form_validation->set_rules('loi_date', 'LOI date', 'trim|required');
		$this->form_validation->set_rules('workorder_no', 'Workorder Number', 'trim|required');
		$this->form_validation->set_rules('workorder_date', 'Workorder Date', 'trim|required');
		if($this->form_validation->run() == FALSE)
        {
			$this->session->set_flashdata('response','<div class="err_datasse">'.validation_errors().'</div>');
		}
		else 
		{
			$project_head='';
			if($postdata['project_head'])
			{
				$project_head=implode(",",$postdata['project_head']);
			}
			$inserdata['loi_no']=$postdata['loi_number'];
			$inserdata['loi_date']=date('Y-m-d',strtotime($postdata['loi_date']));
			$inserdata['workorder_no']=$postdata['workorder_no'];
			$inserdata['workorder_date']=date('Y-m-d',strtotime($postdata['workorder_date']));
			$inserdata['order_deadline']=$postdata['order_deadline'];
			$inserdata['project_head']=$project_head;
			$inserdata['created_by']=$this->session->userdata('ses_userlogin_id');
			$inserdata['created_at']=date('Y-m-d H:i:s');
			$add_data=$this->Common_models->add_entry('workorder_tbl',$inserdata);
			if($add_data)
			{
				
			}
			$this->session->set_flashdata('response','<p class="alert alert-success">Success! Order added successfully.</p>');
			
		}
		return redirect('Workorder');
	}
	public function edit_order($id) 
	{
		$where=array(
			'position_type='=>'project_head',
			'status'=>1
		);
		$data['project_heads']=$this->Common_models->get_entry('admin_tbl',$where,'id','DESC');
		$where1=array(
			'id'=>$id
		);
		$data['workorder_detail']=$this->Common_models->get_entry_row('workorder_tbl',$where1);
		$this->load->view('admin/common/header');
		$this->load->view('admin/edit_workorder',$data);
		$this->load->view('admin/common/footer');
	}
	public function do_editorder($id) 
	{
		$postdata=$this->input->post();
		$project_head='';
		if($postdata['project_head'])
		{
			$project_head=implode(",",$postdata['project_head']);
		}
		$inserdata['loi_no']=$postdata['loi_number'];
		$inserdata['loi_date']=date('Y-m-d',strtotime($postdata['loi_date']));
		$inserdata['workorder_no']=$postdata['workorder_no'];
		$inserdata['workorder_date']=date('Y-m-d',strtotime($postdata['workorder_date']));
		$inserdata['order_deadline']=$postdata['order_deadline'];
		$inserdata['project_head']=$project_head;
		$add_data=$this->Common_models->update_entry('workorder_tbl',$inserdata,array('id'=>$id));
		if($add_data)
		{
			
		}
		$this->session->set_flashdata('response','<p class="alert alert-success">Success! Order Updated successfully.</p>');
		return redirect('Workorder/edit_order/'.$id);
	}
	public function order_received()
	{
		$user_id=$this->session->userdata('ses_userlogin_id');
		$sel="select * from workorder_tbl where FIND_IN_SET($user_id,project_head) order by id DESC";
		$q=$this->db->query($sel);
		$aa=array();
		if($q->num_rows())
		{
			$aa=$q->result_array();
		}
		$data['workorder_list']=$aa;
		$this->load->view('admin/common/header');
		$this->load->view('admin/order_received_view',$data);
		$this->load->view('admin/common/footer');
		
	}
	
	
}
