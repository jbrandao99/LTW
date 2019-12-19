<?php
  include_once('../includes/session.php');
  include_once('../database/db_properties.php');
  include_once('../database/db_user.php');


  // Verify if user is logged in
  if (!isset($_SESSION['username'])) {
      die(header('Location: ../pages/login.php'));
  }

  $user = getUser($_SESSION['username']);
  $userID= $user['id'];

  $title = $_POST['title'];
  $description = $_POST['description'];
  $location = $_POST['location'];
  $price = $_POST['price'];
  $start = $_POST['start_date'];
  $end = $_POST['end_date'];

  if ($start>$end) {
      $temp = $start;
      $start = $end;
      $end = $temp;
  }
  
  $pattern = "/^[a-z A-Z]+$/";
  if (!preg_match($pattern, $title)) {
      $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Title can only contain letters!');
      die(header('Location: ../pages/property.php'));
  }
  if (!preg_match($pattern, $location)) {
      $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Location can only contain letters!');
      die(header('Location: ../pages/property.php'));
  }
  if (!preg_match("/^[a-z A-Z0-9]+$/", $description)) {
      $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Description can only contain letters and numbers!');
      die(header('Location: ../pages/property.php'));
  }
 
    $property_id = addProperty($userID, $price, $title, $location, $description, $start, $end);
    
    foreach($_FILES as $file)
    {
        $hash = sha1($file['name']).'.jpg';
        addPropertyPhoto($property_id,$hash);
        $target = '../images/properties/' . $hash; 
        move_uploaded_file($file['tmp_name'], $target);
    }
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Succesfully added property');
    die(header('Location: ../pages/manage.php'));
