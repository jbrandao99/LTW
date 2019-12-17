<?php
  include_once('../includes/session.php');
  include_once('../database/db_rental.php');
  include_once('../database/db_user.php');


  // Verify if user is logged in
  if (!isset($_SESSION['username'])) {
      die(header('Location: ../pages/login.php'));
  }

  if (deleteProperty($_GET['id'])) {
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Succesfully deleted property');
    die(header('Location: ../pages/manage.php'));
} else {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to delete property!');
    die(header('Location: ../pages/property.php'));
}