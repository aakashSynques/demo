<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function __construct()
	 {
	  parent::__construct();
	  
	  $_SESSION['page_start_time'] = microtime(true); 
	 }
	
	
	public function index($page = "login")
	 {
	  if(isset($_SESSION['userdata']) && $_SESSION['userdata']['user_logged_status'] == TRUE)
	   {
	    redirect('app/home');
	   }
	  
	  if(!file_exists(APPPATH.'views/app/pages/'.$page.'.php'))
           {
	    show_404();
	   }
	  
	  $data = array();
	  
	  $data["title"] = "Sign-In";
	  
	  $this->load->view('app/pages/'.$page , $data);
	 }
		
	public function validate_user_login()
	 {
	  $data = array();
	  if($this->input->is_ajax_request())
	   {
	    $user_email = (isset($_POST["user_email"]))?$this->input->post("user_email" , TRUE):"";
	    $user_password = (isset($_POST["user_password"]))?$this->input->post("user_password" , TRUE):"";
	    if(trim($user_email) == "" || filter_var($user_email , FILTER_VALIDATE_EMAIL) == FALSE)
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Enter your valid Email-ID.";
	     }
	    else if(trim($user_password) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Enter your Password.";
	     }
	    else
	     {
	      $this->load->model("users_m");
	      $r = $this->users_m->validate_login($user_email , $user_password);
	      if($r != FALSE)
	       {
	        $user_data = array("user_id" => $r[0]->user_id , "role_id" => $r[0]->role_id , "role_name" => $r[0]->role_name , "user_name" => $r[0]->user_name , "user_email" => $r[0]->user_email , "user_mobile" => $r[0]->user_mobile , "user_address" => $r[0]->user_address , "user_logged_status" => TRUE);
	        $_SESSION["userdata"] = $user_data;
	        
	        $data["response"] = TRUE;
	        $data["message"] = "Sign-In Successfully.";
	       }
	      else
	       {
	        $data["response"] = FALSE;
	        $data["message"] = "Invalid Email-ID or Password.";
	       }
	     }
	   }
	  echo json_encode($data);
	 }
}
