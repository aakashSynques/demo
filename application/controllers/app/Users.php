<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
        
	
	public function __construct()
	 {
	  parent::__construct();
	  
	  if(!isset($_SESSION['userdata']) || $_SESSION['userdata']['user_logged_status'] != TRUE)
	   {
	    redirect('app/logout');
	   }
	  
	  $_SESSION['page_start_time'] = microtime(true); 
	 }
	
	
	public function index($page = "users")
	 {
	  if(!file_exists(APPPATH.'views/app/pages/'.$page.'.php'))
           {
	    show_404();
	   }
	  
	  $data = array();
	  
	  $data["title"] = "Users";
	  
	  $this->load->model("users_m");
	  $data["role_list"] = $this->users_m->get_all_user_roles();
	  
	  $this->load->view('app/templates/header' , $data);
	  $this->load->view('app/templates/side_panel' , $data);
	  $this->load->view('app/pages/'.$page , $data);
	  $this->load->view('app/templates/footer' , $data);
	 }
	
	
	public function add_user()
	 {
	  $data = array();
	  if($this->input->is_ajax_request())
	   {
	    $role_id = (isset($_POST["role_id"]))?$this->input->post("role_id" , TRUE):0;
	    $user_name = (isset($_POST["user_name"]))?$this->input->post("user_name" , TRUE):"";
	    $user_email = (isset($_POST["user_email"]))?$this->input->post("user_email" , TRUE):"";
	    $user_mobile = (isset($_POST["user_mobile"]))?$this->input->post("user_mobile" , TRUE):"";
	    $user_address = (isset($_POST["user_address"]))?$this->input->post("user_address" , TRUE):"";
	    if($role_id == 0 || trim($role_id) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Select user role.";
	     }
	    else if(trim($user_name) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Enter your full name.";
	     }
	    else if(trim($user_email) == "" || filter_var($user_email , FILTER_VALIDATE_EMAIL) == FALSE)
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Enter your valid email-id.";
	     }
	    else if(trim($user_mobile) == "" || strlen($user_mobile) != 10)
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Enter your valid 10 digit mobile no.";
	     }
	    else if(trim($user_address) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Enter your complete address.";
	     }
	    else
	     {
	      $this->load->model("users_m");
	      $r = $this->users_m->check_email_exists($user_email);
	      if($r == FALSE)
	       {
	        $insert_arr = array("role_id" => $role_id , "user_name" => $user_name , "user_email" => $user_email , "user_mobile" => $user_mobile , "user_address" => $user_address , "eby" => $_SESSION["userdata"]["user_id"] , "eat" => date("Y-m-d H:i:s"));
	        $r = $this->users_m->add_user($insert_arr);
	        if($r > 0)
	         {
	          $data["response"] = TRUE;
	          $data["message"] = "User added successfully.";
	         }
	        else
	         {
	          $data["response"] = FALSE;
	          $data["message"] = "Some error occured. Please try again later.";
	         }
	       }
	      else
	       {
	        $data["response"] = FALSE;
	        $data["message"] = "This email-id is already exists. Try with other email-id.";
	       }
	     }
	   }
	  echo json_encode($data);
	 }
	
	
	public function edit_user_profile()
	 {
	  $data = array();
	  if($this->input->is_ajax_request())
	   {
	    $user_id = (isset($_POST["user_id"]))?$this->input->post("user_id" , TRUE):0;
	    $role_id = (isset($_POST["role_id"]))?$this->input->post("role_id" , TRUE):0;
	    $user_name = (isset($_POST["user_name"]))?$this->input->post("user_name" , TRUE):"";
	    $user_email = (isset($_POST["user_email"]))?$this->input->post("user_email" , TRUE):"";
	    $user_mobile = (isset($_POST["user_mobile"]))?$this->input->post("user_mobile" , TRUE):"";
	    $user_address = (isset($_POST["user_address"]))?$this->input->post("user_address" , TRUE):"";
	    if($user_id == 0 || trim($user_id) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Invalid User-ID.";
	     }
	    else if($role_id == 0 || trim($role_id) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Select user role.";
	     }
	    else if(trim($user_name) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Enter your full name.";
	     }
	    else if(trim($user_email) == "" || filter_var($user_email , FILTER_VALIDATE_EMAIL) == FALSE)
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Enter your valid email-id.";
	     }
	    else if(trim($user_mobile) == "" || strlen($user_mobile) != 10)
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Enter your valid 10 digit mobile no.";
	     }
	    else if(trim($user_address) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Enter your complete address.";
	     }
	    else
	     {
	      $this->load->model("users_m");
	      $r = $this->users_m->check_user_email_exists($user_id , $user_email);
	      if($r == FALSE)
	       {
	        $update_arr = array("role_id" => $role_id , "user_name" => $user_name , "user_email" => $user_email , "user_mobile" => $user_mobile , "user_address" => $user_address , "eby" => $_SESSION["userdata"]["user_id"] , "eat" => date("Y-m-d H:i:s"));
	        $r = $this->users_m->update_user($user_id , $update_arr);
	        if($r > 0)
	         {
	          $data["response"] = TRUE;
	          $data["message"] = "User profile updated successfully.";
	         }
	        else
	         {
	          $data["response"] = FALSE;
	          $data["message"] = "Some error occured. Please try again later.";
	         }
	       }
	      else
	       {
	        $data["response"] = FALSE;
	        $data["message"] = "This email-id is already exists. Try with other email-id.";
	       }
	     }
	   }
	  echo json_encode($data);
	 }
	
	
	public function get_all_users()
	 {
	  $data = array();
	  if($this->input->is_ajax_request())
	   {
	    $this->load->model("users_m");
	    $r = $this->users_m->get_all_users();
	    if($r != FALSE)
	     {
	      $data["response"] = TRUE;
	      $data["message"] = count($r)." Record Found.";
	      $data["total_record"] = count($r);
	      $data["all_record"] = $r;
	     }
	    else
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "No Record Found.";
	     }
	   }
	  echo json_encode($data);
	 }
	
	
	public function get_user_details_by_id()
	 {
	  $data = array();
	  if($this->input->is_ajax_request())
	   {
	    $user_id = (isset($_POST["user_id"]))?$this->input->post("user_id" , TRUE):0;
	    if($user_id == 0 || trim($user_id) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Invalid User ID.";
	     }
	    else
	     {
	      $this->load->model("users_m");
	      $r = $this->users_m->get_user_details_by_id($user_id);
	      if($r != FALSE)
	       {
	        $data["response"] = TRUE;
	        $data["message"] = count($r)." Record Found.";
	        $data["total_record"] = count($r);
	        $data["all_record"] = $r;
	       }
	      else
	       {
	        $data["response"] = FALSE;
	        $data["message"] = "No Record Found.";
	       }
	     }
	   }
	  echo json_encode($data);
	 }
	
	
	public function manage_login_status_of_user()
	 {
	  $data = array();
	  if($this->input->is_ajax_request())
	   {
	    $user_id = (isset($_POST["user_id"]))?$this->input->post("user_id" , TRUE):0;
	    $login_status = (isset($_POST["login_status"]))?$this->input->post("login_status" , TRUE):0;
	    if($user_id == 0 || trim($user_id) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Invalid User ID.";
	     }
	    else
	     {
	      $this->load->model("users_m");
	      
	      $update_arr = array("login_status" => $login_status , "eby" => $_SESSION["userdata"]["user_id"] , "eat" => date("Y-m-d H:i:s"));
	      $r = $this->users_m->update_user($user_id , $update_arr);
	      if($r > 0)
	       {
	        $data["response"] = TRUE;
	        $data["message"] = "User login status updated successfully.";
	       }
	      else
	       {
	        $data["response"] = FALSE;
	        $data["message"] = "Some error occured. Please try again later.";
	       }
	     }
	   }
	  echo json_encode($data);
	 }
	
	
	public function delete_user()
	 {
	  $data = array();
	  if($this->input->is_ajax_request())
	   {
	    $user_id = (isset($_POST["user_id"]))?$this->input->post("user_id" , TRUE):0;
	    if($user_id == 0 || trim($user_id) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Invalid User ID.";
	     }
	    else
	     {
	      $this->load->model("users_m");
	      
	      $update_arr = array("login_status" => 0 , "status" => 0 , "eby" => $_SESSION["userdata"]["user_id"] , "eat" => date("Y-m-d H:i:s"));
	      $r = $this->users_m->update_user($user_id , $update_arr);
	      if($r > 0)
	       {
	        $data["response"] = TRUE;
	        $data["message"] = "User deleted successfully.";
	       }
	      else
	       {
	        $data["response"] = FALSE;
	        $data["message"] = "Some error occured. Please try again later.";
	       }
	     }
	   }
	  echo json_encode($data);
	 }
	
	
	public function change_password($page = "change_password")
	 {
	  if(!file_exists(APPPATH.'views/app/pages/'.$page.'.php'))
           {
	    show_404();
	   }
	  
	  $data = array();
	  
	  $data["title"] = "Change Password";
	  
	  $this->load->view('app/templates/header' , $data);
	  $this->load->view('app/templates/side_panel' , $data);
	  $this->load->view('app/pages/'.$page , $data);
	  $this->load->view('app/templates/footer' , $data);
	 }
	
	
	public function validate_change_password()
	 {
	  $data = array();
	  if($this->input->is_ajax_request())
	   {
	    $user_id = (isset($_POST["user_id"]))?$this->input->post("user_id" , TRUE):0;
	    $old_password = (isset($_POST["old_password"]))?$this->input->post("old_password" , TRUE):"";
	    $new_password = (isset($_POST["new_password"]))?$this->input->post("new_password" , TRUE):"";
	    $renew_password = (isset($_POST["renew_password"]))?$this->input->post("renew_password" , TRUE):"";
	    if($user_id == 0 || trim($user_id) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Invalid User-ID.";
	     }
	    else if(trim($old_password) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Enter your old password.";
	     }
	    else if(trim($new_password) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Enter your new password.";
	     }
	    else if(trim($renew_password) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Enter again your new password.";
	     }
	    else if(trim($new_password) != trim($renew_password))
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Password not matched.";
	     }
	    else if(trim($old_password) == trim($renew_password))
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Old Password and new password should not be same.";
	     }
	    else
	     {
	      $this->load->model("users_m");
	      $r = $this->users_m->get_user_details_by_id($user_id);
	      if($r != FALSE)
	       {
	        if($r[0]->user_password == $old_password)
	         {
	          $update_arr = array("user_password" => $renew_password , "eby" => $_SESSION["userdata"]["user_id"] , "eat" => date("Y-m-d H:i:s"));
	          $r = $this->users_m->update_user_details($user_id , $update_arr);
	          if($r > 0)
	           {
	            unset($_SESSION["userdata"]);
	            $data["response"] = TRUE;
	            $data["message"] = "Password changed successfully.";
	           }
	          else
	           {
	            $data["response"] = FALSE;
	            $data["message"] = "Some error occured. Please try again later.";
	           }
	         }
	        else
	         {
	          $data["response"] = FALSE;
	          $data["message"] = "Invalid Old Password.";
	         }
	       }
	      else
	       {
	        $data["response"] = FALSE;
	        $data["message"] = "User Not Found.";
	       }
	     }
	   }
	  echo json_encode($data);
	 }
	
	
	public function edit_profile($page = "edit_profile")
	 {
	  if(!file_exists(APPPATH.'views/app/pages/'.$page.'.php'))
           {
	    show_404();
	   }
	  
	  $data = array();
	  
	  $data["title"] = "Edit Profile";
	  
	  $this->load->view('app/templates/header' , $data);
	  $this->load->view('app/templates/side_panel' , $data);
	  $this->load->view('app/pages/'.$page , $data);
	  $this->load->view('app/templates/footer' , $data);
	 }
	
	
	public function validate_edit_profile()
	 {
	  $data = array();
	  if($this->input->is_ajax_request())
	   {
	    $user_id = (isset($_POST["user_id"]))?$this->input->post("user_id" , TRUE):0;
	    $user_name = (isset($_POST["user_name"]))?$this->input->post("user_name" , TRUE):"";
	    $user_email = (isset($_POST["user_email"]))?$this->input->post("user_email" , TRUE):"";
	    $user_mobile = (isset($_POST["user_mobile"]))?$this->input->post("user_mobile" , TRUE):"";
	    $user_address = (isset($_POST["user_address"]))?$this->input->post("user_address" , TRUE):"";
	    if($user_id == 0 || trim($user_id) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Invalid User-ID.";
	     }
	    else if(trim($user_name) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Enter your full name.";
	     }
	    else if(trim($user_email) == "" || filter_var($user_email , FILTER_VALIDATE_EMAIL) == FALSE)
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Enter your valid email-id.";
	     }
	    else if(trim($user_mobile) == "" || strlen($user_mobile) != 10)
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Enter your valid 10 digit mobile no.";
	     }
	    else if(trim($user_address) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Enter your complete address.";
	     }
	    else
	     {
	      $this->load->model("users_m");
	      $r = $this->users_m->check_user_email_exists($user_id , $user_email);
	      if($r == FALSE)
	       {
	        $update_arr = array("user_name" => $user_name , "user_email" => $user_email , "user_mobile" => $user_mobile , "user_address" => $user_address , "eby" => $_SESSION["userdata"]["user_id"] , "eat" => date("Y-m-d H:i:s"));
	        $r = $this->users_m->update_user_details($user_id , $update_arr);
	        if($r > 0)
	         {
	          $_SESSION["userdata"]["user_name"] = $user_name;
	          $_SESSION["userdata"]["user_email"] = $user_email;
	          $_SESSION["userdata"]["user_mobile"] = $user_mobile;
	          $_SESSION["userdata"]["user_address"] = $user_address;
	          
	          $data["response"] = TRUE;
	          $data["message"] = "Profile updated successfully.";
	         }
	        else
	         {
	          $data["response"] = FALSE;
	          $data["message"] = "Some error occured. Please try again later.";
	         }
	       }
	      else
	       {
	        $data["response"] = FALSE;
	        $data["message"] = "This email-id is already exists. Try with other email-id.";
	       }
	     }
	   }
	  echo json_encode($data);
	 }
	
	
	public function roles($page = "roles")
	 {
	  if(!file_exists(APPPATH.'views/app/pages/'.$page.'.php'))
           {
	    show_404();
	   }
	  
	  $data = array();
	  
	  $data["title"] = "Roles";
	  
	  $this->load->view('app/templates/header' , $data);
	  $this->load->view('app/templates/side_panel' , $data);
	  $this->load->view('app/pages/'.$page , $data);
	  $this->load->view('app/templates/footer' , $data);
	 }
	
	
	public function add_user_role()
	 {
	  $data = array();
	  if($this->input->is_ajax_request())
	   {
	    $role_name = (isset($_POST["role_name"]))?$this->input->post("role_name" , TRUE):"";
	    if(trim($role_name) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Enter user role name.";
	     }
	    else
	     {
	      $this->load->model("users_m");
	      $r = $this->users_m->check_user_role_exists($role_name);
	      if($r == FALSE)
	       {
	        $insert_arr = array("role_name" => $role_name , "eby" => $_SESSION["userdata"]["user_id"] , "eat" => date("Y-m-d H:i:s"));
	        $r = $this->users_m->add_user_role($insert_arr);
	        if($r > 0)
	         {
	          $data["response"] = TRUE;
	          $data["message"] = "User role added successfully.";
	         }
	        else
	         {
	          $data["response"] = FALSE;
	          $data["message"] = "Some error occured. Please try again later.";
	         }
	       }
	      else
	       {
	        $data["response"] = FALSE;
	        $data["message"] = "This role already exists.";
	       }
	     }
	   }
	  echo json_encode($data);
	 }
	
	
	public function get_all_user_roles()
	 {
	  $data = array();
	  if($this->input->is_ajax_request())
	   {
	    $this->load->model("users_m");
	    $r = $this->users_m->get_all_user_roles();
	    if($r != FALSE)
	     {
	      $data["response"] = TRUE;
	      $data["message"] = count($r)." Record Found.";
	      $data["total_record"] = count($r);
	      $data["all_record"] = $r;
	     }
	    else
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "No Record Found.";
	     }
	   }
	  echo json_encode($data);
	 }
	
	
	public function delete_user_role()
	 {
	  $data = array();
	  if($this->input->is_ajax_request())
	   {
	    $role_id = (isset($_POST["role_id"]))?$this->input->post("role_id" , TRUE):0;
	    if($role_id == 0 || trim($role_id) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Invalid Role ID.";
	     }
	    else
	     {
	      $this->load->model("users_m");
	      
	      $update_arr = array("status" => 0 , "eby" => $_SESSION["userdata"]["user_id"] , "eat" => date("Y-m-d H:i:s"));
	      $r = $this->users_m->update_user_role($role_id , $update_arr);
	      if($r > 0)
	       {
	        $data["response"] = TRUE;
	        $data["message"] = "User role deleted successfully.";
	       }
	      else
	       {
	        $data["response"] = FALSE;
	        $data["message"] = "Some error occured. Please try again later.";
	       }
	     }
	   }
	  echo json_encode($data);
	 }
	
	
	
}
