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
			$api = 'Device_list/get_deviceList';
			$data = '';
			$method = 'post';
			$result = $this->CallAPI($api,$data,$method);
			$d['device_list'] = $result['data'];
			echo "<pre>";
			print_r($d['device_list']);
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