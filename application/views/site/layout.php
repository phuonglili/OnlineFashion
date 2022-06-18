<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('site/head',$this->data); ?>
</head>
<body>
	<div class="container">
		<?php $this->load->view('site/header',$this->data); ?>
		<?php $this->load->view('site/slider',$this->data); ?>
		<?php $this->load->view($temp,$this->data); ?>
		<?php $this->load->view('site/footer',$this->data); ?>
	</div>
    <script src="<?php echo public_url('site/'); ?>bootstrap/js/bootstrap.min.js"></script>
</body>
</html>