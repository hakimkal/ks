<?php $pageName = "All FAQs"?>
<?php

require ('admin_top.php');
?>



<!--=== Blue Chart ===-->
<div class="row">
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4>
					<i class="icon-reorder"></i>FAQs
				</h4>
				<div class="toolbar no-padding">
					<div class="btn-group">
						<span class="btn btn-xs widget-collapse"><i
							class="icon-angle-down"></i></span>
					</div>
				</div>
			</div>
			<div class="widget-content no-padding">
				<table class="table table-striped table-checkable table-hover ">
					<thead>
						<tr>

							<th class="hidden-xs">Question</th>
							<th>Answer</th>
							 

							 
							<th class="align-center">Action</th>
						</tr>
					</thead>

					<tbody>
					<?php
					
					if ($_SERVER ['SERVER_NAME'] == 'localhost') {
						$fl = realpath ( $_SERVER ['DOCUMENT_ROOT'] );
						
						// echo $fl;
					} else {
						$fl = realpath ( $_SERVER ['DOCUMENT_ROOT'] );
						// echo $fl;
					}
					
					?>
										  <?php
												// require('../../includes/paginator.class.php');
												try {
													
													$conn = $mc->db->get_pdo_connection ();
													$num_rows = $mc->db->get_faqs_count ( $conn );
													 // print_r($num_rows);
													$pages = new Paginator ( $num_rows, 9, array (
															15,
															3,
															6,
															9,
															12,
															25,
															50,
															100,
															250,
															'All' 
													) );
													
													$result = $mc->getFAQsPDO ( $conn, $pages->limit_start, $pages->limit_end );
													  //print_r ( $result );
													foreach ( $result as $row ) {
													 
															
															$record = "<tr><td>$row[1]    </td> <td>$row[2]</td>   ";
															$record .= "<td class='align-center'><span class='btn-group'>
													<a href='edit_faq.php?id=" . $row [0] . "'  class='btn btn-xs bs-tooltip edit' id='edit" . $row [0] . "'><i class='icon-edit' title='approve' id='approve".$row[0]."'></i></a>
												
														</span></td>";
														 
														 
															$record .= "<td class='align-center'><span class='btn-group'>
													<a href='delete.php?id=" . $row [0] . "&object=faq'  class='btn btn-xs bs-tooltip delete' id='delete" . $row [0] . "'><i class='icon-remove' title='delete' id='delete".$row[0]."'></i></a>
															
														</span></td>";
																
														$record .= "</tr>\n";
														
														echo $record;
													}
													
													echo "<p class=\"paginate\">Page: $pages->current_page of $pages->num_pages</p>\n";
													// echo "<p class=\"paginate\">SELECT * FROM table LIMIT $pages->limit_start,$pages->limit_end (retrieve records $pages->limit_start-".($pages->limit_start+$pages->limit_end)." from table - $pages->total_items item total / $pages->items_per_page items per page)";
												} catch ( PDOException $e ) {
													// echo 'ERROR: ' . $e->getMessage();
												}
												?>
								 
								 
										 
									 
									</tbody>
				</table>
				<div class="row">
					<div class="table-footer">
						<div class="col-md-12">
											 Total FAQs: <?php echo ucwords(count($result));?>
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


