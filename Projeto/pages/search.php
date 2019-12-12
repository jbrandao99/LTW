<?php 
  include_once('../includes/session.php');
  include_once('../templates/common/tpl_common.php');
  include_once('../templates/common/tpl_search.php');

  // Verify if user is logged in
  if (isset($_SESSION['username']))
  {
    draw_header($_SESSION['username']);
    draw_search();
    draw_footer();
  }
  else
  {
    die(header('Location: login.php'));
  }
?>