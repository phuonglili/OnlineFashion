<?php
class Upload_library
{
	protected $CI;
	function __construct()
	{
		$this->CI =& get_instance();
	}
	function upload($upload_path='',$image='')
	{
		$config = $this->config($upload_path);
		$this->CI->upload->initialize($config);
		$this->CI->upload->do_upload($image);
		$data_img = $this->CI->upload->data();
		$image_link = "";
		$image_link = $data_img['file_name'];
		return $image_link;
	}
	function upload_file($upload_path='',$list_image='')
	{
		$config = $this->config($upload_path);
		$image_list = array();
        //lưu biến môi trường khi thực hiện upload
        $file  = $_FILES[$list_image];
        $count = count($file['name']);//lấy tổng số file được upload
        for($i=0; $i<=$count-1; $i++) 
        {
            $_FILES['userfile']['name']     = $file['name'][$i];  //khai báo tên của file thứ i
            $_FILES['userfile']['type']     = $file['type'][$i]; //khai báo kiểu của file thứ i
            $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i]; //khai báo đường dẫn tạm của file thứ i
            $_FILES['userfile']['error']    = $file['error'][$i]; //khai báo lỗi của file thứ i
            $_FILES['userfile']['size']     = $file['size'][$i]; //khai báo kích cỡ của file thứ i
           //load thư viện upload và cấu hình
			$this->CI->upload->initialize($config);
              //thực hiện upload từng file
            if($this->CI->upload->do_upload())
            {
                $data = $this->CI->upload->data();
                $image_list[] = $data['file_name'];
            }     
        }
        return $image_list;
	}
	function config($upload_path='')
	{
		$config = array();
		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = '1200';
		$config['max_width']     = '1200';
		$config['max_height']    = '1200';
		return $config;
	}
}
?>