<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');

  $profilePicture = $_POST['username'] . '_' . $_FILES['profilePicture']['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $name = $_POST['name'];

  $target = '../images/users/' . $profilePicture;

  // Don't allow certain characters
  if ( !preg_match ("/^[a-zA-Z0-9]+$/", $username)) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username can only contain letters and numbers!');
    die(header('Location: ../pages/signup.php'));
  }

  try {
    move_uploaded_file($_FILES['profilePicture']['tmp_name'], $target);
    insertUser($username, $email, $password, $name, $profilePicture);
    $_SESSION['username'] = $username;
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Signed up and logged in!');
    header('Location: ../pages/search.php');
  } catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to signup!');
    header('Location: ../pages/signup.php');
  }
?>