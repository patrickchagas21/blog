<?php if(!class_exists('Rain\Tpl')){exit;}?><h4 class="p-title mt-30"><b>NEWS ALL</b></h4>


<div class="row">

	<?php $counter1=-1;  if( isset($posts) && ( is_array($posts) || $posts instanceof Traversable ) && sizeof($posts) ) foreach( $posts as $key1 => $value1 ){ $counter1++; ?>	

		<div class="col-sm-4">
			<a href="/posts/<?php echo htmlspecialchars( $value1["desurl"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><img src="<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="" style="border-radius: 50px;"></a>
				<h4 class="pt-20"><a href="/posts/<?php echo htmlspecialchars( $value1["desurl"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><b><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b></a></h4>
				<ul class="list-li-mr-20 pt-10 mb-30">
					<li class="color-lite-black">by <a href="#" class="color-black"><b><?php echo htmlspecialchars( $value1["publishedby"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b></a>
					<?php echo formatDate($value1["dtregister"]); ?></li>
					<li><i class="color-primary mr-5 font-12 ion-ios-bolt"></i>30,190</li>
					<li><i class="color-primary mr-5 font-12 ion-chatbubbles"></i>47</li>
				</ul>
		</div><!-- col-sm-6 -->	
	<?php } ?>

</div><!-- row -->

<nav aria-label="...">
  <ul class="pagination justify-content-center">
   	<?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>

   	
	    <li class="page-item"><a class="page-link" href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
	 
    <?php } ?>

  </ul>
</nav>