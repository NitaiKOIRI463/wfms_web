<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CompanyProfile extends MY_Controller
	{
		public function __construct()
		{
			parent:: __construct();
		}

		public function index()
		{
			$d['v'] = 'companyProfile';
			$this->load->view('templates',$d);
		}
	}
?>