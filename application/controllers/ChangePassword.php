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
		public function updatePassword()
		{
			
			$api = 'Change_password/ChangePassword';
			$data = 'id='.$_SESSION['user_id'].'&old_password='.$this->input->post('old_password',true).'&new_password='.$this->input->post('new_password',true);
			$method = 'POST';
			$result = $this->CallAPI($api, $data, $method);
			print_r($result);die;

			if ($result['response_code']== 200) 
			{
				$this->session->set_flashdata('success', $result['msg']);
                redirect('ChangePassword/ChangePassword');
			}else{
				$this->session->set_flashdata('error', $result['msg']);
                redirect('ChangePassword/ChangePassword');
			}
		}
	}
?>