<?php
   include_once('../includes/database.php');
    include_once('../database/db_user.php');
    include_once('../includes/session.php');


    function addReservation($property_id, $start, $end,$price)
  {
      $db = Database::instance()->db();
      $stmt = $db->prepare('INSERT INTO Reservations VALUES(NULL, ?, ?, ?,?,?)');
      $stmt->execute(array($_SESSION['username'],$property_id,$start,$end,$price));
      return 1;
  }