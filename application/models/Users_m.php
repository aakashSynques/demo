<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_m extends CI_Model {


	public function __construct()
	 {
	  $this->load->database();
	 }
	
	
	public function validate_login($user_email , $user_password)
	 {
	  $r = $this->db->query("select t1.*,t2.role_name from master_users t1,master_roles t2 where t1.status=1 and t1.login_status=1 and t1.user_email='".$user_email."' and t1.user_password='".$user_password."' and t2.role_id=t1.role_id and t2.status=1");
	  if($r->num_rows() > 0){ return $r->result(); }else{ return FALSE; }
	 }
	
	
	public function get_user_details_by_id($user_id)
	 {
	  $r = $this->db->get_where("master_users" , array("status" => 1 , "user_id" => $user_id));
	  if($r->num_rows() > 0){ return $r->result(); }else{ return FALSE; }
	 }
	
	
	public function update_user_details($user_id , $update_arr)
	 {
	  $this->db->where("user_id" , $user_id);
	  $this->db->update("master_users" , $update_arr);
	  return $this->db->affected_rows();
	 }
	
	
	public function check_user_email_exists($user_id , $user_email)
	 {
	  $r = $this->db->query("select * from master_users where status=1 and user_email='".$user_email."' and user_id!='".$user_id."'");
	  if($r->num_rows() > 0){ return $r->result(); }else{ return FALSE; }
	 }
	
	
	public function check_user_role_exists($role_name)
	 {
	  $r = $this->db->get_where("master_roles" , array("status" => 1 , "role_name" => trim($role_name)));
	  if($r->num_rows() > 0){ return $r->result(); }else{ return FALSE; }
	 }
	
	
	public function add_user_role($insert_arr)
	 {
	  $this->db->insert("master_roles" , $insert_arr);
	  return $this->db->insert_id();
	 }
	
	
	public function get_all_user_roles()
	 {
	  $r = $this->db->get_where("master_roles" , array("status" => 1));
	  if($r->num_rows() > 0){ return $r->result(); }else{ return FALSE; }
	 }
	
	
	public function update_user_role($role_id , $update_arr)
	 {
	  $this->db->where("role_id" , $role_id);
	  $this->db->update("master_roles" , $update_arr);
	  return $this->db->affected_rows();
	 }
	
	
	public function check_email_exists($user_email)
	 {
	  $r = $this->db->query("select * from master_users where status=1 and user_email='".$user_email."'");
	  if($r->num_rows() > 0){ return $r->result(); }else{ return FALSE; }
	 }
	
	
	public function add_user($insert_arr)
	 {
	  $this->db->insert("master_users" , $insert_arr);
	  return $this->db->insert_id();
	 }
	
	
	public function get_all_users()
	 {
	  $r = $this->db->query("select t1.*,t2.role_name from master_users t1,master_roles t2 where t1.status=1 and t2.role_id=t1.role_id and t2.status=1");
	  if($r->num_rows() > 0){ return $r->result(); }else{ return FALSE; }
	 }
	
	
	public function update_user($user_id , $update_arr)
	 {
	  $this->db->where("user_id" , $user_id);
	  $this->db->update("master_users" , $update_arr);
	  return $this->db->affected_rows();
	 }



	 //
	//  public function add_career($insert_arr)
	//  {
	//   $this->db->insert("master_career" , $insert_arr);
	//   return $this->db->insert_id();
	//  }
	
	
}
