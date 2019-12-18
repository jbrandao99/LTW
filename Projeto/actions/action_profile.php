<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');

  $newusername = $_POST['newusername'];
  $password = $_POST['password'];
  $newpassword = $_POST['newpassword'];

   if (empty($newusername)) {
       $newusername = $_SESSION['username'];
   }
   if (empty($newpassword)) {
       $newpassword = $password;
   }
if (!preg_match("/^[a-zA-Z0-9]+$/", $newusername)) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username can only contain letters and numbers!');
    die(header('Location: ../pages/profile.php'));
}

    $hash = sha1($newusername);
   $profilePicture = $hash.".jpg";
   $target = '../images/users/' . $profilePicture;

    
 if (editUser($newusername, $password, $newpassword)) {
     if ($_FILES['profilePicture']['error']== 0) {
         editProfilePicture($password, $profilePicture);
         move_uploaded_file($_FILES['profilePicture']['tmp_name'], $target);
     }
     $_SESSION['username'] = $newusername;
     $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Succesfully edited your profile');
     die(header('Location: ../pages/search.php'));
 } else {
     $_SESSION['username'] = $username;
     $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to edit your profile!');
     die(header('Location: ../pages/profile.php'));
 }
