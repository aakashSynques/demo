<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();

		$_SESSION['page_start_time'] = microtime(true);
	}




	public function index($page = "index")
	{
		if (!file_exists(APPPATH . 'views/web/pages/' . $page . '.php')) {
			show_404();
		}
		$data = array();
		if ($page == "index") {
			$data["title"] = "Home";
		} else if ($page == "about") {
			$data["title"] = "About";
		} else if ($page == "products") {
			$data["title"] = "Products";
		} else if ($page == "major-customers") {
			$data["title"] = "Major-Customers";
		} else if ($page == "infrastructure") {
			$data["title"] = "Infrastructure";
		} else if ($page == "quality") {
			$data["title"] = "Quality";
		} else if ($page == "career") {
			$data["title"] = "Career";
		} else if ($page == "contact") {
			$data["title"] = "Contact";
		} else if ($page == "disclaimer") {
			$data["title"] = "Disclaimer";
		} else if ($page == "privacy") {
			$data["title"] = "Privacy";
		} else {
			$data["title"] = "";
		}

		$this->load->view('web/templates/header', $data);
		$this->load->view('web/pages/' . $page, $data);
		$this->load->view('web/templates/footer', $data);
	}

	// public function career_form_submit()
	// {
	// 	$data = array();
	// 	if ($this->input->is_ajax_request()) {
	// 		$fname = (isset($_POST["fname"])) ? $this->input->post("fname", TRUE) : "";
	// 		//if(trim($fname) == "" || filter_var($user_email , FILTER_VALIDATE_EMAIL) == FALSE)
	// 		if (trim($fname) == "") {
	// 			$data["response"] = FALSE;
	// 			$data["message"] = "Enter your valid F name.";
	// 		} else {
	// 			$insert_arr = array(  "fname"=> $fname ,"eby" => $_SESSION["userdata"]["user_id"] , "eat" => date("Y-m-d H:i:s"));
				
	// 			$this->load->model("users_m");
	// 			$r = $this->users_m->add_career($insert_arr);

	// 			if ($r > 0) {
    //               $data["response"] = TRUE;
	// 			  $data["message"] = "add.";
	// 			} else {
	// 				$data["response"] = FALSE;
	// 				$data["message"] = "Error.";
	// 			}
	// 		}
	// 	}
	// 	echo json_encode($data);
	// }








	 public function about()
	 {
	   $data = array();
	   $this->load->view('web/templates/header', $data);
	   $this->load->view('web/pages/about', $data);
	   $this->load->view('web/templates/footer', $data);
	 }


}

?>
