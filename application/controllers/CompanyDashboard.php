<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CompanyDashboard extends MY_Controller
	{
		public function __construct()
		{
			parent:: __construct();
		}

		public function index()
		{
			$d['v'] = 'companyDashboard';
			$this->load->view('templates',$d);
		}
	}
?>