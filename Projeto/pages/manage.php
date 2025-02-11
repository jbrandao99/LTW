<?php
  include_once('../includes/session.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_rental.php');
  include_once('../database/db_properties.php');


  // Verify if user is logged in
  if (!isset($_SESSION['username'])) {
      die(header('Location: login.php'));
  }
   
  $rentals = getProperties($_SESSION['username']);
  
  draw_header($_SESSION['username']);
  draw_rentals($rentals);
  draw_add();

  draw_footer();
