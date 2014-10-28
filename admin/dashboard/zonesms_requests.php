<?php $pageName = "Zonesms Requests"?>
<?php require('admin_top.php');
?>
 
 

<!--=== Blue Chart ===-->
				<div class="row">
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i>Zonesms Requests </h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content no-padding">
								<table class="table table-striped table-checkable table-hover ">
									<thead>
										<tr>
											 
											<th class="hidden-xs"> Sender</th>
											<th>Message</th>
											<th>Username</th>
											<th>Coverage</th>
											<th class="align-center">Created</th>
                                           <th class="align-center">Status</th>
                                            <th class="align-center">Action</th>
										</tr>
									</thead>
									 
									<tbody>
										  <?php 
							//	 require('../../includes/paginator.class.php');
								 try {
								 	
									$conn = $mc->db->get_pdo_connection();
									$num_rows = $mc->db->get_user_zone_sms_requests_count($conn);
									//print_r($num_rows);
								 	$pages = new Paginator($num_rows,9,array(15,3,6,9,12,25,50,100,250,'All'));
								 	 
										$result = $mc->getUsersZonesmsRequests($conn,  $pages->limit_start, $pages->limit_end);
									// print_r($result);
								 	 foreach($result as $row) {
if($row[9] == 'pending review'){ 		
$record=  "<tr><td>$row[2]</td><td>$row[3]</td><td>$row[11]</td><td>". $row[4]."</td><td>". str_replace("time", "",  $row[7]) ."</td><td style='color:red;'>". $row[9]."</td>";
								 		
	}
	else{$record=  "<tr><td>$row[2]</td><td>$row[3]</td><td>$row[11]</td><td>". $row[4]."</td><td>". str_replace("time", "",  $row[7]) ."</td><td>". $row[9]."</td>";
}							 		
								 		$record.= "<td class='align-center'><span class='btn-group'>
													<a href='zonesms_request_view.php?id=".$row[0]."'  class='btn btn-xs bs-tooltip'><i class='icon-info' title='view detail'></i></a>
												</span></td>"; 
								 		$record.="</tr>\n";
								 		
								 		echo $record;
								 	}
								  
								 	
								 	echo "<p class=\"paginate\">Page: $pages->current_page of $pages->num_pages</p>\n";
								 //	echo "<p class=\"paginate\">SELECT * FROM table LIMIT $pages->limit_start,$pages->limit_end (retrieve records $pages->limit_start-".($pages->limit_start+$pages->limit_end)." from table - $pages->total_items item total / $pages->items_per_page items per page)";
								 } catch(PDOException $e) {
								 	//echo 'ERROR: ' . $e->getMessage();
								 }
								 ?>
								 
								 
										 
									 
									</tbody>
								</table>
								<div class="row">
									<div class="table-footer">
										<div class="col-md-12">
											 Total Requests: <?php echo ucwords(count($result));?>
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