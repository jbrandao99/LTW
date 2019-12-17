<?php
  include_once('../includes/session.php');
  include_once('../database/db_rental.php');
  include_once('../database/db_user.php');
  include_once('../database/db_reservations.php');


  // Verify if user is logged in
  if (!isset($_SESSION['username'])) {
      die(header('Location: ../pages/login.php'));
  }


  $property_id = $_POST['id'];
  $price = $_POST['price'];
  $start = $_POST['checkIn'];
  $end = $_POST['checkOut'];

  if($start>$end)
  {
      $temp = $start;
      $start = $end;
      $end = $temp;
  }

 
  
 
if (addReservation($property_id, $start, $end,$price)) {
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Succesfully added reservation');
    die(header('Location: ../pages/rental.php'));
} else {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to add reservation!');
    die(header('Location: ../pages/property.php'));
}
