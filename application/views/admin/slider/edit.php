<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active">slider</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-info">
			<div class="panel-heading">
			Chỉnh sửa thông tin slider
			</div>
			<div class="panel-body">
				<form class="form-horizontal" name="" method="post" enctype="multipart/form-data">
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Tên slider</label>
				    <div class="col-sm-5">
				      <input type="text" name='name' class="form-control" id="inputEmail3" placeholder="" value="<?php echo $slider->name; ?>">
				    </div>
				    <div class="col-sm-4">
				    	<?php echo form_error('name'); ?>
					</div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh</label>
				    <img src="<?php echo base_url('upload/slider/'.$slider->image_link); ?>" alt="" style="width: 200px;float:left;margin-left: 15px;">
				    <div class="col-sm-3">
				      <input type="file" id="image" name="image">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Liên kết</label>
				    <div class="col-sm-5">
				      <input type="text" name='link' class="form-control" id="inputEmail3" placeholder="" value="<?php echo $slider->link; ?>">
				    </div>
				    <div class="col-sm-4">
				    	<?php echo form_error('link'); ?>
					</div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Thứ tự</label>
				    <div class="col-sm-5">
				        <select class="form-control" name="sort_order">
						  <?php for ($i=1; $i < 6 ; $i++) { ?>
						  	<option value="<?php echo $i ?>" <?php if($slider->sort_order==$i) echo 'selected'; ?>><?php echo $i ?></option>
						  <?php } ?>
						</select>
						<div class="col-sm-4">
					    	<?php echo form_error('sort_order'); ?>
						</div>
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
