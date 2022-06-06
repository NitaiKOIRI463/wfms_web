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
			$api = 'AdminDashboard/get_admin_dashboard_data';
			$data = '';
			$method = 'POST';
			$result = $this->CallAPI($api, $data, $method);
			$d['admin_dashboard'] = $result['data'];
			$d['online_device'] = $result['data']['online_device'];
			$d['v'] = 'dashboard';
			$this->load->view('templates',$d);
		}
	}
?>