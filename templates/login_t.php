<?php include 'inc/header.php'; ?>

<head><title>RoyalJobs - Login</title></head>
<script src="css/sweetalert.min.js"></script>
<body>
<section id="log-reg-con">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sign In</h5>
                        <form class="form-signin" method="POST" action="process_login.php">
                            <div class="form-label-group"> <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus></div>
                            <div class="form-label-group"> <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required></div>
                            <div class="custom-control custom-checkbox mb-3"> <input type="checkbox" class="custom-control-input" id="customCheck1"> </br><label class="custom-control-label" for="customCheck1">Remember password?</label> </div> </br><button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                           <!-- <hr class="my-4"> <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fa fa-google mr-2"></i> Sign in with Google</button> <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fa fa-facebook-f mr-2"></i> Sign in with Facebook</button> -->
                        </form>
                        <?php displayMessage(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
</body>

<?php include 'inc/footer.php'; ?>