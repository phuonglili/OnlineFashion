<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active">Danh mục</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-info">
			<div class="panel-heading">
			Thêm danh mục
			</div>
			<div class="panel-body">
				<form class="form-horizontal" name="" method="post">
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Tên danh mục</label>
				    <div class="col-sm-5">
				      <input type="text" name='name' class="form-control" id="inputEmail3" placeholder="" value="<?php echo set_value('name'); ?>">
				    </div>
				    <div class="col-sm-4">
				    	<?php echo form_error('name'); ?>
					</div>
				  </div>
				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Mô tả</label>
					<div class="col-sm-5">
				      <textarea class="form-control" rows="3" name="description"><?php echo set_value('description'); ?></textarea>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Danh mục cha</label>
				    <div class="col-sm-5">
				        <select class="form-control" name="parent_id">
						  <option value='0'>Menu gốc</option>
						  <option value='1'>Thời trang</option>
						  <?php foreach ($list as $value) { 
						  	if ($value->parent_id>0) { ?>
						  		<option value="<?php echo $value->id; ?>" <?php if(set_value('parent_id')== $value->id) echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;<?php echo $value->name; ?></option>
						  	<?php }else{?>
						  	<option value="<?php echo $value->id; ?>" <?php if(set_value('parent_id')== $value->id) echo 'selected'; ?>><?php echo $value->name; ?></option>
						  <?php } } ?>
						</select>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Thứ tự</label>
				    <div class="col-sm-5">
				        <select class="form-control" name="sort_order">
				        <?php for ($i=1; $i < 10 ; $i++) { ?>
				        	<option value='<?php echo $i; ?>' <?php if(set_value('sort_order')== $i) echo 'selected'; ?>><?php echo $i; ?></option>
				        <?php } ?>
						</select>
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-5">
				      <button type="submit" class="btn btn-primary">Thêm mới</button>
				    </div>
				  </div>
				</form>
			</div>
		</div>
	</div>
</div><!--/.row-->
