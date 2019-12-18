<?php function draw_search()
{
    /**
     * Draws the search section.
     */ ?>
     <title>Search Properties</title>

  <section class="search">

    <header><h2>Search a Place</h2></header>

    <form method="post" action="../pages/rental.php">
      <input type="search" name="location" placeholder="Location">
      <input type="range" name="price" min="0" max="500" value="250" id="range_slider_input">
      <p>Price per night: <span id="price_range"></span>€</p>
      <input type="text" placeholder="Check-In" onchange="updateCheckout()"  onfocus="(this.type='date')" oninput="this.className = ''" name="begin_date" required></<input>
    <input type="text" placeholder="Check-Out" onfocus="(this.type='date')" oninput="this.className = ''" name="end_date" required></<input>
      <input type="submit" value="Search">
    </form>

  </section>

  <script src="../javascript/range_slider.js"></script>
  <script src="../javascript/datefield.js"></script>
<?php
} ?>