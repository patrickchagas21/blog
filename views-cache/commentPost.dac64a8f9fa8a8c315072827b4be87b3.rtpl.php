<?php if(!class_exists('Rain\Tpl')){exit;}?><h4 class="p-title mt-20"><b>03 COMMENTS</b></h4>

<div class="sided-70 mb-40">

<div class="s-left rounded">
<img src="/res/site/images/profile-4.jpg" alt="">
</div><!-- s-left -->

<div class="s-right ml-100 ml-xs-85">
	<h5><b>Patrick Chagas, </b> <span class="font-8 color-ash">Nov 21, 2017</span></h5>
	<p class="mtb-15">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium 
	doloremque laudantium, totam rem aperiam.</p>
	<a class="btn-brdr-grey btn-b-sm plr-15 mr-10 mt-5" href="#"><b>LIKE</b></a>
	<a class="btn-brdr-grey btn-b-sm plr-15 mt-5" href="#"><b>REPLY</b></a>
</div><!-- s-right -->

</div><!-- sided-70 -->

<h4 class="p-title mt-20"><b>LEAVE A COMMENT</b></h4>

<form class="form-block form-plr-15 form-h-45 form-mb-20 form-brdr-lite-white mb-md-50" action="#" method="post">

	
	<input type="text" placeholder="Your Name*:" value="<?php echo getUserName(); ?>">
<?php $counter1=-1;  if( isset($user) && ( is_array($user) || $user instanceof Traversable ) && sizeof($user) ) foreach( $user as $key1 => $value1 ){ $counter1++; ?>

	<input type="text" placeholder="Your Email*:" value="<?php echo htmlspecialchars( $user["person"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

	<input type="text" placeholder="Your Phone*:">
<?php } ?>


	<textarea class="ptb-10" placeholder="Your Comment"></textarea>

	<button class="btn-fill-primary plr-30" rows="4" cols="50" type="submit"><b>LEAVE A COMMENT</b></button>
</form>