<!-- Noty -->
	
		<!-- Attach necessary scripts -->
	 
<?php if ($_SESSION ['success'] || $_SESSION ['error'] || $_SESSION ['warning']):?>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.min.js"></script>	
<?php endif;?>	 
<script type="text/javascript"
	src="<?php echo BASE_URL;?>/dashboard/plugins/noty/jquery.noty.js"></script>
<script type="text/javascript"
	src="<?php echo BASE_URL;?>/dashboard/plugins/noty/layouts/top.js"></script>
<script type="text/javascript"
	src="<?php echo BASE_URL;?>/dashboard/plugins/noty/themes/default.js"></script>
 
<?php if ($_SESSION ['success']):?>
 
<script type="text/javascript">
var $flash = "<?php  echo $_SESSION['success'];unset($_SESSION['success']);?>";

$(document).ready(function(){
window.setTimeout(function () {
	 
	noty({
		text: $flash,
		type: 'success',
		timeout: 5000
	});
}, 1000);
});
</script>
 
<?php elseif($_SESSION['error']):?>

<script type="text/javascript">
var $flash = "<?php echo $_SESSION['error'];unset($_SESSION['error']);?>";
$(document).ready(function(){
window.setTimeout(function () {
	 
	noty({
		text: $flash,
		type: 'error',
		timeout: 5000
	});
}, 1000);
});
</script>
<?php elseif ($_SESSION['warning']):?>
 
<script type="text/javascript">
var $flash = "<?php echo $_SESSION['warning'];unset($_SESSION['warning']);?>";
$(document).ready(function(){
window.setTimeout(function () {
	 
	noty({
		text: $flash,
		type: 'warning',
		timeout: 5000
	});
}, 1000);
});
</script>

<?php endif;?>

 