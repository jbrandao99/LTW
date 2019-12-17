<?php function draw_search()
{
    /**
     * Draws the search section.
     */ ?>
  <section class="search">

    <header><h2>Search a Place</h2></header>

    <form method="post" action="../actions/action_search.php">
      <input type="search" name="location" placeholder="location">
      <input type="range" name="price" min="0" max="1000" value="500" id="range_slider_input">
      <p>Price: <span id="price_range"></span>€</p>
      <input type="date" name="begin_date" onchange="updateChckout()" id="datetoday" required>
      <input type="date" name="end_date" id="datetoday2" required>
      <input type="submit" value="Search">
    </form>

  </section>

  <script src="../javascript/range_slider.js"></script>
  <script src="../javascript/datefield.js"></script>
<?php
} ?>