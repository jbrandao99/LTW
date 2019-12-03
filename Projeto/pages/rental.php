<?php 
  include_once('../includes/session.php');
  include_once('../database/db_rental.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_rental.php');
  // Verify if user is logged in
  if (!isset($_SESSION['username']))
    die(header('Location: login.php'));
  // Lists owned by the user currently logged in
  $lists = getUserLists($_SESSION['username']);
  foreach ($rentals as $k => $rental)
    $rentals[$k]['list_items'] = getListItems($rental['id']);
  draw_header($_SESSION['username']);
  draw_rental($rentals);
  draw_footer();
?>