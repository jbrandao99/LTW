<?php
  $db = new PDO('sqlite:../Database/db.db');
$stmt = $db->prepare('SELECT * FROM Users');
  $stmt->execute();
  $articles = $stmt->fetchAll();
    foreach( $articles as $article) {
    echo '<h1>' . $article['username'] . '</h1>';
    echo '<p>' . $article['email'] . '</p>';
    echo '<img src=" ' . $article['profilePicture'] .'"/>' ;
  }
?>