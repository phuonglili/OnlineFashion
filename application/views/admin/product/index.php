<script type="text/javascript">
	$(document).ready(function(){
		$('.remove').click(function(){
			var container = $(this).parent().parent();
			var id = $(this).attr('id');
			var string = 'id='+id;
			$.ajax({
				url:'<?php echo admin_url('product/del'); ?>',
				type:'post',
				data: string,
				success: function(success){
					container.slideUp('slow',function(){
						container.remove();
					})
				}
			});
		});
});
</script>
<script type="text/javascript" >
	$(document).ready(function(){
	  $('#submit-del').click(function(){
	        
			$.ajax({
				url:'<?php echo admin_url('product/del'); ?>',
				type:'post',
				data: string,
				success: function(success){
					container.slideUp('slow',function(){
						container.remove();
					})
				}
			});
	  });
	});
	</script>
<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active">Sản phẩm</li>
	</ol>
</div><!--/.row-->
<h3><span id="message"></span></h3>
<div class="row">
	<div class="col-lg-12">
	<form action="" method="post" >
		<div class="panel panel-info">
			<div class="panel-heading">
			<div class="col-md-8">Quản lý sản phẩm</div>
			<div class="col-md-4 text-right"><a href="<?php echo admin_url('product/add'); ?>" class='btn btn-info'><svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Thêm sản phẩm</a></div>
			</div>
			<div class="panel-body">
				
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr class="info">
									<th></th>
									<th class="text-center">ID</th>
									<th>Tên sản phẩm</th>
									<th>Danh mục</th>
									<th>Giá</th>		
									<th>Hành động</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($product as $value) { ?>
									<tr>
										<td style="vertical-align: middle"><input type="checkbox" name="checkbox[]" value="<?php echo $value->id; ?>"  /></td>
										<td style="vertical-align: middle;text-align: center;"><strong><?php echo $value->id; ?></strong></td>
										<td><img src="<?php echo base_url(); ?>upload/product/<?php echo $value->image_link; ?>" alt="" style="width: 50px;float:left;margin-right: 10px;"><strong><?php echo $value->name; ?></strong>
										<p style="font-size: 12px;margin-top: 4px;">View: <?php echo $value->view; ?> <span> | Đã bán :<?php echo $value->buyed; ?></span></p>
										</td>
										<td style="vertical-align: middle"><strong ><?php echo $value->namecatalog; ?></strong></td>
										<td style="vertical-align: middle">
											<?php if($value->discount > 0){
													$price_new = $value->price - $value->discount;
													?>
													<strong><?php echo number_format($price_new); ?> VNĐ</strong><br><del><?php echo number_format($value->price); ?> VNĐ</del>

												<?php }else{ ?>
													<strong><?php echo number_format($value->price); ?> VNĐ</strong>
												<?php } ?>
										</td>
										<td class="list_td aligncenter">
								            <a href="<?php echo admin_url('product/edit/'.$value->id); ?>" title="Sửa"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;&nbsp;
								            <a id="<?php echo $value->id; ?>" title="Xóa" class="remove" onclick=" return confirm('Bạn chắc chắn muốn xóa')"> <span class="glyphicon glyphicon-remove" ></span> </a>
									    </td>    
					                </tr>
								<?php } ?>

				    		</tbody>

						</table>
						<button class="btn btn-info" id="submit-del" style="float: left" onclick="return confirm('Bạn chắc chắn muốn xóa')">Xóa</button>
						
						<?php echo $this->pagination->create_links(); ?>
						
						
					</div>
				
			</div>
		</div>
	</form>
	</div>

</div><!--/.row-->
