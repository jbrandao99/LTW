<?php function draw_rentals($rentals) {
?>
  <section id="rentals">

  <?php 
    foreach($rentals as $rental)
    draw_rental($rental)
    ?>
 
  </section>
<?php } ?>

<?php function draw_rental($rental) {
?>
<article>
  <h2>Title: <?=$rental['title']?></h2>
  <h2>Description: <?=$rental['description']?></h2>
  <h2>Price per night :<?=$rental['price']?>€</h2>
  <h1>. </h1>
 
 
</article>
<?php } ?>