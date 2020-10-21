<!DOCTYPE html>
<html>
<head>
    <title><?php echo SITE_TITLE; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<!--header-->
<section id="header">
    <div class="menu-bar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="./"><img style="max-width: 150px;" src="images/logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['email'])): ?>
                <li class="nav-item">
                  <a class="nav-link" href="dashboard.php"><i class="fa fa-user"></i> PROFILE<span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="logout.php">LOGOUT</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                  <a class="nav-link" href="login.php">LOGIN <span class="sr-only"></span></a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="register.php">REGISTER</a>
                </li>
                <?php endif; ?>
                <li class="nav-item">
                  <a class="nav-link" href="about.php">ABOUT US</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"  href="contact.php">CONTACT US</a>
                </li>
              </ul>
            </div>
          </nav>
    </div>
  </section>
</body>
</html>
