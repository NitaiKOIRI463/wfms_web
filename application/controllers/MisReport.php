<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class MisReport extends MY_Controller
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
			$deviceresult = $this->CallAPI($api,$data,$method);
			$d['device_list'] = $deviceresult['data'];
			// print_r($d);die;
			$d['v'] = 'mis_report';
			$this->load->view('templates',$d);
		}

		public function DeviceMisReportData()
		{
			$from_date = $this->input->post('from_date')!=""?$this->input->post('from_date'):"03-06-2022";
			$to_date = $this->input->post('to_date')!=""?$this->input->post('to_date'):date('Y-m-d');
			$imei_no = $this->input->post('imei_no')!=""?$this->input->post('imei_no'):"";
			$api = 'DeviceProfile/get_device_mis';
			$data='imei_no='.$imei_no.'&from_date='.$from_date.'&to_date='.$to_date;
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