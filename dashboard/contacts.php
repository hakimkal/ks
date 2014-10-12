<?php
$conn = $mc->db->get_pdo_connection();
//$contacts = $mc->db->get_user_contacts($conn, $_SESSION['User']['id'],-10, -10);
$contacts = $mc->db->get_user_contacts($conn, $_SESSION['User']['id'],0, 10);
//print_r($contacts);
if ( $contacts   > 0) :
	
	foreach ( $contacts as $contact ) :
		
		?>
<tr>
	<td class="checkbox-column"><input type="checkbox" class="uniform2 selectable_user_contacts"  name="Bulksms[user_ids][]" value="<?php echo $contact['id']; ?>"></td>
	<td class="hidden-xs"><?php echo $contact['firstname']; ?></td>
	<td><?php echo $contact['lastname']; ?></td>
	<td><?php echo $contact['phone']; ?></td>
	<td class="align-center"><span class="btn-group">
	 <?php if($sms_credit_balance > 0 ):?>
	 <a
			href="send_sms.php?contact_id=<?php echo $contact['id']; ?>" title="Send SMS "
			class="btn btn-xs bs-tooltip"><i class="icon-ok"></i></a>
	<?php else:?>
	 
	  <a
			href="Javascript:alert('No Sufficient credit for this service!');" title="Send SMS "
			class="btn btn-xs bs-tooltip"><i class="icon-ok"></i></a>
			<?php endif;?>
	</span></td>
</tr>

<?php endforeach;?>

<?php endif;?>

<?php  include(dirname(dirname( __FILE__)).'/notifier.php');?>
