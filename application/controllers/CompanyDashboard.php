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
			$api = 'CompanyDashboard/dashboard';
			$data = 'company_code='.$this->session->userdata('company_code');
			$method = 'POST';
			$result = $this->CallAPI($api, $data, $method);
			$d['dashboard'] = $result['data'];
			$d['device_list'] = $result['Data'];
			$d['v'] = 'companyDashboard';
			$this->load->view('templates',$d);
		}
	}
?>