<?php
if (count ( $notifications ) > 0) :
	
	foreach ( $notifications as $message ) :
		
		?>

<li><a href="javascript:void(0);"> <span class="label label-success"><i
			class="icon-plus"></i></span> <span class="message"><?php echo $message['message']?></span> <span class="time"><?php echo $time;?></span>
</a></li>

<?php endforeach;?>

<?php endif;?>