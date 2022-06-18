<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active">thành viên</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-info">
			<div class="panel-heading">
			Sửa thông tin thành viên
			</div>
			<div class="panel-body">
				<form class="form-horizontal" name="" method="post">
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Họ tên</label>
				    <div class="col-sm-5">
				      <input type="text" name='name' class="form-control" id="inputEmail3" placeholder="" value="<?php echo $admin->name; ?>">
				    </div>
				    <div class="col-sm-4">
				    	<?php echo form_error('name'); ?>
					</div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
				    <div class="col-sm-5">
				      <input type="email" name='email' class="form-control" id="inputEmail3" placeholder="" value="<?php echo $admin->email; ?>">
				    </div>
				    <div class="col-sm-4">
				    	<?php echo form_error('email'); ?>
					</div>
				  </div>
				  <div class="form-group">
				  <p>Nếu thay đổi mật khẩu thì mới nhập</p>
				    <label for="inputEmail3" class="col-sm-2 control-label">Mật khẩu</label>
				    <div class="col-sm-5">
				      <input type="password" name='password' class="form-control" id="inputEmail3" placeholder="">
				    </div>
				    <div class="col-sm-4">
				    	<?php echo form_error('password'); ?>
					</div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Nhập lại mật khẩu</label>
				    <div class="col-sm-5">
				      <input type="password" name='re_password' class="form-control" id="inputEmail3" placeholder="">
				    </div>
				    <div class="col-sm-4">
				    	<?php echo form_error('re_password'); ?>
					</div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Phân quyền</label>
				    <div class="col-sm-5">
				        <select class="form-control" name="level">
				        	<option>--- CHỌN ---</option>
				        	<option value="0">ADMIN</option>
				        	<option value="1">MOD</option>
				        	<option value="2">USER</option>
						</select>
				    </div>
				     <div class="col-sm-4">
				    	<?php echo form_error('level'); ?>
					</div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-5">
				      <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
				    </div>
				  </div>
				</form>
			</div>
		</div>
	</div>
</div><!--/.row-->
