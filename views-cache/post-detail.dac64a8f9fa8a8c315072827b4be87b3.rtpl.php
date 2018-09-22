<?php if(!class_exists('Rain\Tpl')){exit;}?>
		
		
	
	
	<section class="ptb-0">
		<div class="mb-30 brdr-ash-1 opacty-5"></div>
		<div class="container">
			<a class="mt-10" href="/"><i class="mr-5 ion-ios-home"></i>Home<i class="mlr-10 ion-chevron-right"></i></a>
			<a class="mt-10" href="/">Blog Archive<i class="mlr-10 ion-chevron-right"></i></a>
			<a class="mt-10 color-ash" href="single-page.html">Single Blog</a>
		</div><!-- container -->
	</section>
	
	
	<section>
		<div class="container">
			<div class="row">
			
				<div class="col-md-12 col-lg-8">
					<img src="<?php echo htmlspecialchars( $post["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="">
					<h3 class="mt-30"><b><?php echo htmlspecialchars( $post["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b></h3>
					<ul class="list-li-mr-20 mtb-15">
						<li>by <a href="#"><b>Olivia Capzallo </b></a> <?php echo formatDate($post["dtregister"]); ?></li>
						<li><i class="color-primary mr-5 font-12 ion-ios-bolt"></i>30,190</li>
						<li><i class="color-primary mr-5 font-12 ion-chatbubbles"></i>30</li>
					</ul>
					
					<p>RSK is launching its bitcoins smart contracts platform in beta today.</p>
					
					<p class="mtb-20"><?php echo htmlspecialchars( $post["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
						

					<div class="quote-primary mtb-20">
						<h5>"This Is the first time that there's going to be a smart contract platform powered by the bitcoin network."</h5>
						<h5 class="mt-15"><b>Oliver Dale</b></h5>
					</div><!-- quote-primary -->
					
					<h4><b>How to Buy Powerledger POWR</b></h4>
					
					<p class="mtb-15">You are not able to purchase POWR with "Fiat" currency so you will need to first purchase another 
						currency - the easiest to buy are Bitcoin or Ethereum which you can do at Coinbase using a bank transfer or 
						debit / credit card purchase and then swap that for POWR at an exchange such as Binance.</p>
					
					<p class="mtb-15">You will have to carry out some identity verification when signing up as they have 
						to adhere to strict financial guidelines. Make sure you use our link to signup you will be 
						credited with $10 in free bitcoin when you make your first purchase of $100 </p>
					
					<div class="float-left-right text-center mt-40 mt-sm-20">
				
						<ul class="mb-30 list-li-mt-10 list-li-mr-5 list-a-plr-15 list-a-ptb-7 list-a-bg-grey list-a-br-2 list-a-hvr-primary ">

							<?php $counter1=-1;  if( isset($categories) && ( is_array($categories) || $categories instanceof Traversable ) && sizeof($categories) ) foreach( $categories as $key1 => $value1 ){ $counter1++; ?>
								<li><a href="/categories/<?php echo htmlspecialchars( $value1["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
							<?php } ?>
						</ul>
						<ul class="mb-30 list-a-bg-grey list-a-hw-radial-35 list-a-hvr-primary list-li-ml-5">
							<li class="mr-10 ml-0">Share</li>
							<li><a href="#"><i class="ion-social-facebook"></i></a></li>
							<li><a href="#"><i class="ion-social-twitter"></i></a></li>
							<li><a href="#"><i class="ion-social-google"></i></a></li>
							<li><a href="#"><i class="ion-social-instagram"></i></a></li>
						</ul>
						
					</div><!-- float-left-right -->
				
					<div class="brdr-ash-1 opacty-5"></div>
					
					<h4 class="p-title mt-50"><b>YOU MAY ALSO LIKE</b></h4>
					<div class="row">
					
						<div class="col-sm-6">
							<img src="images/crypto-news-2-600x450.jpg" alt="">
							<h4 class="pt-20"><a href="#"><b>2017 Market Performance: <br/>Crypto vs.Stock</b></a></h4>
							<ul class="list-li-mr-20 pt-10 mb-30">
								<li class="color-lite-black">by <a href="#" class="color-black"><b>Olivia Capzallo,</b></a>
								Jan 25, 2018</li>
								<li><i class="color-primary mr-5 font-12 ion-ios-bolt"></i>30,190</li>
								<li><i class="color-primary mr-5 font-12 ion-chatbubbles"></i>47</li>
							</ul>
						</div><!-- col-sm-6 -->
						
						<div class="col-sm-6">
							<img src="images/crypto-news-1-600x450.jpg" alt="">
							<h4 class="pt-20"><a href="#"><b>2017 Market Performance: Crypto vs.Stock</b></a></h4>
							<ul class="list-li-mr-20 pt-10 mb-30">
								<li class="color-lite-black">by <a href="#" class="color-black"><b>Olivia Capzallo,</b></a>
								Jan 25, 2018</li>
								<li><i class="color-primary mr-5 font-12 ion-ios-bolt"></i>30,190</li>
								<li><i class="color-primary mr-5 font-12 ion-chatbubbles"></i>47</li>
							</ul>
						</div><!-- col-sm-6 -->
						
					</div><!-- row -->
					
					<h4 class="p-title mt-20"><b>03 COMMENTS</b></h4>
					
					<div class="sided-70 mb-40">
					
						<div class="s-left rounded">
							<img src="images/profile-3-120x120.jpg" alt="">
						</div><!-- s-left -->
						
						<div class="s-right ml-100 ml-xs-85">
							<h5><b>Shuhein Chui, </b> <span class="font-8 color-ash">Nov 21, 2017</span></h5>
							<p class="mtb-15">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium 
								doloremque laudantium, totam rem aperiam.</p>
							<a class="btn-brdr-grey btn-b-sm plr-15 mr-10 mt-5" href="#"><b>LIKE</b></a>
							<a class="btn-brdr-grey btn-b-sm plr-15 mt-5" href="#"><b>REPLY</b></a>
						</div><!-- s-right -->
						
					</div><!-- sided-70 -->
					
					<div class="sided-70 ml-100 ml-xs-20 mb-40">
					
						<div class="s-left rounded">
							<img src="images/profile-1-120x120.jpg" alt="">
						</div><!-- s-left -->
						
						<div class="s-right ml-100 ml-xs-85">
							<h5><b>Shuhein Chui, </b> <span class="font-8 color-ash">Nov 21, 2017</span></h5>
							<p class="mtb-10">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium 
								doloremque laudantium, totam rem aperiam.</p>
							<a class="btn-brdr-grey btn-b-sm plr-15 mr-10 mt-5" href="#"><b>LIKE</b></a>
							<a class="btn-brdr-grey btn-b-sm plr-15 mt-5" href="#"><b>REPLY</b></a>
						</div><!-- s-right -->
						
					</div><!-- sided-70 -->
					
					<div class="sided-70 mb-50">
					
						<div class="s-left rounded">
							<img src="images/profile-2-120x120.jpg" alt="">
						</div><!-- s-left -->
						
						<div class="s-right ml-100 ml-xs-85">
							<h5><b>Shuhein Chui, </b> <span class="font-8 color-ash">Nov 21, 2017</span></h5>
							<p class="mt-10 mb-15">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium 
								doloremque laudantium, totam rem aperiam.</p>
							<a class="btn-brdr-grey btn-b-sm plr-15 mr-10" href="#"><b>LIKE</b></a>
							<a class="btn-brdr-grey btn-b-sm plr-15" href="#"><b>REPLY</b></a>
						</div><!-- s-right -->
						
					</div><!-- sided-70 -->
					
					<h4 class="p-title mt-20"><b>LEAVE A COMMENT</b></h4>
					
					<form class="form-block form-plr-15 form-h-45 form-mb-20 form-brdr-lite-white mb-md-50">
						<input type="text" placeholder="Your Name*:">
						<input type="text" placeholder="Your Email*:">
						<input type="text" placeholder="Your Phone*:">
						<textarea class="ptb-10" placeholder="Your Comment"></textarea>
						<button class="btn-fill-primary plr-30" rows="4" cols="50" type="submit"><b>LEAVE A COMMENT</b></button>
					</form>
				</div><!-- col-md-9 -->
				
				<div class="d-none d-md-block d-lg-none col-md-3"></div>
				<div class="col-md-6 col-lg-4">
					<div class="pl-20 pl-md-0">
						<ul class="list-block list-li-ptb-15 list-btm-border-white bg-primary text-center">
							<?php require $this->checkTemplate("categories-menu");?>
						</ul>
						
						<div class="mtb-50">
							<h4 class="p-title"><b>POPULAR POSTS</b></h4>
							<a class="oflow-hidden pos-relative mb-20 dplay-block" href="#">
								<div class="wh-100x abs-tlr"><img src="images/polular-1-100x100.jpg" alt=""></div>
								<div class="ml-120 min-h-100x">
									<h5><b>Bitcoin Billionares Hidding in Plain Sight</b></h5>
									<h6 class="color-lite-black pt-10">by <span class="color-black"><b>Danile Palmer,</b></span> Jan 25, 2018</h6>
								</div>
							</a><!-- oflow-hidden -->
							
							<a class="oflow-hidden pos-relative mb-20 dplay-block" href="#">
								<div class="wh-100x abs-tlr"><img src="images/polular-2-100x100.jpg" alt=""></div>
								<div class="ml-120 min-h-100x">
									<h5><b>Bitcoin Billionares Hidding in Plain Sight</b></h5>
									<h6 class="color-lite-black pt-10">by <span class="color-black"><b>Danile Palmer,</b></span> Jan 25, 2018</h6>
								</div>
							</a><!-- oflow-hidden -->
							
							<a class="oflow-hidden pos-relative mb-20 dplay-block" href="#">
								<div class="wh-100x abs-tlr"><img src="images/polular-3-100x100.jpg" alt=""></div>
								<div class="ml-120 min-h-100x">
									<h5><b>Bitcoin Billionares Hidding in Plain Sight</b></h5>
									<h6 class="color-lite-black pt-10">by <span class="color-black"><b>Danile Palmer,</b></span> Jan 25, 2018</h6>
								</div>
							</a><!-- oflow-hidden -->
							
							<a class="oflow-hidden pos-relative mb-20 dplay-block" href="#">
								<div class="wh-100x abs-tlr"><img src="images/polular-4-100x100.jpg" alt=""></div>
								<div class="ml-120 min-h-100x">
									<h5><b>Bitcoin Billionares Hidding in Plain Sight</b></h5>
									<h6 class="color-lite-black pt-10">by <span class="color-black"><b>Danile Palmer,</b></span> Jan 25, 2018</h6>
								</div>
							</a><!-- oflow-hidden -->
							
						</div><!-- mtb-50 -->
						
						<div class="mtb-50 pos-relative">
							<img src="images/banner-1-600x450.jpg" alt="">
							<div class="abs-tblr bg-layer-7 text-center color-white">
								<div class="dplay-tbl">
									<div class="dplay-tbl-cell">
										<h4><b>Available for mobile & desktop</b></h4>
										<a class="mt-15 color-primary link-brdr-btm-primary" href="#"><b>Download for free</b></a>
									</div><!-- dplay-tbl-cell -->
								</div><!-- dplay-tbl -->
							</div><!-- abs-tblr -->
						</div><!-- mtb-50 -->
						
						<div class="mtb-50 mb-md-0">
							<h4 class="p-title"><b>NEWSLETTER</b></h4>
							<p class="mb-20">Subscribe to our newsletter to get notification about new updates,
								information, discount, etc..</p>
							<form class="nwsltr-primary-1">
								<input type="text" placeholder="Your email"/>
								<button type="submit"><i class="ion-ios-paperplane"></i></button>
							</form>
						</div><!-- mtb-50 -->
						
					</div><!--  pl-20 -->
				</div><!-- col-md-3 -->
				
			</div><!-- row -->
			
		</div><!-- container -->
	</section>
