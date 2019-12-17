<?php
    include_once('../includes/database.php');
    include_once('../database/db_user.php');
    include_once('../includes/session.php');


   function getAllProperties()
   {
       $db = Database::instance()->db();
       $stmt = $db->prepare('SELECT * FROM Properties');
       $stmt->execute();
       return $stmt->fetchAll();
   }

  function getProperties($username)
  {
      $db = Database::instance()->db();
      $user = getUser($username);
      $stmt = $db->prepare('SELECT * FROM Properties WHERE ownerID = ?');
      $stmt->execute(array($user['id']));
      return $stmt->fetchAll();
  }

  function searchProperties($price,$location,$start,$end)
  {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM Properties WHERE (price <= ? AND UPPER(location) = UPPER(?) AND availabilityStart <= ? AND availabilityEnd >= ?)');
    $stmt->execute(array($price,$location,$start,$end));
    return $stmt->fetchAll();

  }

  function checkIsPropertyOwner($property_id)
  {
      $db = Database::instance()->db();
      $user = getUser($_SESSION['username']);

      $stmt = $db->prepare('SELECT * FROM Properties WHERE ownerID = ? AND id = ?');
      $stmt->execute(array($user['id'], $property_id));
      return $stmt->fetch()?true:false;
  }


  function addProperty($ownerID, $price, $title, $location, $description, $start, $end)
  {
      $db = Database::instance()->db();
      $stmt = $db->prepare('INSERT INTO Properties VALUES(NULL, ?, ?, ?, ?, ?, ?, ?)');
      $stmt->execute(array($ownerID, $price, $title, $location, $description,$start,$end));
      return 1;
  }

 
  function getProperty($property_id)
  {
      $db = Database::instance()->db();
      $stmt = $db->prepare('SELECT * FROM Properties WHERE id = ?');
      $stmt->execute(array($property_id));
      return $stmt->fetch();
  }
  function deleteProperty($property_id)
  {   
    $db = Database::instance()->db();
    $stmt = $db->prepare('DELETE FROM Properties WHERE id = ?');
    $stmt->execute(array($property_id));
  }

  function addPropertyPhoto($property_id, $path, $description)
  {
      $db = Database::instance()->db();
      $stmt = $db->prepare('INSERT INTO Photos VALUES(NULL, ?, ?, ?)');
      $stmt->execute(array($description,$property_id,$path));
      return 1;
  }
  function removePropertyPhoto($photoID)
  {
      $db = Database::instance()->db();
      $stmt = $db->prepare('DELETE FROM Photos WHERE id =?');
      $stmt->execute(array($photoID));
      return 1;
  }
  function getPropertyPhotos($property_id)
  {
      $db = Database::instance()->db();
      $stmt = $db->prepare('SELECT * FROM Photos WHERE propertyID = ?');
      $stmt->execute(array($property_id));
      return $stmt->fetchAll();
  }
