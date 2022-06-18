<div class="row">
	<div class="panel panel-info">
	  <div class="panel-heading">
	    <h3 class="panel-title text-center"><img src="<?php echo base_url(); ?>upload/icon/new.gif" alt=""><a href="<?php echo base_url('product/news'); ?>" class='product_title'>Sản phẩm mới </a><img src="<?php echo base_url(); ?>upload/icon/new.gif" alt=""></h3>
	  </div>
	  <div class="panel-body">
	  	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding">
			<?php foreach ($new_product as $value) {
				$name = covert_vi_to_en($value->name);
	  			$name = strtolower($name);
				 ?>
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
		  			<div class="product_item">
		  				<p class="product_name" ><a href="<?php echo base_url($name.'-p'.$value->id); ?>" ><?php echo $value->name; ?></a></p>
		  				<div class="product-image">
		  					<a href="<?php echo base_url($name.'-p'.$value->id); ?>"><img src="<?php echo base_url(); ?>upload/product/<?php echo $value->image_link; ?>" alt="" class=""></a>
		  				</div>
		  				<?php if ($value->discount>0) { 
		  					$new_price = $value->price - $value->discount; ?>
		  					<p><span class='price text-right'><?php echo number_format($new_price); ?> VNĐ</span> <del class="product-discount"><?php echo number_format($value->price); ?> VNĐ</del></p>
		  				<?php }else{ ?>
							<p><span class='price text-right'><?php echo number_format($value->price); ?> VNĐ</span></p>
		  				<?php	} ?>
						<p><span class="glyphicon glyphicon-eye-open" aria-hidden="true" title="Số lượt xem"></span> <?php echo $value->view; ?> <span class="glyphicon glyphicon-star-empty" aria-hidden="true" title="Số lượng đặt mua"><?php echo $value->buyed; ?></p>
						<a href="<?php echo base_url('cart/add/'.$value->id); ?>"><button class='btn btn-info'><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Thêm giỏ hàng</button></a>
		  			</div>
				</div>
			<?php } ?>	
	  	</div>
	  </div>
	</div>	
</div>
<div class="row">
	<div class="panel panel-info">
	  <div class="panel-heading">
	    <h3 class="panel-title text-center"><img src="<?php echo base_url(); ?>upload/icon/hot.gif" alt=""><a href="<?php echo base_url('ban-chay'); ?>" class='product_title'>Sản phẩm bán chạy</a><img src="<?php echo base_url(); ?>upload/icon/hot.gif" alt=""></h3>
	  </div>
	  <div class="panel-body">
	  	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding">
	  		<?php foreach ($hot_product as $value) {
	  			$name = covert_vi_to_en($value->name);
	  			$name = strtolower($name);
	  			 ?>
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
		  			<div class="product_item">
		  				<p class="product_name" ><a href="<?php echo base_url($name.'-p'.$value->id); ?>" ><?php echo $value->name; ?></a></p>
		  				<div class="product-image">
		  					<a href="<?php echo base_url($name.'-p'.$value->id); ?>"><img src="<?php echo base_url(); ?>upload/product/<?php echo $value->image_link; ?>" alt="" class=""></a>
		  				</div>
		  				<?php if ($value->discount>0) { 
		  					$new_price = $value->price - $value->discount; ?>
		  					<p><span class='price text-right'><?php echo number_format($new_price); ?> VNĐ</span> <del class="product-discount"><?php echo number_format($value->price); ?> VNĐ</del></p>
		  				<?php }else{ ?>
							<p><span class='price text-right'><?php echo number_format($value->price); ?> VNĐ</span></p>
		  				<?php	} ?>
						<p><span class="glyphicon glyphicon-eye-open" aria-hidden="true" title="Số lượt xem"></span> <?php echo $value->view; ?> <span class="glyphicon glyphicon-star-empty" aria-hidden="true" title="Số lượng đặt mua"><?php echo $value->buyed; ?></p>
						<a href="<?php echo base_url('cart/add/'.$value->id); ?>"><button class='btn btn-info'><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Thêm giỏ hàng</button></a>
		  			</div>
				</div>
			<?php } ?>	
	  	</div>  
	  </div>
	</div>	
</div>
<div class="row">
	<div class="panel panel-info">
	  <div class="panel-heading">
	    <h3 class="panel-title text-center"><img src="<?php echo base_url(); ?>upload/icon/hot.gif" alt=""><a href="<?php echo base_url('product/views'); ?>" class='product_title'>Sản phẩm xem nhiều</a><img src="<?php echo base_url(); ?>upload/icon/hot.gif" alt=""></h3>
	  </div>
	  <div class="panel-body">
	  	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding">
	  		<?php foreach ($view_product as $value) {
	  			$name = covert_vi_to_en($value->name);
	  			$name = strtolower($name);
	  			 ?>
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
		  			<div class="product_item">
		  				<p class="product_name" ><a href="<?php echo base_url($name.'-p'.$value->id); ?>" ><?php echo $value->name; ?></a></p>
		  				<div class="product-image">
		  					<a href="<?php echo base_url($name.'-p'.$value->id); ?>"><img src="<?php echo base_url(); ?>upload/product/<?php echo $value->image_link; ?>" alt="" class=""></a>
		  				</div>
		  				<?php if ($value->discount>0) { 
		  					$new_price = $value->price - $value->discount; ?>
		  					<p><span class='price text-right'><?php echo number_format($new_price); ?> VNĐ</span> <del class="product-discount"><?php echo number_format($value->price); ?> VNĐ</del></p>
		  				<?php }else{ ?>
							<p><span class='price text-right'><?php echo number_format($value->price); ?> VNĐ</span></p>
		  				<?php	} ?>
						<p><span class="glyphicon glyphicon-eye-open" aria-hidden="true" title="Số lượt xem"></span> <?php echo $value->view; ?> <span class="glyphicon glyphicon-star-empty" aria-hidden="true" title="Số lượng đặt mua"><?php echo $value->buyed; ?></p>
						<a href="<?php echo base_url('cart/add/'.$value->id); ?>"><button class='btn btn-info'><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Thêm giỏ hàng</button></a>
		  			</div>
				</div>
			<?php } ?>	
	  	</div>  
	  </div>
	</div>	
</div>