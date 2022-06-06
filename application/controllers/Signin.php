<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Signin extends MY_Controller
	{
		public function __construct()
		{
			parent:: __construct();
		}

		public function index()
		{
			$this->load->view('login');
		}

		public function doLogin()
		{
			$api = 'Login/login';
			$data = 'email='.$_POST['email_id'].'&password='.$_POST['password'];
			$method = 'POST';
			$result = $this->CallAPI($api, $data, $method);
			
			if ($result['response_code'] == 200)
			{
				if($result['data']['userData']['role_type'] == '1')
				{
					$logged_in_session = array(
							'user_id' => $result['data']['userData']['user_id'],
							'company_code' => $result['data']['userData']['company_code'],
							'company_name' => $result['data']['userData']['company_name'],
							'logo' => $result['data']['userData']['logo'],
							'website' => $result['data']['userData']['website'],
							'role_type' => $result['data']['userData']['role_type'],
							'logged_in' => TRUE
						);

					$this->session->set_userdata($logged_in_session);
	                redirect('Dashboard','refresh');
				}
				else if($result['data']['userData']['role_type'] == '2')
				{
					$logged_in_session = array(
							'user_id' => $result['data']['userData']['user_id'],
							'company_code' => $result['data']['userData']['company_code'],
							'company_name' => $result['data']['userData']['company_name'],
							'logo' => $result['data']['userData']['logo'],
							'website' => $result['data']['userData']['website'],
							'role_type' => $result['data']['userData']['role_type'],
							'logged_in' => TRUE
						);

					$this->session->set_userdata($logged_in_sess);
	                redirect('CompanyDashboard','refresh');
				}

			}else{
				$this->session->set_flashdata('error', $result['msg']);
                redirect('Signin');
			}
		}

		public function logout()
		{
			$this->session->sess_destroy(); 
        	redirect('Signin', 'refresh');
		}
	}
?>