<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('catalog_model');
	}

	public function index()
	{
		$this->data['temp']='site/product/index';
		$this->load->view('site/layoutsub',$this->data);
	}
	public function view()
	{
		$id = $this->uri->rsegment(3);
		$product = $this->product_model->get_info($id);
		if (empty($product)) {
			$this->session->set_flashdata('message_fail', 'Sản phẩm không tồn tại');
			redirect(base_url());
		}
		$this->data['product']=$product;
		$catalog_product = $this->catalog_model->get_info($product->catalog_id);
		$this->data['catalog_product']=$catalog_product;

		$view = $this->session->userdata('session_view');
		$view = (!is_array($view)) ? array() : $view;
		if (!isset($view[$id])) {
			$view[$id]=TRUE;
			$this->session->set_userdata('session_view',$view);
			$data = array();
			$data['view'] = $product->view + 1;
			$this->product_model->update($id,$data);
		}
		

		$image_list = json_decode($product->image_list);
		$this->data['image_list'] = $image_list;
		
		$input = array();
		$input['where'] = array('catalog_id' => $product->catalog_id);
		$input['limit'] = array('4','0');
		$productsub = $this->product_model->get_list($input);
		$this->data['productsub']=$productsub;
		
		$input = array();
		$input['order'] = array('buyed', 'DESC');
		$input['limit'] = array('4','0');
		$productview = $this->product_model->get_list($input);
		$this->data['productview']=$productview;
		
		$this->data['temp']='site/product/view';
		$this->load->view('site/layoutsub',$this->data);
	}
	public function catalog()
	{
		$id = $this->uri->rsegment(3);
		$catalog = $this->catalog_model->get_info($id);
		$this->data['catalog_p'] = $catalog;
		if(empty($catalog))
		{
			redirect(base_url());
		}
		$input = array();
		if ($catalog->parent_id == '1') {
			$input_cat = array();
			$input_cat['where'] = array('parent_id' => $catalog->id);
			$input_cat['order'] = array('sort_order', 'ASC');
			$catalog_child = $this->catalog_model->get_list($input_cat);
			if (!empty($catalog_child)) {
				$cat_list_id = array();
				foreach ($catalog_child as $value) {
					$cat_list_id[] = $value->id;
				}
				$this->db->where_in('catalog_id',$cat_list_id);
			}else{
				$input['where'] = array('catalog_id'=>$id);
			}
		}else{
			$input['where'] = array('catalog_id'=>$id);
		}
		$total = $this->product_model->get_total($input);
		$this->data['total']=$total;

		$this->load->library('pagination');
		$config = array();
		$base_url = base_url('product/catalog/'.$id);
		$per = 8;
		$uri = 4;
		$config = pagination($base_url,$total,$per,$uri);		
		$this->pagination->initialize($config);

		$segment = $this->uri->segment(4);
		$segment = intval($segment);

		$input['limit'] = array($config['per_page'],$segment);
		if(isset($cat_list_id))
		{   
		    $this->db->where_in('catalog_id', $cat_list_id);
		}

		$product_list = $this->product_model->get_list($input);
		$this->data['product_list'] = $product_list;

		$this->data['temp']='site/product/catalog';
		$this->load->view('site/layoutsub',$this->data);

	}
	public function hot()
	{
		$input = array();
		$input['order'] = array('buyed','DESC');

		$this->load->library('pagination');
		$config = array();
		$base_url = base_url('product/hot');
		$total =20;
		$per = 8;
		$uri = 3;
		$config = pagination($base_url,$total,$per,$uri);
		$this->pagination->initialize($config);

		$segment = $this->uri->segment(3);
		$segment = intval($segment);

		$input['limit'] = array($config['per_page'],$segment);

		$product_list = $this->product_model->get_list($input);
		$this->data['product_list'] = $product_list;
		$this->data['temp']='site/product/hot';
		$this->load->view('site/layoutsub',$this->data);

	}
	public function views()
	{
		$input = array();
		$input['order'] = array('view','DESC');

		$this->load->library('pagination');
		$config = array();
		$base_url = base_url('product/views');
		$total =20;
		$per = 8;
		$uri = 3;
		$config = pagination($base_url,$total,$per,$uri);
		$this->pagination->initialize($config);

		$segment = $this->uri->segment(3);
		$segment = intval($segment);

		$input['limit'] = array($config['per_page'],$segment);

		$product_list = $this->product_model->get_list($input);
		$this->data['product_list'] = $product_list;
		$this->data['temp']='site/product/views';
		$this->load->view('site/layoutsub',$this->data);

	}
	public function news()
	{
		$input = array();
		$input['order'] = array('id','DESC');

		$this->load->library('pagination');
		$config = array();
		$base_url = base_url('product/news');
		$total =20;
		$per = 8;
		$uri = 3;
		$config = pagination($base_url,$total,$per,$uri);
		$this->pagination->initialize($config);

		$segment = $this->uri->segment(3);
		$segment = intval($segment);

		$input['limit'] = array($config['per_page'],$segment);

		$product_list = $this->product_model->get_list($input);
		$this->data['product_list'] = $product_list;
		$this->data['temp']='site/product/new';
		$this->load->view('site/layoutsub',$this->data);

	}
	public function discount()
	{
		$input = array();
		$input['order'] = array('discount','DESC');

		$this->load->library('pagination');
		$config = array();
		$base_url = base_url('product/discount');
		$total =20;
		$per = 8;
		$uri = 3;
		$config = pagination($base_url,$total,$per,$uri);
		$this->pagination->initialize($config);

		$segment = $this->uri->segment(3);
		$segment = intval($segment);

		$input['limit'] = array($config['per_page'],$segment);

		$product_list = $this->product_model->get_list($input);
		$this->data['product_list'] = $product_list;
		$this->data['temp']='site/product/discount';
		$this->load->view('site/layoutsub',$this->data);

	}
	public function search()
	{
		
		$catalog_id = $this->input->post('catalog_id');
		$price_from = $this->input->post('price_from');
		$price_to = $this->input->post('price_to');

		$this->data['price_from'] = $price_from;
		$this->data['price_to'] = $price_to;
		$this->data['catalog_id'] = $catalog_id;
		$input = array();
		

		$list = $this->catalog_model->get_info($catalog_id);
		if ($list->parent_id == '1') {
			$inputt=array();
			$inputt['where'] = array('parent_id' => $list->id);
			$list_child = $this->catalog_model->get_list($inputt);
			$list_id = array();
			foreach ($list_child as $value) {
				$list_id[] = $value->id;
			}
			$this->db->where_in('catalog_id', $list_id);
			$input['where'] = array(
			'price <=' => $price_to,
			'price >=' => $price_from);
		}else{
			$input['where'] = array(
			'price <=' => $price_to,
			'price >=' => $price_from,
			'catalog_id' => $catalog_id);
		}
		$input['order'] = array('price','ASC');
		$product_list = $this->product_model->get_list($input);
		$total =  count($product_list);
		$this->data['total'] = $total;
		$this->data['product_list'] = $product_list;
		$this->data['temp']='site/product/search';
		$this->load->view('site/layoutsub',$this->data);
	}
	public function raty()
	{

		
		$id = $this->input->post('id');
		$product = $this->product_model->get_info($id);
		if (!$product) {
			exit();
		}
		$result = array();
		$raty = $this->session->userdata('session_raty');
		$raty = (!is_array($raty)) ? array() : $raty;
		if (isset($raty[$id])) {
			$result['msg'] = 'Bạn đã bình chọn cho sản phẩm này rồi';
			$output = json_encode($result);
			echo $output;
			exit();
		}
		$raty[$id] = TRUE;
		$this->session->set_userdata('session_raty',$raty);
		$score = $this->input->post('score');
		$data=array();
		$data['rate_count'] = $product->rate_count + 1;
		$data['rate_total'] = $product->rate_total + $score;
		$this->product_model->update($id,$data);
		$result['complete'] = TRUE;
		$result['msg'] = 'Cảm ơn bạn đã đánh giá';
		$output = json_encode($result);
		echo $output;
		exit();
	}

}
