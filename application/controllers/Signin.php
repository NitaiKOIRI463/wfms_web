<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Signin extends MY_Controller
	{
		public function __construct()
		{
			parent:: __construct();
		}

		public function index()
		{
			$this->load->view('login');
		}

		public function logout()
		{
			$this->session->sess_destroy(); 
        	redirect('Signin', 'refresh');
		}
	}
?>