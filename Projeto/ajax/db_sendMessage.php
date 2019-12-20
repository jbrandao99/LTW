<?php
include_once '../includes/database.php';
include_once '..includes/db_user.php';

// Current time
$timestamp = time();

// Get last_id
$last_id = $_GET['last_id'];
$place_id = $_GET['place_id'];

// Database connection
$db = Database::instance()->db();

if (isset($_GET['username']) && isset($_GET['text'])) {
  // GET username and text
  $username = $_GET['username'];
  $userID = getUser($username)['id'];
  $text = $_GET['text'];
  // Insert Message
  $stmt = $db->prepare("INSERT INTO Comments VALUES (null, 1, ?, ?, ?)");
  $stmt->execute(array($text, $place_id, $userID));
}

// Retrieve new messages
$stmt = $db->prepare("SELECT * FROM Comments WHERE id > ? AND propertyID = ? ORDER BY date DESC LIMIT 10");
$stmt->execute(array($last_id, $place_id));
$messages = $stmt->fetchAll();

// In order to get the most recent messages we have to reverse twice
$messages = array_reverse($messages);

// Add a time field to each message
foreach ($messages as $index => $message) {
  $time = date('d M Y', $message['date']);
  $messages[$index]['time'] = $time;
}

// JSON encode
echo json_encode($messages);
