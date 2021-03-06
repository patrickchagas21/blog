<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE HTML>
<html lang="pt-br">
<head>
	<title>Blog</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	
	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Encode+Sans+Expanded:400,600,700" rel="stylesheet">
	
	<!-- Stylesheets -->
	
	<link href="/res/site/plugin-frameworks/bootstrap.css" rel="stylesheet">
	
	<link href="/res/site/fonts/ionicons.css" rel="stylesheet">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">	
	<link href="/res/site/common/styles.css" rel="stylesheet">
	<link href="/res/site/common/my-css.css" rel="stylesheet">
	
	
</head>
<body>
	
	<header>
		<div class="bg-191">
			<div class="container">	
				<div class="oflow-hidden color-ash font-9 text-sm-center ptb-sm-5">
				
					<ul class="float-left float-sm-none list-a-plr-10 list-a-plr-sm-5 list-a-ptb-15 list-a-ptb-sm-10">
						<li><a class="pl-0 pl-sm-10" href="#">About</a></li>
						<li><a href="#">Advertise</a></li>
						<li><a href="#">Submit Press Release</a></li>
						<li><a href="#">Contact</a></li>
						
						
					</ul>
					<ul class="float-right float-sm-none list-a-plr-10 list-a-plr-sm-5 list-a-ptb-15 list-a-ptb-sm-5">

						<?php if( checkLogin(false) ){ ?>

							<li><a href="/profile"><?php echo getUserName(); ?></a></li>
							<li><a href="/profile">Minha Conta</a></li>
							<li><a href="/logout"> Logout</a></li>
						<?php }else{ ?>

							<li><a href="/login">Login</a></li>
						<?php } ?>



						<li><a class="pl-0 pl-sm-10" href="#"><i class="ion-social-facebook"></i></a></li>
						<li><a href="#"><i class="ion-social-twitter"></i></a></li>
						<li><a href="#"><i class="ion-social-google"></i></a></li>
						<li><a href="#"><i class="ion-social-instagram"></i></a></li>
						<li><a href="#"><i class="ion-social-bitcoin"></i></a></li>
					</ul>

					
				</div><!-- top-menu -->
			</div><!-- container -->
		</div><!-- bg-191 -->
		
		<div class="container">
			<a class="logo" href="/"><img src="/res/site/images/logo-black.png" alt="Logo"></a>
			
			<a class="right-area src-btn" href="#" >
				<i class="active src-icn ion-search"></i>
				<i class="close-icn ion-close"></i>
			</a>
			<div class="src-form">
				<form>
					<input type="text" placeholder="Search here">
					<button type="submit"><i class="ion-search"></i></a></button>
				</form>
			</div><!-- src-form -->
			
			<a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>
			
			<ul class="main-menu" id="main-menu">
				<li><a href="#">NEWS</a></li>

				<li class="drop-down"><a href="#">CATEGORIES<i class="ion-arrow-down-b"></i></a>
					<ul class="drop-down-menu drop-down-inner">
						<?php require $this->checkTemplate("categories-menu");?>

					</ul>
				</li>


				<li><a href="#">EVENTS</a></li>
				<li><a href="#">EXPLAINED</a></li>
				<li><a href="#">CONTACT US</a></li>
			</ul>
			<div class="clearfix"></div>
		</div><!-- container -->
	</header>