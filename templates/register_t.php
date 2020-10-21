<?php include 'inc/header.php'; ?>
<head><title>RoyalJobs - Register</title></head>
<script src="css/sweetalert.min.js"></script>

<body>
	<section id="log-reg-con">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Register</h5>
                        <form class="form-signin" method="POST" action="process_reg.php">
                            <div class="form-label-group"> <input type="text" name="first_name" class="form-control" placeholder="First Name" required autofocus></div>
                            <div class="form-label-group"> <input type="text" name="last_name" class="form-control" placeholder="Last Name" required autofocus></div>
                            <div class="form-label-group"> <input type="text" name="mobile" class="form-control" placeholder="Mobile No." required autofocus></div>
                            <div class="form-label-group"> <input type="text" name="city" class="form-control" placeholder="City" required autofocus></div>
                            <div class="form-label-group"> <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus></div>
                            <div class="form-label-group"> <input type="password" name="password" class="form-control" placeholder="Password" required></div>
                            <div class="form-label-group"> <input type="password" name="passr" class="form-control" placeholder="Retype Password" required></div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Register
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