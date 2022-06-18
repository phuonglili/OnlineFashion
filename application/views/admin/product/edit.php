<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active">Sản phẩm</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-info">
			<div class="panel-heading">
			Chỉnh sửa thông tin sản phẩm
			</div>
			<div class="panel-body">
				<form class="form-horizontal" name="" method="post" enctype="multipart/form-data">
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Tên sản phẩm</label>
				    <div class="col-sm-5">
				      <input type="text" name='name' class="form-control" id="inputEmail3" placeholder="" value="<?php echo $product->name; ?>">
				    </div>
				    <div class="col-sm-4">
				    	<?php echo form_error('name'); ?>
					</div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh</label>
				    <img src="<?php echo base_url('upload/product/'.$product->image_link); ?>" alt="" style="width: 50px;float:left;margin-left: 15px;">
				    <div class="col-sm-3">
				      <input type="file" id="image" name="image">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh kèm theo</label>
				    <?php
				    $image_list = json_decode($product->image_list);
				    if (is_array($image_list)) {
				    	foreach ($image_list as $value) {
				    ?>
				    	<img src="<?php echo base_url('upload/product/'.$value); ?>" alt="" style="width: 50px;float:left;margin-left: 15px;">
				    <?php
				    }
				    }
				    ?>
				    <div class="col-sm-5">
				      <input type="file" id="list_image" name="list_image[]" multiple>
				    </div>
				  </div>
				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Chi tiết</label>
					<div class="col-sm-8">
				      <textarea class="form-control" rows="3" name="content" id='content'><?php echo $product->content; ?></textarea>
				    </div>
				  </div>
      				<script>CKEDITOR.replace('content');</script>
				 
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Danh mục</label>
				    <div class="col-sm-5">
				        <select class="form-control" name="catalog_id">
						  <option>--- Chọn danh mục sản phẩm ---</option>
						  <?php foreach ($catalog as $value) { 
						  	if (count($value->sub)>1) { ?>
						  		<option value="<?php echo $value->id; ?>" <?php if($product->catalog_id == $value->id) echo 'selected'; ?>><?php echo $value->name; ?></option>
						  		<?php 
						  		foreach ($value->sub as $val) { ?>
						  			<option value="<?php echo $val->id; ?>" <?php if($product->catalog_id == $val->id) echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $val->name; ?></option>
						  		<?php }
						  		?>
						  		
						  	<?php }else{?>
						  	<option value="<?php echo $value->id; ?>" <?php if($product->catalog_id == $value->id) echo 'selected'; ?>><?php echo $value->name; ?></option>
						  <?php } } ?>
						</select>
						<div class="col-sm-4">
				    	<?php echo form_error('catalog_id'); ?>
					</div>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Giá tiền</label>
				    <div class="col-sm-5">
				      <input type="text" name='price' class="form-control" id="inputEmail3" placeholder="" value="<?php echo number_format($product->price); ?>">
				    </div>
				    <div class="col-sm-4">
				    	<?php echo form_error('price'); ?>
					</div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Giảm giá</label>
				    <div class="col-sm-5">
				      <input type="text" name='discount' class="form-control" id="inputEmail3" placeholder="" value="<?php echo number_format($product->discount); ?>">
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
