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

<?php function add_property()
    {
        ?>
  <section class="add_property">

  <form id="add_prop" method="post" action="../actions/action_add_property.php">
  <h1>Add Property</h1>
  <!-- One "tab" for each step in the form: -->
  <div class="tab"><h2>Information</h2>
    <input type="text" placeholder="title" oninput="this.className = ''" name="title" required></<input>
    <input type="text" placeholder="description" oninput="this.className = ''" name="description" required></<input>
     <input type="text" placeholder="location" oninput="this.className = ''" name="location" required></<input>
  </div>
  <div class="tab"><h2>Dates Available</h2>
    <input type="date" placeholder="From" oninput="this.className = ''" name="start_date" required></<input>
    <input type="date" placeholder="Until" oninput="this.className = ''" name="end_date" required></<input>
  </div>
  <div class="tab"><h2>Pricing</h2>
    <input type="text" placeholder="price" oninput="this.className = ''" name="price" required></<input>
  </div>
  <div class="button_prop" style="overflow:auto;">
    <div id="btn_prop" style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:10px; padding-bottom:10px; background-color: #0088a9;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>

</section>

<script src="../javascript/add_property.js"></script>

  <?php
    } ?>
