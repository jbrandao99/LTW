<?php function draw_property($property)
{
    ?>
<article class="property">
  <header>
    <h2><?=$property['title']?></a></h2>
  </header>

  <main>
    <h3>Description: <?=$property['description']?></h3>
    <h3>Location: <?=$property['location']?></h3>
    <h4>Price per night: <?=$property['price']?>€</h4> 
  </main>

</article>
<?php
} ?>