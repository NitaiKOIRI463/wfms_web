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
			$from_date = $this->input->post('from_date')!=""?$this->input->post('from_date'):"03-06-2022";
			$to_date = $this->input->post('to_date')!=""?$this->input->post('to_date'):date('Y-m-d');
			$device_id = $this->uri->segment(3)!=""?$this->uri->segment(3):"";
			$api = 'DeviceProfile/get_device_profile';
			$data='device_id='.$device_id.'&from_date='.$from_date.'&to_date='.$to_date;
			$method = 'POST';
			$result = $this->CallAPI($api, $data, $method);
			$d['device_details'] = $result['data']['device_details'];
			$d['device_status'] = $result['data']['device_status'];
			$d['flow_details'] = $result['data']['flow_details'];
			$d['flow_rate_details'] = $result['data']['flow_rate_details'];

			// echo '<pre>';
			// print_r($d);die;
			$d['v'] = 'deviceProfile';
			$this->load->view('templates',$d);
		}
	}
?>