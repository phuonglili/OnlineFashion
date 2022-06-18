<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('admin/head.php'); ?>
</head>

<body>
	<?php $this->load->view('admin/style.php'); ?>
	<?php $this->load->view('admin/header.php'); ?>
	<?php $this->load->view('admin/sidebar.php'); ?>
	<div id="sidebar-collapse" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<?php $this->load->view('admin/message.php'); ?>	
	<?php $this->load->view($temp,$this->data); ?>
	</div>
	<?php $this->load->view('admin/footer.php'); ?>
</body>

</html>
