<?php function draw_header($username)
{
    /**
     * Draws the header for all pages. Receives an username
     * if the user is logged in in order to draw the logout
     * link.
     */?>
  <!DOCTYPE html>
  <html>

    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/auth.css">
    <link rel="stylesheet" type="text/css" href="../css/profile.css">
    <link rel="stylesheet" type="text/css" href="../css/aboutus.css">
    <link rel="stylesheet" type="text/css" href="../css/rental.css">
    <link rel="stylesheet" type="text/css" href="../css/property.css">
    <link rel="stylesheet" type="text/css" href="../css/contact.css">
    <link rel="stylesheet" type="text/css" href="../css/search.css">
    <link rel="shortcut icon" href="../images/site/accusoft.png">
    <script src="https://kit.fontawesome.com/bb66e67d26.js" crossorigin="anonymous"></script>
    
</head>

    <body>

      <header class="main_header">
        <nav>
        <?php if ($username != null) { ?>
          <ul id="header_links">
              <li><h1><a href="login.php" ><i class="fab fa-accusoft"></i> Rent-a-Place</a></h1></li>
              <li class="right_links"><a id="logout" href="../actions/action_logout.php">Logout</a></li>
              <li class="right_links"><a href="profile.php"><?=$username?></a></li>
              <li class="right_links"><a href="reservations.php">Reservations</a></li>
              <li class="right_links"><a href="manage.php">My Places</a></li>
            </ul>
        <?php } else { ?>
          <ul id="header_links">
              <li><h1><a href="login.php" ><i class="fab fa-accusoft"></i> Rent-a-Place</a></h1></li>
            </ul>
        <?php  } ?>
        </nav>
      </header>
      <?php if (isset($_SESSION['messages'])) {?>
        <section id="messages">
          <?php foreach ($_SESSION['messages'] as $message) { ?>
            <div class="<?=$message['type']?>"><?=$message['content']?></div>
          <?php } ?>
        </section>
      <?php unset($_SESSION['messages']); } ?>
<?php
} ?>

<?php function draw_footer()
    {
        /**
         * Draws the footer for all pages.
         */ ?>
    <footer class="main_footer">
        <ul id="footer_links">
            <li>
            &copy; 2019 Rent-a-Place
            </li> 
            <li class="footer_right">
                <a href="aboutus.php">About Us</a>
            </li>
            <li class="footer_right">
                <a href="contact.php">Contact</a>
            </li>
        </ul>
    </footer>
  </body>
</html>
<?php
    } ?>