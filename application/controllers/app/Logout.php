<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {


        public function __construct()
	 {
	  parent::__construct();
          
	  session_destroy();
         }


	public function index()
	 {
   	  redirect('app/login');
	 }


	public function session_out()
	 {	
   	  redirect('app/login?session_out');
	 }


}
