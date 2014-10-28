
<?php  //echo BASE_URL; ?>

<?php
$conn = $mc->db->get_pdo_connection ();
$banners = $mc->getFAQs ( $conn, 0, 10 );
// print_r($banners);

?>

<div class="four columns fast-anim flyIn">
<?php foreach ($banners as $f):?>
	
	
<div class="question-holder">
	<div class="question">
		<i class="entypo circled-help text-white">&nbsp;</i><span
			class="text-white"><?php echo $f['title'];?></span><i
			class="entypo chevron-thin-down text-white show-question"></i>
	</div>
	<div class="answer animated">
		<p>
						<?php echo $f['details'];?>
							</p>
	</div>
</div>


<?php endforeach;?>
 


</div>
<!-- 

<div class="question-holder">
				<div class="question">
					<i class="entypo circled-help text-white">&nbsp;</i><span class="text-white">How can I make payment?</span><i class="entypo chevron-thin-down text-white show-question"></i>
				</div>
				<div class="answer animated">
					<p>
						At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. 
					</p>
				</div>	
			</div>
			
			<div class="question-holder">
				<div class="question">
					<i class="entypo circled-help text-white">&nbsp;</i><span class="text-white">Is payment recurring?</span><i class="entypo chevron-thin-down text-white show-question"></i>
				</div>
				<div class="answer animated">
					<p>
						At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. 
					</p>
				</div>	
			</div>

		
		</div>
		
		<div class="four columns flyIn">
	
			<div class="question-holder">
				<div class="question">
					<i class="entypo circled-help text-white">&nbsp;</i><span class="text-white">Can I use Android?</span><i class="entypo chevron-thin-down text-white show-question"></i>
				</div>
				<div class="answer animated">
					<p>
						At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. 
					</p>
				</div>	
			</div>
			
			<div class="question-holder">
				<div class="question">
					<i class="entypo circled-help text-white">&nbsp;</i><span class="text-white">How secure is my data?</span><i class="entypo chevron-thin-down text-white show-question"></i>
				</div>
				<div class="answer animated">
					<p>
						At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. 
					</p>
				</div>	
			</div>

		
		</div>
		
		<div class="four columns slow-anim flyIn">
	
			<div class="question-holder">
				<div class="question">
					<i class="entypo circled-help text-white">&nbsp;</i><span class="text-white">Is there a trial period?</span><i class="entypo chevron-thin-down text-white show-question"></i>
				</div>
				<div class="answer animated">
					<p>
						At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. 
					</p>
				</div>	
			</div>
			
			<div class="question-holder">
				<div class="question">
					<i class="entypo circled-help text-white">&nbsp;</i><span class="text-white">Will you marry me?</span><i class="entypo chevron-thin-down text-white show-question"></i>
				</div>
				<div class="answer animated">
					<p>
						At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. 
					</p>
				</div>	
			</div>


-->


 