<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Device extends MY_Controller
	{
		public function __construct()
		{
			parent:: __construct();
			error_reporting(0);
		}

		public function index()
		{
			$api = 'Device_list/get_deviceList';
			$data = '';
			$method = 'POST';
			$result = $this->CallAPI($api,$data,$method);

			$api = 'Company_reg/CompanyList';
			$data = '';
			$method = 'POST';
			$compresult = $this->CallAPI($api,$data,$method);

			$api = 'Device_list/get_deviceMasterList';
			$data = '';
			$method = 'POST';
			$deviceresult = $this->CallAPI($api,$data,$method);

			$api = 'Device_list/get_deviceMasterList';
			$data = '';
			$method = 'POST';
			$deviceresult = $this->CallAPI($api,$data,$method);

			$api = 'Device_list/get_StateList';
			$data = '';
			$method = 'POST';
			$stateresult = $this->CallAPI($api,$data,$method);
			

			$d['company_list'] = $compresult['data'];
			$d['state_list'] = $stateresult['data'];
			$d['master_list'] = $deviceresult['data'];
			$d['device_list'] = $result['data'];

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

			$d['v'] = 'deviceProfile';
			$this->load->view('templates',$d);
		}

		public function DeviceProfileFetchData()
		{
			$from_date = $this->input->post('from_date')!=""?$this->input->post('from_date'):"03-06-2022";
			$to_date = $this->input->post('to_date')!=""?$this->input->post('to_date'):date('Y-m-d');
			$device_id = $this->input->post('device_id')!=""?$this->input->post('device_id'):"";
			$api = 'DeviceProfile/get_device_profile';
			$data='device_id='.$device_id.'&from_date='.$from_date.'&to_date='.$to_date;
			$method = 'POST';
			$result = $this->CallAPI($api, $data, $method);
			echo json_encode($result,true);
		}

		public function AssignDeviceSubmit()
		{
			$api = 'AssignDevice/assign_device';
			echo $data='company_code='.$this->input->post('company_code',true).'&device_id='.$this->input->post('device_id',true).'&address='.$this->input->post('address',true).'&state='.$this->input->post('state',true).'&city='.$this->input->post('city',true).'&latitude='.$this->input->post('latitude',true).'&longitude='.$this->input->post('longitude',true).'&c_by='.$this->session->userdata('user_id').'&installation_date='.$this->input->post('installation_date',true);
			$method = 'POST';
			$result = $this->CallAPI($api, $data, $method);
			// print_r($result);die;
			if ($result['response_code']== 200) 
			{
				$this->session->set_flashdata('success', $result['msg']);
                redirect('Device');
			}else{
				$this->session->set_flashdata('error', $result['msg']);
                redirect('Device');
			}
		}


	}
?>