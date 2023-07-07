<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Career_models extends CI_Model {


	public function __construct()
	 {
	  $this->load->database();
	 }

	 public function career_form_submit($insert_arr)
	 {
	  $this->db->insert("master_career" , $insert_arr);  //master_career  table name
	  return $this->db->insert_id();
	 }


	 public function contact_form_submit($insert_arr)
	 {
	  $this->db->insert("contact_data" , $insert_arr);  //master_career  table name
	  return $this->db->insert_id();
	 }
	
	
}
