<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('transaction_model');
		$this->load->model('order_model');
		$this->load->model('product_model');

	}
	public function index()
	{
		$message_success = $this->session->flashdata('message_success');
		$this->data['message_success'] = $message_success;

		$message_fail = $this->session->flashdata('message_fail');
		$this->data['message_fail'] = $message_fail;

		$total = $this->transaction_model->get_total();
		$this->data['total']=$total;

		$this->load->library('pagination');
		$config = array();
		$base_url = admin_url('transaction/index');
		$per = 10;
		$uri = 4;
		$config = pagination($base_url,$total,$per,$uri);

		
		$this->pagination->initialize($config);

		$segment = isset($this->uri->segments['4'])?$this->uri->segments['4']:NULL;
		$segment = intval($segment);
		
		$input['limit'] = array($config['per_page'],$segment);

		$input['order'] = array('id' , 'ASC');
		$transaction = $this->transaction_model->get_list($input);
		$this->data['transaction'] = $transaction;



		$this->data['temp']='admin/transaction/index';
		$this->load->view('admin/main',$this->data);
	}
	public function del()
	{
		$id = $this->uri->segment(4);
		$transaction = $this->transaction_model->get_info($id);
		
		if (empty($transaction)) {
			$this->session->set_flashdata('message_fail', 'Đơn đặt hàng không tồn tại');
			redirect(admin_url('transaction'));
		}
		$this->data['transaction'] = $transaction;
		if ($this->transaction_model->delete($id)) {
			$this->session->set_flashdata('message_success', 'Xóa đơn đặt hàng thành công');
		}else{
			$this->session->set_flashdata('message_fail', 'Xóa đơn đặt hàng thất bại');
		}
		redirect(admin_url('transaction'));
	}
	public function detail()
	{
		$id = $this->uri->segment(4);
		$transaction = $this->transaction_model->get_info($id);
		$this->data['transaction'] = $transaction;
		
		$input =array();
		$input['where'] = array('transaction_id' => $transaction->id);
		$info = $this->order_model->get_list($input);
		
		$list_product = array();
		foreach ($info as $key => $value) {
			$this->db->select('product.id as id,product.name as name,image_link, order.qty as qty, order.amount as price, order.id as order_id');
			$this->db->join('order','order.product_id = product.id');
			$where = array();
			$where =array('product.id' => $value->product_id);
			$list_product[] = $this->product_model->get_info_rule($where);
		}
		$this->data['list_product'] = $list_product;
		$this->data['temp']='admin/transaction/detail';
		$this->load->view('admin/main',$this->data);
	}
	public function deldetail()
	{
		$id = $this->uri->segment(4);
		$where = array();
		$where = array('id' => $id);
		if (!$this->order_model->check_exists($where)) {
			$this->session->set_flashdata('message_fail', 'Danh mục không tồn tại');
			redirect(admin_url('transaction'));
		}
		$order = $this->order_model->get_info($id);
		if ($this->order_model->delete($id)) {			
			$transaction = $this->transaction_model->get_info($order->transaction_id);
			$data=array();
			$data['amount'] = $transaction->amount - $order->amount;
			$this->transaction_model->update($transaction->id,$data);
			$this->session->set_flashdata('message_success', 'Xóa thành công');
		}else{
			$this->session->set_flashdata('message_fail', 'Xóa thất bại');
		}
		redirect(admin_url('transaction'));
		
	}
	public function accept()
	{
		$id = $this->uri->segment(4);
		$data= array();
		$data['status'] = '1';
		$this->transaction_model->update($id,$data);
		$this->session->set_flashdata('message_success', 'Xác nhận đơn đặt hàng thành công');

		$input= array();
		$input['where']= array('transaction_id'=>$id);
		$order = $this->order_model->get_list($input);
		
		foreach ($order as $value) {
			$product = $this->product_model->get_info($value->product_id);
			
			$data= array();
			$data['buyed'] = $product->buyed + 1;
			$this->product_model->update($product->id,$data);
		}

		redirect(admin_url('transaction'));
	}
}