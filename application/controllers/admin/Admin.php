<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
		
	}
	public function index()
	{
		$message_success = $this->session->flashdata('message_success');
		$this->data['message_success'] = $message_success;

		$message_fail = $this->session->flashdata('message_fail');
		$this->data['message_fail'] = $message_fail;

		$admin = $this->admin_model->get_list();
		$this->data['admin']= $admin;

		$this->data['temp']='admin/admin/index.php';
		$this->load->view('admin/main',$this->data);
	}
	public function add()
	{
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert" style="padding:5px;border-bottom:0px;">', '</div>');

		if ($this->input->post()) {
			$this->form_validation->set_rules('name','Họ tên','required');
			$this->form_validation->set_rules('email','Tên đăng nhập','valid_email|required');
			$this->form_validation->set_rules('password','Mật khẩu','required');
			$this->form_validation->set_rules('re_password','Mật khẩu nhập lại','matches[password]');
			$this->form_validation->set_rules('level','Phân quyền','required');
			if ($this->form_validation->run()) {
				$password = $this->input->post('password');
				$data = array();
				$data = array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'password' => md5($password),
					'level' => $this->input->post('level'),
					'created' => now()
					);
				if ($this->admin_model->create($data)) {
					$this->session->set_flashdata('message_success', 'Thêm thành viên thành công');
				}else{
					$this->session->set_flashdata('message_fail', 'Thêm thành viên thất bại');
				}
				redirect(admin_url('admin'));
			}
		}

		$this->data['temp']='admin/admin/add';
		$this->load->view('admin/main',$this->data);
	}
	public function edit()
	{
		$id = $this->uri->segment(4);
		$admin = $this->admin_model->get_info($id);

		if (empty($admin)) {
			$this->session->set_flashdata('message_fail', 'Thành viên không tồn tại');
			redirect(admin_url('admin'));
		}
		//$this->data['admin'] = $admin;
		if ($this->input->post()) {
			$this->form_validation->set_rules('name','Họ tên','required');
			$this->form_validation->set_rules('email','Tên đăng nhập','valid_email|required');
			$this->form_validation->set_rules('level','Phân quyền','required');
			$password = $this->input->post('password');
			if ($password!='') {
				$this->form_validation->set_rules('password','Mật khẩu','required');
				$this->form_validation->set_rules('re_password','Mật khẩu nhập lại','matches[password]');
			}			
			if ($this->form_validation->run()) {				
				$data = array();
				$data = array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'level' => $this->input->post('level')
					);
				if ($password!='') {
					$data['password'] = md5($password);
				}
				if ($this->admin_model->update($id,$data)) {
					$this->session->set_flashdata('message_success', 'Thay đổi danh mục thành công');
				}else{
					$this->session->set_flashdata('message_fail', 'Thay đổi danh mục thất bại');
				}
				redirect(admin_url('admin'));
			}
		}

		$this->data['admin']= $admin;
		
		$this->data['temp']='admin/admin/edit';
		$this->load->view('admin/main',$this->data);
	}
	public function del()
	{
		$id = $this->uri->segment(4);
		$where = array();
		$where = array('id' => $id);
		if (!$this->admin_model->check_exists($where)) {
			$this->session->set_flashdata('message_fail', 'Admin không tồn tại');
			redirect(admin_url('admin'));
		}
		if ($this->admin_model->delete($id)) {
			$this->session->set_flashdata('message_success', 'Xóa admin thành công');
		}else{
			$this->session->set_flashdata('message_fail', 'Xóa admin thất bại');
		}
		redirect(admin_url('admin'));
	}
	public function logout()
	{
		if ($this->session->userdata('login')) {
			$this->session->unset_userdata('login');
		}
		redirect(admin_url('login'));
	}
}
