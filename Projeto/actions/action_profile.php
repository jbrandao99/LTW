<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');
  

  $newusername = $_POST['username'];
  $password = $_POST['password'];
  $newpassword = $_POST['newpassword'];
  $username = $_SESSION['username'];
 if ( !preg_match ("/^[a-zA-Z0-9]+$/", $newusername)) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username can only contain letters and numbers!');
    die(header('Location: ../pages/signup.php'));
  }

 if(editUser($username,$newusername, $password, $newpassword))
 {
     $_SESSION['username'] = $newusername;
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Succesfully changed password');
    header('Location: ../pages/rental.php');
 }
 else
 {
   $_SESSION['username'] = $username;
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to change passsword!');
    header('Location: ../pages/profile.php');
 }


?>