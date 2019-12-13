<?php
  include_once('../includes/session.php');

    require('../phpmailer/PHPMailerAutoload.php');
    $mail= new PHPMailer;
    $mail->Host= 'smtp.gmail.com';
    $mail->Port= 587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';
    $mail->Username= 'fellipe.ranheri@gmail.com';
    $mail->Password= 'fellipe09';
    $mail->SetFrom($_POST['email'], $_POST['name']);
    $mail->AddAddress('up201705573@fe.up.pt');
    $mail->isHTML(true);
    $mail->Subject='Rent-a-place: '.$_POST['subject'];
    $mail->Body=$_POST['message'];
    $var1=$_POST['subject'];
    if (!$mail->send()) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to sent message');
        header('Location: pages/login.php');
    } else {
        $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Thanks for your contact '.$_POST['name']);
        header('Location: ../pages/login.php');
    }
