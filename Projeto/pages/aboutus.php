<?php
  include_once('../includes/session.php');
  include_once('../templates/common/tpl_common.php');
  include_once('../templates/common/tpl_aboutus.php');

  // Verify if user is logged in
  if (isset($_SESSION['username'])) {
      draw_header($_SESSION['username']);
      draw_aboutus();
      draw_footer();
  } else {
      draw_header(null);
      draw_aboutus();
      draw_footer();
  }
