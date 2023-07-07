<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
        
	
	public function __construct()
	 {
	  parent::__construct();
	  
	  if(!isset($_SESSION['userdata']) || $_SESSION['userdata']['user_logged_status'] != TRUE)
	   {
	    redirect('app/logout');
	   }
	  
	  $_SESSION['page_start_time'] = microtime(true); 
	 }
	
	
	public function index($page = "home")
	 {
	  if(!file_exists(APPPATH.'views/app/pages/'.$page.'.php'))
           {
	    show_404();
	   }
	  
	  $data = array();
	  
	  $data["title"] = "Home";
	  
	  $this->load->view('app/templates/header' , $data);
	  $this->load->view('app/templates/side_panel' , $data);
	  $this->load->view('app/pages/'.$page , $data);
	  $this->load->view('app/templates/footer' , $data);
	 }
	
	
}
