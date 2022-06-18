<div class="row">
	<?php if (isset($message_success) && !empty($message_success)) { ?>
		<div class="alert bg-success" role="alert" style="padding: 6px;margin-bottom: 0px;">
			<svg class="glyph stroked checkmark"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-checkmark"></use></svg><?php echo $message_success; ?><a id="remove-mess" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
		</div>
	<?php } ?>
	<?php if (isset($message_fail) && !empty($message_fail)) { ?>
		<div class="alert bg-danger" role="alert" style="padding: 6px;margin-bottom: 0px;">
			<svg class="glyph stroked cancel"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-cancel"></use></svg><?php echo $message_fail; ?><a id="remove-mess" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
		</div>
	<?php } ?>
</div>