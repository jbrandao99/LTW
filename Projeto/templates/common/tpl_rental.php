<?php
include_once('../database/db_rental.php');
include_once('../database/db_user.php');

function draw_rentals($rentals)
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
    <button type="button" onclick="window.location.href='../pages/addproperty.php'" >Add Property</button>
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
  </header>

  <main>
    <?php 
    
    $photos = getPropertyPhotos($rental['id']); ?>
    <div class="row">
    <?php foreach ($photos as $photo) { ?>
      <div class="column">
        <img alt="Property Image" src="../images/properties/<?php echo $photo['path']; ?>"/>
        </div>
    <?php } ?>
    </div>
    <h3>Description: <?=$rental['description']?></h3>
    <h3>Location: <?=$rental['location']?></h3>
    <h4>Price per night: <?=$rental['price']?>€</h4> 
  </main>

  <?php

  $username = getUserbyID($rental['ownerID']);
      ?>
  <footer>
    <h5>By: <?=$username['username']?></h5> 
  </footer>

</article>
</a>
<?php
    } ?>