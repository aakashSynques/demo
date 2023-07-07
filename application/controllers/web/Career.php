<?php
class Career extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('career_models');
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

	public function career_form_submit()
	{
		$data = array();
		if ($this->input->is_ajax_request()) {
			$fname = (isset($_POST["fname"])) ? $this->input->post("fname", TRUE) : "";
			$lname = (isset($_POST["lname"])) ? $this->input->post("lname", TRUE) : "";
			$contact_no = (isset($_POST["contact_no"])) ? $this->input->post("contact_no", TRUE) : "";
			$email_id = (isset($_POST["email_id"])) ? $this->input->post("email_id", TRUE) : "";
			$birth_date = (isset($_POST["birth_date"])) ? $this->input->post("birth_date", TRUE) : "";
			$experience = (isset($_POST["experience"])) ? $this->input->post("experience", TRUE) : "";
			$app_area = (isset($_POST["app_area"])) ? $this->input->post("app_area", TRUE) : "";

			if (trim($fname) == "") {
				$data["response"] = FALSE;
				$data["message"] = "Enter your first name.";
			} else if (trim($lname) == "") {
				$data["response"] = FALSE;
				$data["message"] = "Enter your last name.";
			} else if (trim($contact_no) == "") {
				$data["response"] = FALSE;
				$data["message"] = "Enter your valid 10 digit mobile no.";
			} else if (trim($email_id) == "" || filter_var($email_id, FILTER_VALIDATE_EMAIL) == FALSE) {
				$data["response"] = FALSE;
				$data["message"] = "Enter your valid email-id.";
			} else if (trim($birth_date) == "") {
				$data["response"] = FALSE;
				$data["message"] = "Enter your birth date";
			} else if (trim($experience) == "") {
				$data["response"] = FALSE;
				$data["message"] = "Enter your Experience.";
			} else if (trim($app_area) == "") {
				$data["response"] = FALSE;
				$data["message"] = "Enter your area.";
			} else {
				$this->load->model("career_models");
					$insert_arr = array("fname" => $fname, "lname" => $lname, "contact_no" => $contact_no, "email_id" => $email_id, "birth_date" => $birth_date, "experience" => $experience, "app_area" => $app_area, "eat" => date("Y-m-d H:i:s"));
					$r = $this->career_models->career_form_submit($insert_arr);
					// $r = $this->users_m->add_user($insert_arr);
					if ($r > 0) {
						$data["response"] = TRUE;
						$data["message"] = "User added successfully.";
					} else {
						$data["response"] = FALSE;
						$data["message"] = "Some error occured. Please try again later.";
					}
			}
		}
		echo json_encode($data);
	}



	public function contact_form_submit()
	{
		$data = array();
		if ($this->input->is_ajax_request()) {
			$name = (isset($_POST["name"])) ? $this->input->post("name", TRUE) : "";
			$contact = (isset($_POST["contact"])) ? $this->input->post("contact", TRUE) : "";
			$email = (isset($_POST["email"])) ? $this->input->post("email", TRUE) : "";
			$company = (isset($_POST["company"])) ? $this->input->post("company", TRUE) : "";
			$message_text = (isset($_POST["message_text"])) ? $this->input->post("message_text", TRUE) : "";

			if (trim($name) == "") {
				$data["response"] = FALSE;
				$data["message"] = "Enter your  name.";
			} else if (trim($contact) == "") {
				$data["response"] = FALSE;
				$data["message"] = "Enter your valid 10 digit mobile no.";
			} else if (trim($email) == "" || filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE) {
				$data["response"] = FALSE;
				$data["message"] = "Enter your valid email-id.";
			} else if (trim($company) == "") {
				$data["response"] = FALSE;
				$data["message"] = "Enter your Experience.";
			} else if (trim($message_text) == "") {
				$data["response"] = FALSE;
				$data["message"] = "Enter your area.";
			} else {
				$this->load->model("career_models");
					$insert_arr = array("name" => $name, "contact" => $contact, "email" => $email, "company" => $company, "message_text" => $message_text);
					$r = $this->career_models->contact_form_submit($insert_arr);
					// $r = $this->users_m->add_user($insert_arr);
					if ($r > 0) {
						$data["response"] = TRUE;
						$data["message"] = "User added successfully.";
					} else {
						$data["response"] = FALSE;
						$data["message"] = "Some error occured. Please try again later.";
					}
			}
		}
		echo json_encode($data);
	}






}
