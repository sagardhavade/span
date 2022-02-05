<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usermodule extends CI_Controller {

	function __construct() {
        parent::__construct();
		header("Access-Control-Allow-Origin: *");
    }
	public function login()
	{
		  $post_data=$this->input->post();
		  if(empty($post_data['email']) || empty($post_data['password']))
		  {
			  $res['success']=0;
			  $res['msg']='Please check parameter';
		  }
		  else 
		  {
			  $where1=array(
				'email'=>$post_data['email']
			  );
			  $userdetail=$this->Common_models->get_entry_row('admin_tbl',$where1);
			  if($userdetail)
			  {
				  if($userdetail['password']==$post_data['password'])
				  {
					  if($userdetail['status']==1)
					  {
						  $res['success']=1;
						  $res['user_detail']=get_userby_id($userdetail['id']);
						  $res['msg']='Login Successfully!';
						  return json_set($res);
					  }
					  else 
					  {
						  $res['success']=0;
						  $res['msg']='Error! Your account blocked by system admin!';
						  return json_set($res);
					  }
				  }
				  
			  }
			  $res['success']=0;
			  $res['msg']='Invalid Login Detail';
		  }
		  return json_set($res);
	}
}
?>