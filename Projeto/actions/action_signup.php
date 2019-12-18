<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');

  
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $name = $_POST['name'];

  if (!preg_match("/^[a-zA-Z0-9]+$/", $username)) {
      $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username can only contain letters and numbers!');
      die(header('Location: ../pages/signup.php'));
  }
  
  
   $hash = sha1($username);
   $profilePicture = $hash.".jpg";
   $target = '../images/users/' . $profilePicture;

  // Don't allow certain characters
  

  try {
      insertUser($username, $email, $password, $name, $profilePicture);
      if ($_FILES['profilePicture']['error']==4) {
          copy("../images/site/placeholder.jpg", $target);
      } else {
          move_uploaded_file($_FILES['profilePicture']['tmp_name'], $target);
      }
      $_SESSION['username'] = $username;
      $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Signed up and logged in!');
      header('Location: ../pages/search.php');
  } catch (PDOException $e) {
      die($e->getMessage());
      $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to signup!');
      header('Location: ../pages/signup.php');
  }
