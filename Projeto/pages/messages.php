<?php
  include_once('../includes/session.php');
  include_once('../templates/common/tpl_common.php');
  include_once('../templates/common/tpl_messages.php');
  include_once('../database/db_user.php');


  // Verify if user is logged in
  if (!isset($_SESSION['username'])) {
      die(header('Location: login.php'));
  }
   
  $received = getReceivedMessages($_SESSION['username']);
  $sent = getSentMessages($_SESSION['username']);
  
  draw_header($_SESSION['username']);
  draw_messages($received);
  draw_messages($sent);
  
  draw_footer();
