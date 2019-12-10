<?php 
  include_once('../includes/session.php');
  include_once('../templates/common/tpl_common.php');
  include_once('../templates/common/tpl_contact.php');

  // Verify if user is logged in
  if (isset($_SESSION['username']))
  {
    draw_header($_SESSION['username']);
    draw_contact();
    draw_footer();
  }
  else
  {
    draw_header(null);
    draw_contact();
    draw_footer();
  }
?>