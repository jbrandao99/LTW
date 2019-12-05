<?php 
  include_once('../includes/session.php');
  include_once('../templates/common/tpl_common.php');
  include_once('../templates/common/tpl_aboutus.php');

  // Verify if user is logged in
  if (!isset($_SESSION['username']))
    die(header('Location: rental.php'));

  draw_header(null);
  draw_aboutus();
  draw_footer();
?>