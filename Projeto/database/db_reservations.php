<?php
   include_once('../includes/database.php');
    include_once('../database/db_user.php');
    include_once('../includes/session.php');


    function addReservation($property_id, $start, $end,$price)
  {
      $db = Database::instance()->db();
      $stmt = $db->prepare('INSERT INTO Reservations VALUES(NULL, ?, ?, ?,?,?)');
      $touristID = getUser($_SESSION['username'])['id'];
      $stmt->execute(array($touristID,$property_id,$start,$end,$price));
      return 1;
  }

  function getReservations()
 {
     $db = Database::instance()->db();
    $touristID = getUser($_SESSION['username'])['id'];
     $stmt = $db->prepare('SELECT * FROM Reservations WHERE touristID = ? ');
     $stmt->execute(array($touristID));
     return $stmt->fetchAll();
 }

   function removeReservation($reservationID)
  {
      $db = Database::instance()->db();
      $stmt = $db->prepare('DELETE FROM Reservation WHERE id =?');
      $stmt->execute(array($reservationID));
      return 1;
  }