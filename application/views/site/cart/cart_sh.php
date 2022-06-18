<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-shopping-cart"><span class="badge"><?php echo $total_items ?></span></span> Giỏ Hàng<span class="caret"></span></a>
  <ul class="dropdown-menu" style="min-width: 300px;">
    <?php 
    if($total_items > 0)
    { ?>
      <div class="table-responsive" style="min-width: 400px;">
         <table class="table table-hover">
          <thead>
          <tr>
            <th>Ảnh</th>
            <th>Tên <span></span></th>
            <th>SL</th>
            <th>Giá</th>
          </tr>
        </thead>
           <tbody>
              <?php 
              foreach ($carts as $items) {  ?>
                    <tr>
                      <td>  <img style="width: 40px;border-radius: 30%;" src="<?php echo base_url('upload/product/'.$items['image_link']); ?>" alt=""></td>
                      <td><?php echo $items['name']; ?></td>
                      <td><?php echo $items['qty']; ?></td>
                      <td><?php echo number_format($items['subtotal']); ?> VNĐ</td>
                    </tr>
                  <?php }
                  ?>                   
            </tbody>                       
         </table> 
           <a href="<?php echo base_url('cart'); ?>" type="button" class="btn btn-success"> Chi Tiết Giỏ Hàng </a>
           <a href="<?php echo base_url('cart/del'); ?>" type="button" class="btn btn-danger pull-right"> Xóa </a>
      </div>
    <?php }else{ ?>
        <p style="color:red;font-weight: bold;float: right;padding-right: 30px">Không có sản phẩm trong giỏ hàng</p>
    <?php  } ?>
  </ul>
</li>