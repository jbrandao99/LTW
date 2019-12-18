<?php
  include_once('../includes/session.php');
  include_once('../templates/common/tpl_common.php');
  include_once('../templates/common/tpl_reservations.php');
  include_once('../database/db_reservations.php');

  // Verify if user is logged in
  if (!isset($_SESSION['username'])) {
      die(header('Location: login.php'));
  }

  $reservations = getReservations();
  draw_header($_SESSION['username']);
  draw_userReservations($reservations);
  draw_footer();
