<?php include "connect.php"; ?>
<!DOCTYPE HTML>
<html class="no-js">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title> Welcome to our Blog </title>
  <link rel="shortcut" href="images/favicon.html" />
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="plugins/mediaelement/mediaelementplayer.css" rel="stylesheet" type="text/css">
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <link href="plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet" type="text/css">
  <!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="css/ie8.css" media="screen" /><![endif]-->
  <!-- Color Style -->
  <link class="alt" href="colors/color1.css" rel="stylesheet" type="text/css">
  <link href="style-switcher/css/style-switcher.css" rel="stylesheet" type="text/css">
  <!-- SCRIPTS
    ================================================== -->
  <script src="js/modernizr.js"></script><!-- Modernizr -->
  <script>(function (d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=403202216515066";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>
</head>

<body>
  <div class="body">
    <!-- Start Site Header -->
    <header class="site-header">

      <div class="main-menu-wrapper">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <nav class="navigation">
                <ul class="sf-menu">
                  <li><a href="index.php">Home</a></li>
                  <li><a>Tags</a>
                    <ul class="dropdown">
                      <?php
                      $result = $db->prepare("SELECT * FROM tags");
                      $result->execute();
                      for ($i = 1; $row = $result->fetch(); $i++) {
                      ?>
                      <li><a href="tag.php?tagname=<?php echo $row["name"]; ?> ">
                          <?php echo $row["name"] ?>
                        </a></li>
                      <?php } ?>
                    </ul>
                  </li>
                  <li><a href="events.php">Events</a></li>
                  <li><a href="news-updates.php">News Update</a></li>
                  <li><a href="contact.php">Contact Us</a> </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </header>