<?php 
function json_set($res)
{
	$ci =& get_instance();
	$data=$ci->output
		->set_content_type('application/json') //set Json header
		->set_output(json_encode($res));
	return $data;
}
function get_userby_id($id)
{
	$ci =& get_instance();
	$userdetail=$ci->Common_models->get_entry_row('admin_tbl',array('id'=>$id));
	unset($userdetail['password']);
	return $userdetail;
}
?>