<?php
include_once '../database/db_reservations.php';

// Verifies CSRF token
if ($_SESSION['csrf'] != $_POST['csrf']) {
    //$_SESSION['messages'][] = array('type' => 'error', 'content' => 'Invalid request!');
    die(header('Location: ../pages/reservations.php'));
}

$reservation_id = $_POST['reservation_id'];

if(removeReservation($reservation_id))
{
$_SESSION['messages'][] = array('type' => 'success', 'content' => 'Your reservation has been removed successfully!');
header('Location: ../pages/reservations.php');
}
$_SESSION['messages'][] = array('type' => 'error', 'content' => 'Cancellation period has expired!');
header('Location: ../pages/reservations.php');

