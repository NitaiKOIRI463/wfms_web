<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends MY_Controller
	{
		public function __construct()
		{
			parent:: __construct();
		}

		public function index()
		{
			$d['v'] = 'dashboard';
			$this->load->view('templates',$d);
		}
	}
?>