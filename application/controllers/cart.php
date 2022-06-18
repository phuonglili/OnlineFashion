<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller {
	public function __construct()
	{
		parent::__construct();

        $this->load->library('cart');
        $this->load->model('product_model');
		
	}

	public function index()
	{
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$carts = $this->cart->contents();
		$this->data['carts'] = $carts;

		$total_items = $this->cart->total_items();
		$this->data['total_items'] = $total_items;
		
		$this->data['temp']='site/cart/index';
		$this->load->view('site/layoutsub',$this->data);
	}
	public function add()
	{
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$product = $this->product_model->get_info($id);
		$data = array();
		$qty = 1;
		$price = $product->price;
		if ($product->discount > 0) {
			$price = $product->price - $product->discount;
		}
		$data['id'] = $id;
		$data['qty'] = $qty;
		$data['price'] = $price;
		$data['name'] = $product->name;
		$data['image_link'] = $product->image_link;
		$this->cart->insert($data);
		redirect(base_url('cart'));
	}
	public function update()
	{
		$carts = $this->cart->contents();
		$id = $this->uri->segment(3);
		$str = $this->uri->segment(4);
		foreach ($carts as $key => $value) {
			if ($value['id'] == $id ) {
				if ($str == 'sum') {
					$data=array();
					$data['rowid'] = $key;
					$data['qty'] = $value['qty'] + 1;
					$this->cart->update($data);
				} elseif($str == 'sub') {
					$data=array();
					$data['rowid'] = $key;
					$data['qty'] = $value['qty'] - 1;
					$this->cart->update($data);
				}
				
			}
		}
		redirect(base_url('cart'));
	}
	public function del()
	{
		$carts = $this->cart->contents();
		$id = $this->uri->segment(3);
		$id = intval($id);
		if ($id > 0) {
			foreach ($carts as $key => $value) {
				if ($value['id'] = $id) {
					$data=array();
					$data['rowid'] = $key;
					$data['qty'] = 0;
					$this->cart->update($data);
					$this->session->set_flashdata('message', 'Xóa sản phẩm thành công');
					redirect(base_url('cart'));
				}
			}
		} else {
			$this->cart->destroy();
			$this->session->set_flashdata('message', 'Xóa giỏ hàng thành công');
			redirect(base_url('cart'));
		}
		
	}
}
