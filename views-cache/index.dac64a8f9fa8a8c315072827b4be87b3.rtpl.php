<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
		<div class="h-600x h-sm-auto">
			<div class="h-2-3 h-sm-auto oflow-hidden">
		
				<?php require $this->checkTemplate("featured");?>

				
				<?php require $this->checkTemplate("featured-two");?>


			</div><!-- h-2-3 -->
			
				<?php require $this->checkTemplate("featured-three");?>


		</div><!-- h-100vh -->
	</div><!-- container -->

	<section>
		<div class="container">
			<div class="row">
			
				<div class="col-md-12 col-lg-8">
					<h4 class="p-title"><b>RECENT NEWS</b></h4>
					<div class="row">
					
						<div class="col-sm-6">
							<img src="/res/site/images/recent-news-1-600x450.jpg" alt="">
							<h4 class="pt-20"><a href="#"><b>2017 Market Performance: <br/>Crypto vs.Stock</b></a></h4>
							<ul class="list-li-mr-20 pt-10 pb-20">
								<li class="color-lite-black">by <a href="#" class="color-black"><b>Olivia Capzallo,</b></a>
								Jan 25, 2018</li>
								<li><i class="color-primary mr-5 font-12 ion-ios-bolt"></i><b>30,190</b></li>
								<li><i class="color-primary mr-5 font-12 ion-chatbubbles"></i><b>47</b></li>
							</ul>
							<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium 
								doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.</p>
						</div><!-- col-sm-6 -->
						
						<div class="col-sm-6">
							<a class="oflow-hidden pos-relative mb-20 dplay-block" href="#">
								<div class="wh-100x abs-tlr"><img src="/res/site/images/polular-1-100x100.jpg" alt=""></div>
								<div class="ml-120 min-h-100x">
									<h5><b>Bitcoin Billionares Hidding in Plain Sight</b></h5>
									<h6 class="color-lite-black pt-10">by <span class="color-black"><b>Danile Palmer,</b></span> Jan 25, 2018</h6>
								</div>
							</a><!-- oflow-hidden -->
							
							<a class="oflow-hidden pos-relative mb-20 dplay-block" href="#">
								<div class="wh-100x abs-tlr"><img src="/res/site/images/polular-2-100x100.jpg" alt=""></div>
								<div class="ml-120 min-h-100x">
									<h5><b>Bitcoin Billionares Hidding in Plain Sight</b></h5>
									<h6 class="color-lite-black pt-10">by <span class="color-black"><b>Danile Palmer,</b></span> Jan 25, 2018</h6>
								</div>
							</a><!-- oflow-hidden -->
							
							<a class="oflow-hidden pos-relative mb-20 dplay-block" href="#">
								<div class="wh-100x abs-tlr"><img src="/res/site/images/polular-3-100x100.jpg" alt=""></div>
								<div class="ml-120 min-h-100x">
									<h5><b>Bitcoin Billionares Hidding in Plain Sight</b></h5>
									<h6 class="color-lite-black pt-10">by <span class="color-black"><b>Danile Palmer,</b></span> Jan 25, 2018</h6>
								</div>
							</a><!-- oflow-hidden -->
							
							<a class="oflow-hidden pos-relative mb-20 dplay-block" href="#">
								<div class="wh-100x abs-tlr"><img src="/res/site/images/polular-4-100x100.jpg" alt=""></div>
								<div class="ml-120 min-h-100x">
									<h5><b>Bitcoin Billionares Hidding in Plain Sight</b></h5>
									<h6 class="color-lite-black pt-10">by <span class="color-black"><b>Danile Palmer,</b></span> Jan 25, 2018</h6>
								</div>
							</a><!-- oflow-hidden -->
						</div><!-- col-sm-6 -->
						
					</div><!-- row -->
						
					<?php require $this->checkTemplate("newsall");?>	

					
					
				</div><!-- col-md-9 -->
				
				<div class="d-none d-md-block d-lg-none col-md-3"></div>
				<div class="col-md-6 col-lg-4">
					<div class="pl-20 pl-md-0">
						<ul class="list-block list-li-ptb-15 list-btm-border-white bg-primary text-center">
							<?php require $this->checkTemplate("categories-menu");?>

						</ul>

						<div class="mtb-50">
							<?php require $this->checkTemplate("visitors");?>							
						</div><!-- mtb-50 -->
					
						<div class="mtb-50">
							<?php require $this->checkTemplate("popularPosts");?>							
						</div><!-- mtb-50 -->
												
						<div class="mtb-50 pos-relative">
							<img src="/res/site/images/banner-1-600x450.jpg" alt="">
							<div class="abs-tblr bg-layer-7 text-center color-white">
								<div class="dplay-tbl">
									<div class="dplay-tbl-cell">
										<h4><b>Available for mobile & desktop</b></h4>
										<a class="mt-15 color-primary link-brdr-btm-primary" href="#"><b>Download for free</b></a>
									</div><!-- dplay-tbl-cell -->
								</div><!-- dplay-tbl -->
							</div><!-- abs-tblr -->
						</div><!-- mtb-50 -->
						
						<?php require $this->checkTemplate("newsLetter");?>

						
					</div><!--  pl-20 -->
				</div><!-- col-md-3 -->
				
			</div><!-- row -->
		</div><!-- container -->
	</section>