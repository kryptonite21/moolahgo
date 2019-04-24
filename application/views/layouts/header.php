<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Moohlahgo | Calculator</title>

    <link rel="icon" href="<?php echo BASE_URL; ?>/public/logo/moolahgo_logo.png">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/startbootstrap/css/bootstrap.min.css">


    <!-- Custom CSS -->
    <link href="<?php echo BASE_URL; ?>/public/startbootstrap/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo BASE_URL; ?>/public/startbootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="<?php echo BASE_URL; ?>/public/jquery/jquery-3.4.0.min.js"></script>


        <!-- Latest compiled and minified JavaScript -->
        <script src="<?php echo BASE_URL; ?>/public/startbootstrap/js/bootstrap.min.js"></script>

</head>
<body>
<?php
$uri = $_SERVER['REQUEST_URI'];
?>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo BASE_URL; ?>">Moolahgo</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php echo (strpos($uri, 'site/howitworks') !== false) ? 'class="active"' : ''; ?>>
          <a href="<?php echo BASE_URL; ?>?url=site/howitworks">How it Works</a>
        </li>
        <li <?php echo (strpos($uri, 'site/aboutus') !== false) ? 'class="active"' : ''; ?>>
          <a href="<?php echo BASE_URL; ?>?url=site/aboutus">About Us</a>
        </li>
        <li <?php echo (strpos($uri, 'site/help') !== false) ? 'class="active"' : ''; ?>>
          <a href="<?php echo BASE_URL; ?>?url=site/help">Help</a>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li <?php echo (strpos($uri, 'site/login') !== false) ? 'class="active"' : ''; ?>>
          <a href="<?php echo BASE_URL; ?>?url=site/login">Login</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


