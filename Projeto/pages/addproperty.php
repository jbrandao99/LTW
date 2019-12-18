<?php
  include_once('../includes/session.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_property.php');
  include_once('../database/db_properties.php');

  // Verify if user is logged in
  if (!isset($_SESSION['username'])) {
      die(header('Location: login.php'));
  }
  
  draw_header($_SESSION['username']);
  add_property();
  draw_footer();
