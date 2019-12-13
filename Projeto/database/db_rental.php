<?php
  include_once('../includes/database.php');
    include_once('../database/db_user.php');

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

  function checkIsPropertyOwner($username, $property_id)
  {
      $db = Database::instance()->db();
      $user = getUser($username);

      $stmt = $db->prepare('SELECT * FROM Properties WHERE ownerID = ? AND id = ?');
      $stmt->execute(array($username,$user['id'], $property_id));
      return $stmt->fetch()?true:false;
  }


  function addProperty($ownerID, $price, $title, $location, $description)
  {
      $db = Database::instance()->db();
      $stmt = $db->prepare('INSERT INTO Properties VALUES(NULL, ?, ?, ?, ?, ?, NULL, NULL)');
      $stmt->execute(array($ownerID, $price, $title, $location, $description));
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
