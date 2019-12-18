<?php
include_once('../database/db_properties.php');
include_once('../database/db_user.php');

function draw_rentals($rentals)
{
    ?>
     <title>Properties</title>

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
        $photos = getPropertyPhotos($rental['id']);
        $username = getUserbyID($rental['ownerID']); ?>
<a href="property.php?id=<?=$rental['id']?> " class="rental">
<article>
  <main>
    <div class="row">
      <div class="column">
        <img alt="Property Image" src="../images/properties/<?php echo $photos[0]['path']; ?>"/> 
      </div>
      <div class="column">
        <h2><?=$rental['title']?></h2>
        <h3>Description: <?=$rental['description']?></h3>
        <h3>Location: <?=$rental['location']?></h3>
        <h4>Price per night: <?=$rental['price']?>€</h4> 
      </div>
    </div>
    
  

 
</main>
</article>
</a>
<?php
    } ?>