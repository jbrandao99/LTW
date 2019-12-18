<?php
  include_once('../includes/session.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_profile.php');

  // Verify if user is logged in
  if (isset($_SESSION['username'])) {
      draw_header($_SESSION['username']);
      draw_profile();
      draw_footer();
  } else {
      die(header('Location: login.php'));
  }
