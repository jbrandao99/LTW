<?php
  include_once('../includes/session.php');

    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $mail = $_POST['email'];
    $message = $_POST['message'];

    $mailTo = "up201705573@fe.up.pt";
    $headers= "Rent-a-Place: " . $mail;
    $txt = "You have received an e-mail from " . $name . ".\n" . $message;

    mail($mailTo, $subject, $txt, $headers);

    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Thanks for your contact '.$_POST['name']);
    die(header('Location: ../pages/contact.php'));
