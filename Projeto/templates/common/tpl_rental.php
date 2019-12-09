<?php function draw_rentals($rentals) {
?>
  <section class="rentals">

  <?php 
    foreach($rentals as $rental)
    draw_rental($rental)
  ?>
 
  </section>
<?php } ?>

<?php function draw_rental($rental) {
?>
<article class="rental">
  <header>
    <h2><a href="property.php?id=<?=$rental['id']?> "><?=$rental['title']?></a></h2>
  </header>

  <main>
    <h3>Description: <?=$rental['description']?></h3>
    <h3>Location: <?=$rental['location']?></h3>
    <h4>Price per night: <?=$rental['price']?>€</h4> 
  </main>

  <footer>
    <h5>By: <?=$rental['ownerUsername']?></h5>  
  </footer>

</article>
<?php } ?>