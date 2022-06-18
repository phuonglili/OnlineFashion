<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('site/head',$this->data); ?>
</head>
<body>
	<div class="container">
		<?php $this->load->view('site/header',$this->data); ?>

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding" style="margin-top: 15px;">
				<ol class="breadcrumb">
				  <li><a href="#"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
				  <li class="active">Đăng nhập</li>
				</ol>
				<div class="panel panel-info ">
					<?php if (isset($message_fail) && !empty($message_fail)) { ?>
						<?php echo $message_fail; ?>
					<?php } ?>
				  <div class="panel-body">
				  	<form class="form-horizontal" method="post" action="<?php echo base_url('user/login'); ?>">
				  		<div class="form-group">
				  			 <h3 style="color: red"><?php echo form_error('login'); ?></h3>
				  		</div>
					  <div class="form-group">
					    <label for="inputEmail3" class=" col-sm-offset-2 col-sm-2 control-label">Email</label>
					    <div class="col-sm-4">
					      <input type="email" class="form-control" id="inputEmail3" placeholder="" name="email" value="<?php echo set_value('email'); ?>">
					    </div>
						<div class="col-sm-3">
					    	<?php echo form_error('email'); ?>
						</div>
					  </div>
					  <div class="form-group">
					    <label for="inputEmail3" class="col-sm-offset-2 col-sm-2 control-label">Mật khẩu</label>
					    <div class="col-sm-4">
					      <input type="password" class="form-control" id="inputEmail3" placeholder="" name="password">
					    </div>
					    <div class="col-sm-3">
					    	<?php echo form_error('password'); ?>
						</div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-4 col-sm-2">
					      <button type="submit" class="btn btn-success">Đăng nhập</button>
					    </div>
					    <div class="col-sm-offset-1 col-sm-2">
					      <a href="<?php echo base_url('dang-ky'); ?>">Đăng kí</a>
					    </div>
					  </div>
					</form>				  	
				  </div>

					</div>
			</div>
		</div>
		<?php $this->load->view('site/footer',$this->data); ?>
	</div>
    <script src="<?php echo public_url('site/'); ?>bootstrap/js/bootstrap.min.js"></script>
</body>
</html>