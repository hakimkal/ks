<?php $pageName = "Testimonials"?>
<?php

require ('admin_top.php');
?>



<!--=== Blue Chart ===-->
<div class="row">
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4>
					<i class="icon-reorder"></i>Testimonials
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

							<th class="hidden-xs">Customer</th>
							<th>Company Logo</th>
							<th>Desginamtion</th>
							<th>Remark</th>

							<th class="align-center">Status</th>
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
													$num_rows = $mc->db->get_user_testimonials_count ( $conn );
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
													
													$result = $mc->getUserTestimonialsPDO ( $conn, $pages->limit_start, $pages->limit_end );
													// print_r ( $result );
													foreach ( $result as $row ) {
														if ($row [3] == false) {
															
															$record = "<tr><td>$row[4]  $row[5] </td><td><img width='100' src='" . str_replace ( $fl, '', $row [7] ) . "'/></td><td>$row[8]</td><td>" . $row [2] . "</td> " . " <td style='color:red;' id='response".$row[0]."' >" . "Pending Approval" . "</td>";
															$record .= "<td class='align-center'><span class='btn-group'>
													<a href='#?id=" . $row [0] . "&approved=true'  class='btn btn-xs bs-tooltip approve' id='approve" . $row [0] . "'><i class='icon-ok' title='approve' id='approve".$row[0]."'></i></a>
												</span></td>";
														} else {
															$record = "<tr><td>$row[4] $row[5]</td><td><img width='100' src='" . str_replace ( $fl, '', $row [7] ) . "'/></td><td>$row[8]</td><td>" . $row [2] . "</td> " . " <td id='response".$row[0]."'>" . "Approved" . "</td>";
															$record .= "<td class='align-center'><span class='btn-group'>
													<a href='#?id=" . $row [0] . "&approved=false'  class='btn btn-xs bs-tooltip approve' id='delist'" . $row [0] . "><i class='icon-remove' title='delist' id='delist".$row[0]."' ></i></a>
												</span></td>";
														}
														
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
											 Total Testimonials: <?php echo ucwords(count($result));?>
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

<script type="text/javascript">
$(document).ready(function(){
 
    $('.approve').click(function(){
    q = getQueryString(this.href);
 
     $italicTagID =   $(this).find("i").attr('id');
    
        
        $.post('change_remarks.php', { id: q['id'], approved: q['approved'] }, function(data){
             
            // show the response
           // $('#response').html(data);
          
             eval(data);
            if(data.status === true){
                alert(data.text);
                //$(this).has("i").removeClass().addClass("icon-remove") ;
                rep = $('#response'+ q['id']);
                
              if($('#response'+ q['id']).text() === 'Pending Approval')
                  {
            	  $('#response'+ q['id']).html("Approved");
					   $('#'+ $italicTagID ).removeClass('icon-ok');
			              
		                 $('#'+ $italicTagID ).addClass('icon-remove');
                  }
              else{
            	  $('#response'+ q['id']).html("Pending Approval");
            		$('#'+ $italicTagID ).removeClass('icon-remove');
	         		$('#'+ $italicTagID ).addClass('icon-ok');
                  }
           
 }
            else{
				alert(data.text);
				 
                } 
             
        }).fail(function() {
         
            // just in case posting your form failed
            alert( "Failed to submit form." );
             
        });
 
        // to prevent refreshing the whole page page
        return false;
 
    });
});


function getQueryString(url){

	var vars = [], hash;
    var q = url.split('?')[1];
    if(q != undefined){
        q = q.split('&');
        for(var i = 0; i < q.length; i++){
            hash = q[i].split('=');
            vars.push(hash[1]);
            vars[hash[0]] = hash[1];
        }
}
return vars;	
}
</script>

<?php

require ('admin_footer.php');
?>


