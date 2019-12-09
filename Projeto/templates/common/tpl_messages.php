<?php function draw_messages($messages) {
?>
  <section id="messages">

  <?php 
    foreach($messages as $message)
    draw_message($message)
    ?>
 
  </section>
<?php } ?>

<?php function draw_message($message) {
?>
<article class="message">
  <header>
</header>

<main>
</main>

<footer>
</footer>
  <h2>Sender: <?=$message['senderUsername']?></h2>
  <h2>Property: <?=$message['propertyID']?></h2>
  <h2>Text: <?=$message['text']?></h2>
 
 
</article>
<?php } ?>