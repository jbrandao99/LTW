<?php function draw_rentals($rentals)
{
    ?>
  <section class="rentals">

  

  <?php
    foreach ($rentals as $rental) {
        draw_rental($rental);
    } ?>
 
  </section>
<?php
} ?>

<?php function draw_add()
{
    ?>
  <section class="add_menu">
    <button type="button" onclick="window.location.href='../pages/property.php'" >Add Property</button>
  </section>
<?php
} ?>

<?php function draw_rental($rental)
{
?>
<a href="property.php?id=<?=$rental['id']?> " class="rental">
<article>
  <header>
    <h2><?=$rental['title']?></h2>
    <button><i class="far fa-edit fa-2x"></i></button>
    <button><i class="fas fa-trash fa-2x"></i></button>
  </header>

  <main>
    <h3>Description: <?=$rental['description']?></h3>
    <h3>Location: <?=$rental['location']?></h3>
    <h4>Price per night: <?=$rental['price']?>€</h4> 
  </main>

  <footer>
    <h5>By: <?=$rental['ownerID']?></h5> 
  </footer>

</article>
</a>
<?php
} ?>