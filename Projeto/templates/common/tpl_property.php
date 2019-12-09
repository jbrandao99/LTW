<?php function draw_property($property) {
?>
<article>

  <h2>Title: <?=$property['title']?></h2>
  <h2>Description: <?=$property['description']?></h2>
  <h2>Price per night :<?=$property['price']?>€</h2>
  <h1>. </h1>
 
</article>
<?php } ?>