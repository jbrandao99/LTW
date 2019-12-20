<?php
  include_once('../includes/session.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_property.php');
  include_once('../database/db_properties.php');
  include_once('../database/db_user.php');


  // Verify if user is logged in
  if (!isset($_SESSION['username'])) {
      die(header('Location: login.php'));
  }
  $userid = getUser($_SESSION['username'])['id'];
  $property= getProperty($_GET['id']);
  if($userid != $property['ownerID'])
  {
  die(header('Location: search.php'));
  }



  draw_header($_SESSION['username']);
  edit_property($property);
  draw_footer();
