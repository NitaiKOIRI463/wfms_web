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
			$api = 'Company_reg/CompanyList';
			$data = '';
			$method = 'post';
			$result = $this->CallAPI($api,$data,$method);			
			$d['com_list'] = $result['data'];
			// echo "<pre>";
			// print_r($d['com_list']);die;
			$d['v'] = 'companyList';
			$this->load->view('templates',$d);
		}
	}
?>