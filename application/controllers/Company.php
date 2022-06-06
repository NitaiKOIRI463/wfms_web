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
			$method = 'POST';
			$result = $this->CallAPI($api,$data,$method);			
			$d['com_list'] = $result['data'];
			
			$d['v'] = 'companyList';
			$this->load->view('templates',$d);
		}

		public function addCompanydata()
		{
			if($_FILES['company_logo']['size'] != '')
			{
				$logo = base64_encode(file_get_contents($_FILES['company_logo']['tmp_name']));	
			}else{
				$logo = null;
			}
			
			$api = 'Company_reg/addCompany';
			$data = 'company_name='.$this->input->post('company_name').'&website='.$this->input->post('website_url').'&email_id='.$this->input->post('email').'&contact_person='.$this->input->post('contact_person').'&contact_no='.$this->input->post('contact_number').'&registration_date='.$this->input->post('registration_date').'&expiry_date='.$this->input->post('expiry_date').'&address='.$this->input->post('address').'&city='.$this->input->post('city').'&state='.$this->input->post('state').'&logo='.$logo.'&c_by='.$this->session->userdata('user_id');
			$method = 'POST';

			$result = $this->CallAPI($api,$data,$method);
			// print_r($result); die;
			if ($result['response_code']== 200) 
			{
				$this->session->set_flashdata('success', $result['msg']);
                redirect('Company');
			}else{
				$this->session->set_flashdata('error', $result['msg']);
                redirect('Company');
			}
		}

		public function editCompany()
		{
			$api = 'Company_reg/CompanyList';
			$data = 'company_code='.$this->input->post('company_code');
			$method = 'POST';
			$result = $this->CallAPI($api,$data,$method);
			$d['editcmp_Details'] = $result['data'];
			$this->load->view('ajax/ajaxEdit_company',$d);
		}

		public function update_cmp_Details()
		{
			if($_FILES['company_logo']['size'] != '')
			{
				$logo = base64_encode(file_get_contents($_FILES['company_logo']['tmp_name']));	
			}else{
				$logo = null;
			}
			
			$api = 'Company_reg/updateCompany';
			$data = 'company_name='.$this->input->post('company_name').'&website='.$this->input->post('website_url').'&email_id='.$this->input->post('email').'&contact_person='.$this->input->post('contact_person').'&contact_no='.$this->input->post('contact_number').'&registration_date='.$this->input->post('registration_date').'&expiry_date='.$this->input->post('expiry_date').'&address='.$this->input->post('address').'&city='.$this->input->post('city').'&state='.$this->input->post('state').'&logo='.$logo.'&d_by='.$this->session->userdata('user_id').'&company_code='.$this->input->post('company_code');
			$method = 'POST';
			$result = $this->CallAPI($api,$data,$method);
			if ($result['response_code']== 200) 
			{
				$this->session->set_flashdata('success', $result['msg']);
                redirect('Company');
			}else{
				$this->session->set_flashdata('error', $result['msg']);
                redirect('Company');
			}
		}
	}
?>