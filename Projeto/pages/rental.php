<?php 
  include_once('../includes/session.php');
  include_once('../templates/common/tpl_common.php');
  include_once('../templates/common/tpl_rental.php');
  include_once('../database/db_rental.php');


  // Verify if user is logged in
  if (!isset($_SESSION['username']))
  {
   die(header('Location: login.php'));
  }
   
  $rentals = getAllProperties();
  
  draw_header($_SESSION['username']);
  draw_rentals($rentals);
  draw_footer();
?>