<?php function draw_rental($rentals) {
/**
 * Draws a section (#rentals) containing several rentals
 * as articles. Uses the draw_rental function to draw
 * each rental.
 */ ?>
  <section id="rentals">

  <?php 
    foreach($rentals as $rental)
      draw_rental($rental);
  ?>

  <article class="new-rental">
    <form action="../actions/action_add_rental.php" method="post">
      <input type="text" name="rental_name" placeholder="Add rental">
    </form>
  </article>

  </section>
<?php } ?>

<?php function draw_rental($rental) {
/**
 * Draw a single rental as an article (.rental). Uses the
 * draw_item function to draw each item. Expects each 
 * rental to have an rental_id, rental_name and rental_items 
 * fields.
 */ ?>
  <article class="rental">
    <header><h2><?=$rental['rental_name']?></h2></header>

    <ol>
      <?php 
        foreach ($rental['rental_items'] as $item)
          draw_item($item);
      ?>
    </ol>

    <form action="../actions/action_add_item.php" method="post">
      <input type="hidden" name="rental_id" value="<?=$rental['rental_id']?>">
      <input type="text" name="item_text" placeholder="Add item">
    </form>

  </article>
<?php } ?>