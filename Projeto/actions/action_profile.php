<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');
  
  $profilePicture = $_POST['username'] . '_' . $_FILES['profilePicture']['name'];
  $newusername = $_POST['username'];
  $password = $_POST['password'];
  $newpassword = $_POST['newpassword'];
  $username = $_SESSION['username'];

  $target = '../images/users/' . $profilePicture;

 if ( !preg_match ("/^[a-zA-Z0-9]+$/", $newusername)) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username can only contain letters and numbers!');
    die(header('Location: ../pages/profile.php'));
  }

 if(editUser($username,$newusername, $password, $newpassword, $profilePicture))
 {  
    move_uploaded_file($_FILES['profilePicture']['tmp_name'], $target);
    $_SESSION['username'] = $newusername;
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Succesfully changed password');
    header('Location: ../pages/search.php');
 }
 else
 {
   $_SESSION['username'] = $username;
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to change passsword!');
    header('Location: ../pages/profile.php');
 }


?>