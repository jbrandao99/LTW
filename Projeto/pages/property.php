<?php
  include_once('../includes/session.php');
  include_once('../templates/common/tpl_common.php');
  include_once('../templates/common/tpl_property.php');
  include_once('../database/db_rental.php');

  // Verify if user is logged in
  if (!isset($_SESSION['username'])) {
      die(header('Location: login.php'));
  }

  $property = getProperty(array_values($_GET)[0]);
  
  draw_header($_SESSION['username']);
  draw_property($property);
  draw_footer();
