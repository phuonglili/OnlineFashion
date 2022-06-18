<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{
		$this->load->model('slider_model');
		$input = array();
		$input['order'] = array('sort_order', 'DESC');
		$slider = $this->slider_model->get_list($input);
		$this->data['slider']=$slider;

		
		
		$this->load->model('product_model');
		$input = array();
		$input['order'] = array('id', 'DESC');
		$input['limit'] = array('4','0');
		$new_product = $this->product_model->get_list($input);
		$this->data['new_product']=$new_product;

		$input['order'] = array('buyed', 'DESC');
		$input['limit'] = array('4','0');
		$hot_product = $this->product_model->get_list($input);
		$this->data['hot_product']=$hot_product;

		$input['order'] = array('view', 'DESC');
		$input['limit'] = array('4','0');
		$view_product = $this->product_model->get_list($input);
		$this->data['view_product']=$view_product;


		$this->data['temp']='site/home/index.php';
		$this->load->view('site/layout',$this->data);
	}
}
