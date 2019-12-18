<?php
  include_once('../includes/session.php');
  include_once('../database/db_properties.php');
  include_once('../database/db_user.php');
  include_once('../database/db_reservations.php');


  // Verify if user is logged in
  if (!isset($_SESSION['username'])) {
      die(header('Location: ../pages/login.php'));
  }

  $property_id = $_POST['id'];
  $priceperday = $_POST['price'];
  $start = $_POST['checkIn'];
  $end = $_POST['checkOut'];
  $property = getProperty($property_id);

  if ($start>$end) {
      $temp = $start;
      $start = $end;
      $end = $temp;
  }
  $date1 = new DateTime($start);
  $date2 = new DateTime($end);

  $interval = $date1->diff($date2);
  $price = $interval->days * $priceperday ;

if (addReservation($property_id, $start, $end, $price)) {
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'You have succesfully reserved '.$property['title']);
    die(header('Location: ../pages/reservations.php'));
} else {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => $property['title'].' is already reserved during those days!');
    die(header('Location: ../pages/property.php?id='.$property_id));
}
