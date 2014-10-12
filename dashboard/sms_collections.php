<?php
if (  $sms_collections   > 0) :
	
	foreach ( $sms_collections as $message ) :
		
		?>
<li>
	<div class="col1">
		<div class="content">
			<div class="content-col1">
				<div class="label label-success">
					<i class="icon-bell"></i>
				</div>
			</div>
			<div class="content-col2">
				<div class="desc">Lorem Ipsum is simply dummy text</div>
			</div>
		</div>
	</div> <!-- /.col1 -->
	<div class="col2">
		<div class="date">Just now</div>
	</div> <!-- /.col2 -->
</li>


<?php endforeach;?>

<?php endif;?>