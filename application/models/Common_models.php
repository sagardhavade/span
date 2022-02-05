<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Common_models extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function add_entry($table,$data) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    public function get_entries() {
        $query = $this->db->get('employee');
        return $query->result();
    }
    public function update_entry($table,$data,$where) {
        $this->db->where($where);
        $qyer=$this->db->update("$table", $data);
		return $qyer;
    }
	public function counts_data($table,$where=null,$select=null) {
		if($select)
		{
			$this->db->select($select); 
		}
        if($where)
        {
           $this->db->where($where); 
        }
        
        $query = $this->db->get($table);
		return $query->num_rows();
    }
	public function counts_data_total_req($sql) {
		$count_r=0;
		$row=$this->db->query($sql)->row_array();
		if($row['totalcount'])
		{
			$count_r=$row['totalcount'];
		}
		return $count_r;
    }
    public function get_entry($table,$where=null,$orderby=null,$order=null,$limit=null,$offset=0) {
        if($where)
        {
           $this->db->where($where); 
        }
        
        if($orderby)
        {
            $this->db->order_by($orderby, $order);
        }
        if($limit)
        {
            $this->db->limit($limit,$offset);
        }
        
        $query = $this->db->get($table);
		if($query->num_rows())
		{
			return $query->result_array();
		}
		else 
		{
			return array();
		}
    }
	public function get_entry_row($table,$where=null,$orderby=null,$order=null,$limit=null) {
        if($where)
        {
           $this->db->where($where); 
        }
        
        if($orderby)
        {
            $this->db->order_by($orderby, $order);
        }
        if($limit)
        {
            $this->db->limit($limit);
        }
        
        $query = $this->db->get($table);
		if($query->num_rows())
		{
			return $query->row_array();
		}
		else 
		{
			return false;
		}
    }
    public function delete_entry($table,$where) {
        return $this->db->delete($table,$where);
    }
	public function generateRandomString($length=4) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	public function password_creator($password) {
		$pass_rand=$this->Common_models->generateRandomString();
		$new_password=md5(md5($password).$pass_rand);
		return array('password'=>$new_password,'SALT'=>$pass_rand);
	}
	
}
?>