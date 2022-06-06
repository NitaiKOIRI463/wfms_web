<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class ChangePassword extends MY_Controller
	{
		public function __construct()
		{
			parent:: __construct();
		}

		public function index()
		{
			$d['v'] = 'changePassword';
			$this->load->view('templates',$d);
		}
	}
?>