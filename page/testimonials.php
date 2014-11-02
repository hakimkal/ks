<?php include(dirname(dirname(__FILE__)).'/includes/app_controller.php');?>
 
 <?php
//print_r($_SESSION);
 $testimonials  = $mc->getUserTestimonies();
//print_r( $mc->getUser(1));
 //print_r($testimonials);

?>

<ul class="slides">
<?php foreach($testimonials as $t):?>
				<li>

				<div class="single-testimonial"> <span class="doner"> <a href="javascript:void(0);" class="thumb"> <img src="img/thumbnails/p1.jpg" width="80" height="80" > </a> <span class="name"><strong><?php echo $t['firstname']. ' ' . $t['lastname'];?></strong> <br>
						<cite title="<?php echo $t['designation'];?>"><?php echo $t['designation'];?><br>
						</cite></span> </span>
						<blockquote>
							<p><?php echo $t['remark'];?></p>
						</blockquote>
					</div>
				</li>
				 
				 <?php endforeach;?>
				 
</ul>
			
			<?php 
			
			/*
			 <ul class="slides">
				<li>
					<div class="single-testimonial"> <span class="doner"> <a href="javascript:void(0);" class="thumb"> <img src="img/thumbnails/p1.jpg" width="80" height="80" > </a> <span class="name"><strong>Name Here</strong> <br>
						<cite title="Chief Executive Officer (CEO)">Designation <br>
						</cite></span> </span>
						<blockquote>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						</blockquote>
					</div>
				</li>
				<li>
					<div class="single-testimonial"> <span class="doner"> <a href="javascript:void(0);" class="thumb"> <img src="img/thumbnails/p1.jpg" width="80" height="80" > </a> <span class="name"><strong>Name Here</strong> <br>
						<cite title="Chief Executive Officer (CEO)">Designation <br>
						</cite></span> </span>
						<blockquote>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						</blockquote>
					</div>
				</li>
				<li>
					<div class="single-testimonial"> <span class="doner"> <a href="javascript:void(0);" class="thumb"> <img src="img/thumbnails/p1.jpg" width="80" height="80" > </a> <span class="name"><strong>Name Here</strong> <br>
						<cite title="Chief Executive Officer (CEO)">Designation <br>
						</cite></span> </span>
						<blockquote>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						</blockquote>
					</div>
				</li>
				<li>
					<div class="single-testimonial"> <span class="doner"> <a href="javascript:void(0);" class="thumb"> <img src="img/thumbnails/p1.jpg" width="80" height="80" > </a> <span class="name"><strong>Name Here</strong> <br>
						<cite title="Chief Executive Officer (CEO)">Designation <br>
						</cite></span> </span>
						<blockquote>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						</blockquote>
					</div>
				</li>
				<li>
					<div class="single-testimonial"> <span class="doner"> <a href="javascript:void(0);" class="thumb"> <img src="img/thumbnails/p1.jpg" width="80" height="80" > </a> <span class="name"><strong>Name Here</strong> <br>
						<cite title="Chief Executive Officer (CEO)">Designation <br>
						</cite></span> </span>
						<blockquote>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						</blockquote>
					</div>
				</li>
				<li>
					<div class="single-testimonial"> <span class="doner"> <a href="javascript:void(0);" class="thumb"> <img src="img/thumbnails/p1.jpg" width="80" height="80" > </a> <span class="name"><strong>Name Here</strong> <br>
						<cite title="Chief Executive Officer (CEO)">Designation <br>
						</cite></span> </span>
						<blockquote>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						</blockquote>
					</div>
				</li>
			</ul>
			 * 
			 */
			
			?>