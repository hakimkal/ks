<?php $pageName = 'All Features'?>
<?php


require ('admin_top.php');
?>
 
<?php

$Packages = $mc->getFeatures ();

?>

<!--=== Blue Chart ===-->
<div class="row">
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4>
					<i class="icon-reorder"></i> All Packages
				</h4>
				<div class="toolbar no-padding">
					<div class="btn-group">
						<span class="btn btn-xs widget-collapse"><i
							class="icon-angle-down"></i></span>
					</div>
				</div>
			</div>
			<div class="widget-content no-padding">
				<table class="table table-striped table-checkable table-hover">
					<thead>
						<tr>

							<th class="hidden-xs">Title</th>
							<th class="hidden-xs">Price</th>
							<th class="hidden-xs">Feature</th>
							 
							<th class="align-center">Created</th>

						</tr>
					</thead>

					<tbody>
										<?php for ($i=0; $i<count($Packages); $i++):?>
										<tr>



							<td ><?php  echo $Packages[$i]['title'];?></td>
							<td><?php  echo $Packages[$i]['price'];?></td>
					 
						
							<td class="hidden-xs"><?php  echo $Packages[$i]['feature'] ;?></td>
							 	<td class="align-center">
												<?php  echo $Packages[$i]['created']?>
											</td>


							<td class="align-center"><span class="btn-group"> <a
									href="edit_feature.php?id=<?php echo $Packages[$i]['id'];?>" title="Edit" class="btn btn-xs bs-tooltip"><i
										class="icon-edit"></i></a> <a href="delete.php?object=feature&id=<?php  echo $Packages[$i]['id'];?>" id="delete"
									title="Delete" class="btn btn-xs bs-tooltip delete"><i
										class="icon-remove delete"></i></a>
							</span></td>
						</tr>
										 <?php endfor;?>
									</tbody>
				</table>
				<div class="row">
					<div class="table-footer">
						<div class="col-md-12">
											 Total <?php echo  'Packages :  ' .count($Packages);?>
										</div>
					</div>
					<!-- /.table-footer -->
				</div>
				<!-- /.row -->
			</div>
			<div class="divider"></div>

		</div>
	</div>
	<!-- /.col-md-12 -->
</div>
<!-- /.row -->
<!-- /Blue Chart -->


<?php

require ('admin_footer.php');
?>


<script type="text/javascript">
$(document).ready(function(){
$(".delete").click(function(e){
	//e.preventDefault();
	var delUrl = $(this).attr("href");
	//alert(delUrl);
    var r = confirm('Are you sure to delete?');
    //var url = window.location.pathname;
   
    if (r == true) {
       
        return true;
       // window.location = host + newHost;
        //document.location.href = '/headquarters/designReset';
    }  
    else{
    return false;                        
      // <-- add this line
    }
});
	
});
</script>