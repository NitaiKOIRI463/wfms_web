<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CompanyProfile extends MY_Controller
	{
		public function __construct()
		{
			parent:: __construct();
		}

		public function profile()
		{
			
			$company_code  = $this->uri->segment(3)!=''?$this->uri->segment(3):$this->session->userdata('company_code');
			$api = 'CompanyProfile/get_ProfileList';
			$data='company_code='.$company_code;
			$method = 'POST';
			$result = $this->CallAPI($api, $data, $method);
			$d['profileData'] = $result['data'];
			$d['device_list'] = $result['device'];
			// echo '<pre>';
			// print_r($result['data']);die;
			$d['v'] = 'companyProfile';
			$this->load->view('templates',$d);
		}



	}
?>