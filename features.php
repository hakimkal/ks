	<?php $features =  $mc->getPackages(1);?>
<a id="features-scroll"></a>
<section id="feature-list" class="even-section">

	<div
		class="row inner-section section-preamble text-center animated fadeInDown">
		<h2>These features will make you squeal.</h2>

		<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque
			nihil impedit quo minus id quod maxime.</p>
		<div class="hr"></div>
	</div>

	<div class="row feature-row inner-section flyIn">
	
<?php unset($_SESSION['cart']);?>
<?php for($i = 0; $i< count($features);$i++):?>
	<?php 	if($i+1 % 4 !=0):?>
<div class="three columns feature text-center">
		<?php if($_SERVER['SERVER_NAME'] =='localhost'):?>
			<img alt="<?php echo $features[$i]['title'];?> Icon"
				src="<?php  echo BASE_URL.str_replace($_SERVER['DOCUMENT_ROOT'],"/", $features[$i]['image_path']); ?>" /> 
		<?php else:?>
			<img alt="<?php echo $features[$i]['title'];?> Icon"
				src="<?php  echo str_replace($_SERVER['DOCUMENT_ROOT'],"/", $features[$i]['image_path']); ?>" /> 
		
		<?php endif;?>				
			</br>
			<h4 class="alt-h"><?php echo $features[$i]['p_title'];?></h4>

			<p>
	
		 
				</p>


		</div>
<?php endif;?>
		<?php endfor;?>
		
		</div>


</section>

<a id="gallery-scroll"></a>


<section id="newsletter">

	<div class="row inner-section">
		<div class="seven columns">
			<i class="entypo newspaper">&nbsp;</i>
			<div id="newsletter-text">
				<h3 class="text-white">Keep up to date with our latest deals and
					happenings, you know you want to!</h3>
			</div>
		</div>


		<div class="five columns">
			<div class="details-error-wrap hide">Please enter a valid email
				address</div>
			<input class="newsletter-email left" type="text"
				placeholder="Your Email Address" /> <input
				class="newsletter-btn left btn form-send" type="submit"
				value="Subscribe" />
			<div class="hide green-btn newsletter-btn left btn form-sent">Subscribed</div>
		</div>

	</div>

</section>

<!-- Adding features from database -->


<a id="pricing-scroll"></a>
<section id="pricing" class="even-section">

	<div class="row inner-section section-preamble text-center flyIn">
		<h2>Awesome features that wont break the bank.</h2>

		<p>Temporibus autem quibusdam et aut officiis recusandae. Itaque earum
			rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus
			maiores alias consequatur aut perferendis doloribus asperiores
			repellat</p>
		<div class="hr"></div>
	</div>

	<div class="row inner-section">
	<?php // print_r($features);?>
	<?php
	// $li ="";
	// for($i = 0; $i< count($features);$i++):	?>
	 
	<?php
	
	// $li.$i .="<li>". $features[$i]['feature']."</li>";
	?>
	 
	<?php //endfor;?>
	
	<?php for($i = 0; $i< count($features);$i++):?>
	<?php 	if($i+1 % 4 !=0):?>
	<?php $_SESSION['cart'][$i]['item_name'] = $features[$i]['title'];?>
			<?php $_SESSION['cart'][$i]['item_id'] = $features[$i]['id'];?>
			<?php $_SESSION['cart'][$i]['price']  = $features[$i]['price'];?>
		<?php $_SESSION['cart'][$i]['sms_unit']  = $features[$i]['p_sms_unit'];?>
		
		<div class="three columns price-table text-center fast-anim flyIn">
			<div class="price-heading">
				<h4 class="text-white"><?php echo $features[$i]['title'];?></h4>
			</div>

			<div class="price-amount">
				<h2 class="text-white">$<?php echo $features[$i]['price'];?> p/m</h2>
			</div>

			<ul class="price-details">
			 
			
			 		<?php
			
			echo str_replace ( ",", "", $features [$i] ['feature'] );
			?>
				 
				 
			 
			
			</ul>
			<div class="price-purchase">
				<a
					href="checkout.php?item=<?php echo $i;?>&item_id=<?php echo $features[$i]['id'];?>&item_price=<?php echo $features[$i]['price'];?>"><div
						class="red-btn btn">Buy Now</div></a>
			</div>
		</div>
		<?php endif;?>
		<?php endfor;?>
		
		 
		
		 
		
		
	</div>

</section>
