<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('transaction_model');
	}
	public function index()
	{
		$input = array();
		$input['where'] = array('status'=>'0');
		$total_order = $this->transaction_model->get_total($input);
		$this->data['total_order']=$total_order;

		$this->data['temp']='admin/home/index';
		$this->load->view('admin/main',$this->data);
	}
}
