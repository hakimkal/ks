<?php $pageName = 'All '. $_GET['category'];?>
<?php require('admin_top.php');
?>
 
<?php
 
$Users =  $mc->getUsers($_GET['category']);

?>

<!--=== Blue Chart ===-->
				<div class="row">
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> All <?php echo ucwords($_GET['category']);?> </h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content no-padding">
								<table class="table table-striped table-checkable table-hover">
									<thead>
										<tr>
											 
											<th class="hidden-xs"> Name</th>
											<th>Mobile No</th>
											<th>Email</th>
											<th class="align-center">Registered Date</th>
                                           <th class="align-center">Package(s)</th>
										</tr>
									</thead>
									 
									<tbody>
										<?php for ($i=0; $i<count($Users); $i++):?>
										<tr>
										 
											 
										 
											<td class="hidden-xs"><?php  echo $Users[$i]['firstname'] . ' '.  $Users[$i]['lastname'];?></td>
											<td><?php  echo $Users[$i]['mobile'] ?></td>
											<td><?php  echo $Users[$i]['email'] ?></td>
											<td class="align-center">
												<?php  echo $Users[$i]['created'] ?>
											</td>
											
												<td class="align-center">
												Bulksms
											</td>
                                            <td class="align-center">
												<span class="btn-group">
													<a href="edit_user.php?id=<?php  echo $Users[$i]['id'] ?>" title="Edit" class="btn btn-xs bs-tooltip"><i class="icon-edit"></i></a>
													 
													<a href="javascript:void(0);" title="Delete" class="btn btn-xs bs-tooltip"><i class="icon-remove"></i></a>
												</span>
											</td>
										</tr>
										 <?php endfor;?>
									</tbody>
								</table>
								<div class="row">
									<div class="table-footer">
										<div class="col-md-12">
											 Total <?php echo ucwords($_GET['category']). ' :  ' .count($Users);?>
										</div>
									</div> <!-- /.table-footer -->
								</div> <!-- /.row -->
							</div>
							<div class="divider"></div>
							
						</div>
					</div> <!-- /.col-md-12 -->
				</div> <!-- /.row -->
				<!-- /Blue Chart -->


<?php require('admin_footer.php');
?>