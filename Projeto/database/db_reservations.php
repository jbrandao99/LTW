<?php
    include_once('../includes/database.php');
    include_once('../database/db_user.php');
    include_once('../database/db_properties.php');
    include_once('../includes/session.php');


    function addReservation($property_id, $start, $end, $price)
    {
        $db = Database::instance()->db();
        if (checkReservationConflict($property_id, $start, $end)) {
            $stmt = $db->prepare('INSERT INTO Reservations VALUES(NULL, ?, ?, ?,?,?)');
            $touristID = getUser($_SESSION['username'])['id'];
            $stmt->execute(array($touristID,$property_id,$start,$end,$price));
            return 1;
        }
        return 0;
    }

  function getReservations()
  {
      $db = Database::instance()->db();
      $touristID = getUser($_SESSION['username'])['id'];
      $stmt = $db->prepare('SELECT * FROM Reservations WHERE touristID = ? ');
      $stmt->execute(array($touristID));
      return $stmt->fetchAll();
  }

 function getPropertyReservations($property_id)
 {
     $db = Database::instance()->db();
     $stmt = $db->prepare('SELECT * FROM Reservations WHERE propertyID = ? GROUP BY startDate');
     $stmt->execute(array($property_id));
     return $stmt->fetchAll();
 }

 function checkReservationConflict($property_id, $start, $end)
 {
     $db = Database::instance()->db();
     $stmt = $db->prepare('SELECT *
    FROM Reservations
    WHERE propertyID = ? AND 
    (startDate >= ? AND 
    startDate <= ? OR 
    endDate >= ? AND 
    endDate <= ? OR
    startDate <= ? AND 
    endDate >= ?
    )');
     $stmt->execute(array($property_id,$start,$end,$start,$end,$start,$end));
     return empty($stmt->fetchAll());
 }

function getReservation($reservationID)
{
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM Reservations WHERE id = ? ');
    $stmt->execute(array($reservationID));
    return $stmt->fetch();
}

function removeReservation($reservationID)
{
    $db = Database::instance()->db();
    $reservation = getReservation($reservationID);
    $date1=date_create(date('Y-m-d'));
    $date2=date_create($reservation['startDate']);
    $diff=date_diff($date1, $date2);
    if ($diff->d >= 14) {
        $stmt = $db->prepare('DELETE FROM Reservations WHERE id =?');
        $stmt->execute(array($reservationID));
        return 1;
    }
    return 0;
}
