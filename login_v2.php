<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('home.php', false);}
?>
<!--
<div class="login-page">
    <div class="text-center">
       <h1>Welcome</h1>
       <p>Sign in to start your session</p>
     </div>
     <?php echo display_msg($msg); ?>
      <form method="post" action="auth_v2.php" class="clearfix">
        <div class="form-group">
              <label for="username" class="control-label">Username</label>
              <input type="name" class="form-control" name="username" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="Password" class="control-label">Password</label>
            <input type="password" name= "password" class="form-control" placeholder="password">
        </div>
        <div class="form-group">
                <button type="submit" class="btn btn-info  pull-right">Login</button>
        </div>
    </form>
</div>
-->
<!--start login contant-->
<div class="app-contant">
    <div class="bg-white">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-sm-6 col-lg-5 col-xxl-3  align-self-center order-2 order-sm-1">
                    <div class="d-flex align-items-center h-100-vh">
                        <div class="login p-50">
                            <h1 class="mb-2">HELLO</h1>
                            <p>Welcome back, please login to your account.</p>
                            <?php echo display_msg($msg); ?>
                            <form action="auth_v2.php"  class="mt-3 mt-sm-5">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="username" class="control-label">User Name*</label>
                                            <input type="text" class="form-control" name="username" placeholder="Username" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="password" class="control-label">Password*</label>
                                            <input type="password" name="password" class="form-control" placeholder="Password" />
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <a href="auth_v2.php" class="btn btn-primary text-uppercase">Sign In</a>
                                    </div>
                                    <div class="col-12  mt-3">
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php include_once('layouts/header.php'); ?>
                    </div>
                </div>
                <div class="col-sm-6 col-xxl-9 col-lg-7 bg-gradient o-hidden order-1 order-sm-2">
                    <div class="row align-items-center h-100">
                        <div class="col-7 mx-auto ">
                            <img class="img-fluid" src="assets/img/bg/login.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <!--end login contant-->
<?php include_once('layouts/header.php'); ?>
