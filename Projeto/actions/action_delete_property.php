<?php
  include_once('../includes/session.php');
  include_once('../database/db_properties.php');
  include_once('../database/db_user.php');


  // Verify if user is logged in
  if (!isset($_SESSION['username'])) {
      die(header('Location: ../pages/login.php'));
  }
  $userid = getUser($_SESSION['username'])['id'];
  $propertyowner = getProperty($_GET['id'])['ownerID'];
  if($userid != $propertyowner)
  {
  die(header('Location: search.php'));
  }
  if (!(deleteProperty($_GET['id']))) {
      $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Succesfully deleted property');
      die(header('Location: ../pages/manage.php'));
  } else {
      $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to delete property!');
      die(header('Location: ../pages/property.php'));
  }
