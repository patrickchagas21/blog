<?php if(!class_exists('Rain\Tpl')){exit;}?><style type="text/css">
    .login-big-title-area {
        background: url("/res/site/images/crossword.png") repeat scroll 0 0 #e67e22;
        width: 100%;
    }
    .login-bit-title h2 {
      font-family: raleway;
      font-size: 50px;
      font-weight: 200;
      margin: 0;
      padding: 50px 0;
      color: #fff
    }

</style>

<div class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">

				 <div class="login-big-title-area ">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="login-bit-title text-center">
                                    <h2>Register</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


				<div class="card-wrapper">
					<div class="brand">
						<img src="/res/site/images/logo.jpg">
					</div>

					<?php if( $errorRegister != '' ){ ?>

	                    <div class="alert alert-danger">
	                        <?php echo htmlspecialchars( $errorRegister, ENT_COMPAT, 'UTF-8', FALSE ); ?>

	                    </div>
	                <?php } ?> 

					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Register</h4>
							<form action="/register" method="post">
							 
								<div class="form-group">
									<label for="name">Name</label>
									<input id="name" type="text" class="form-control" name="name"  value="<?php echo htmlspecialchars( $registerValues["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
								</div>

								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" value="<?php echo htmlspecialchars( $registerValues["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
								</div>

								<div class="form-group">
									<label for="phone">Phone</label>
									<input id="phone" type="phone" class="form-control" name="phone" value="<?php echo htmlspecialchars( $registerValues["phone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
								</div>

								<div class="form-group">
									<label for="despassword">Password</label>
									<input id="despassword" type="password" class="form-control" name="despassword" data-eye>
								</div>

								<div class="form-group">
									<label>
										<input type="checkbox" name="aggree" value="1"> I agree to the Terms and Conditions
									</label>
								</div>

								<div class="form-group no-margin">
									<button type="submit" class="btn btn-primary btn-block">
										Register
									</button>
								</div>
								<div class="margin-top20 text-center">
									Already have an account? <a href="/login">Login</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
