<?php
  include_once('../includes/session.php');
  include_once('../templates/common/tpl_common.php');

  // Verify if user is logged in
  if (!isset($_SESSION['username'])) {
      die(header('Location: login.php'));
  }

  draw_header($_SESSION['username']);
  draw_footer();