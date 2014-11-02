
<?php  //echo BASE_URL; ?>

<?php 
$conn = $mc->db->get_pdo_connection();
$banners = $mc->getBanners($conn, 0, 10);
 // print_r($banners);
 
  //echo $_SERVER['DOCUMENT_ROOT'];
?>
<?php foreach ($banners as $b):?>
<?php 
if($_SERVER['SERVER_NAME'] == 'localhost'){
$fl = realpath($_SERVER['DOCUMENT_ROOT'] );
 
//echo $fl;
}
else{
$fl = $_SERVER['DOCUMENT_ROOT'].'/kootsms/';
}
 
?>
 
<?php if($b['category'] == 'home' && basename($_SERVER['SCRIPT_NAME']) == 'index.php'):?>
<li>
	<div class="six columns animated fadeInUpBig slide-left hide-for-small">
		<img alt="front" src="<?php echo str_replace($fl,'', $b['image_link']);?>" />
	</div>

	<div class="six columns animated fadeInRightBig slide-right">
		<h1 class="text-right"><?php echo  $b['title'];?></h1>
		<div class="hr hide-for-small"></div>
		<p class="right text-right  hide-for-small">
	  <?php echo wordwrap($b['details'],60,'<br/>', true);?>
	
	</p>


	</div>
</li>
<?php endif;?>
<?php endforeach;?>

<!-- 


<li>
	<div class="six columns animated fadeInUpBig slide-left hide-for-small">
		<img alt="front" src="images/wireframes/front-pad.png" />
	</div>

	<div class="six columns animated fadeInRightBig slide-right">
		<h1 class="text-right">Lorem Ipsum</h1>
		<div class="hr hide-for-small"></div>
		<p class="right text-right  hide-for-small">Lorem Ipsum is simply
			dummy text of the printing and typesetting industry. Lorem Ipsum has
			been the industry's standard dummy text ever since the 1500s, when an
			unknown printer took a galley of type and scrambled it to make a type
			specimen book.</p>


	</div>
</li>



-->