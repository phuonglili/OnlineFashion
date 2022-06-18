<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct()
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

		if ($this->input->post()) {
			$this->form_validation->set_rules('email', 'Email đăng nhập', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Mật khẩu', 'required');
			$this->form_validation->set_rules('login', 'login', 'callback_check_login');
			if ($this->form_validation->run())
			{
				$user = $this->get_info_login();
				$this->session->set_userdata('login',$user);
				$this->session->set_flashdata('message_success',"Đăng nhập thành công");
				redirect(admin_url('home'));
			}
		}
		$this->load->view('admin/login/index.php');
	}
	public function check_login()
	{
		$user = $this->get_info_login();
		if ($user) {
			return true;
		}
		$this->form_validation->set_message(__FUNCTION__,'Đăng nhập thất bại');
		return false;
	}
	function get_info_login()
	{
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		$where = array();
		$where = array('email' => $email,'password' => md5($password));
		$user = $this->admin_model->get_info_rule($where);
		return $user;
	}
}
