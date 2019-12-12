<?php 
  include_once('../includes/session.php');
  include_once('../templates/common/tpl_common.php');
  include_once('../templates/common/tpl_auth.php');

  // Verify if user is logged in
  if (isset($_SESSION['username']))
    die(header('Location: search.php'));

  draw_header(null);
  draw_signup();
  draw_footer();
?>