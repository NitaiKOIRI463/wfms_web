<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Device extends MY_Controller
	{
		public function __construct()
		{
			parent:: __construct();
		}

		public function index()
		{
			$d['v'] = 'deviceList';
			$this->load->view('templates',$d);
		}

		public function DeviceProfile()
		{
			$d['v'] = 'deviceProfile';
			$this->load->view('templates',$d);
		}
	}
?>