<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Company extends MY_Controller
	{
		public function __construct()
		{
			parent:: __construct();
		}

		public function index()
		{
			$d['v'] = 'companyList';
			$this->load->view('templates',$d);
		}
	}
?>