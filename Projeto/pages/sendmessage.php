
<?php
  include_once('../includes/database.php');
  $timestamp = time();
  $last_id = $_GET['last_id'];
  $place_id = $_GET['place_id'];
  $db = Database::instance()->db();
  if (isset($_GET['username']) && !empty($_GET['text'])) {
      $username = $_GET['username'];
      $text = $_GET['text'];
      $stmt = $db->prepare("INSERT INTO comments VALUES (null, ?, ?, ?,?)");
      $stmt->execute(array($timestamp, $username, $text,$place_id));
  }
  $stmt = $db->prepare("SELECT * FROM comments WHERE place_id = ? AND id > ? ORDER BY date DESC LIMIT 5");
  $stmt->execute(array($place_id,$last_id));
  $comments = $stmt->fetchAll();
  $comments = array_reverse($comments);
  foreach ($comments as $index => $comment) {
      $time = date('Y-m-d', $comment['date']);
      $comments[$index]['time'] = $time;
  }
  echo json_encode($comments);
?>
