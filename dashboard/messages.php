 
<?php
$conn = $mc->db->get_pdo_connection();
//$contacts = $mc->db->get_user_contacts($conn, $_SESSION['User']['id'],-10, -10);
$messages = $mc->db->get_user_messages($conn, $_SESSION['User']['id'],0, 10);
//print_r($messages);
if ( count($messages)   > 0) :
	
	foreach ( $messages as $message ) :
		if($message['status'] == 'Sent'):
		?>
		
<tr>
	<!-- <td class="checkbox-column"><input type="checkbox" class="uniform"></td>-->
	<td class="hidden-xs"><?php echo $message['sender'];?></td>
	<td><?php echo $message['phone'];?></td>
	<td><?php echo $message['message'];?></td>
	<td><?php echo $message['created'];?></td>
	<td class="align-center"><?php echo $message['status'];?></td>
	<!-- <td class="align-center"><span class="btn-group"> <a href="#"
			title="Approve" class="btn btn-xs bs-tooltip"><i class="icon-ok"></i></a>
	</span></td>-->
</tr>

<?php else:?>

<tr>
	<!-- <td class="checkbox-column"><input type="checkbox" class="uniform"></td>-->
	<td class="hidden-xs"><?php echo $message['sender'];?></td>
	<td><?php echo $message['phone'];?></td>
	<td><?php echo $message['message'];?></td>
	<td><?php echo $message['created'];?></td>
	<td class="align-center" style="color:red;"><?php echo str_replace("/","",str_replace("<h1>","" ,$message['status']));?></td>
	<!-- <td class="align-center"><span class="btn-group"> <a href="#"
			title="Approve" class="btn btn-xs bs-tooltip"><i class="icon-ok"></i></a>
	</span></td>-->
</tr>
<?php endif;?>
<?php endforeach;?>

<?php endif;?>