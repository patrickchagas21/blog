<?php if(!class_exists('Rain\Tpl')){exit;}?>

<style type="text/css">
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
                                    <h2>Autenticação</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-wrapper">
                    <div class="brand">
                        <img src="/res/site/images/logo.jpg">
                    </div>

                    <?php if( $error != '' ){ ?>

                        <div class="alert alert-danger">
                            <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>

                        </div>
                    <?php } ?>    
                        
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Login</h4>
                            <form action="/login" method="post">

                                <div class="form-group">
                                    <label for="login">E-mail*</label>

                                    <input id="text" type="login" class="form-control" name="login" value="" required autofocus>
                                </div>

                                <div class="form-group">
                                    <label for="despassword">Password*
                                        <a href="/forgot" class="float-right">
                                            Forgot Password?
                                        </a>
                                    </label>
                                    <input id="despassword" name="despassword" type="password" class="form-control" name="despassword" required data-eye>
                                </div>

                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>

                                <div class="form-group no-margin">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Login
                                    </button>
                                </div>
                                <div class="margin-top20 text-center">
                                    Don't have an account? <a href="/register">Create One</a>
                                </div>
                            </form>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </section>
 </div>   