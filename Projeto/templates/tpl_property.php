<?php
include_once('../database/db_properties.php');
include_once('../database/db_user.php');
include_once('../database/db_reservations.php');
include_once('../includes/session.php');

function draw_property($property)
{
    ?>
     <title><?=$property['title']?></title>
     <script src="../ajax/comments.js" defer></script>

<article class="property">
  <header>
    <h2><?=$property['title']?></a></h2>
  </header>

  <main>
    <h3>Description: <?=$property['description']?></h3>
    <h3>Location: <?=$property['location']?></h3>
    <h4>Price per night: <?=$property['price']?>€</h4>

    <?php
    $reservations = getPropertyReservations($property['id']); ?>

    <h3>Available from: <?=$property['availabilityStart']?> to: <?=$property['availabilityEnd']?></h3>

    <div id="listReservations">

    <h3 id="reservations">List of Reservations</h3>

    <?php if (count($reservations) == 0) { ?>
    <h4> No reservations yet. </h4>
    <?php } else { ?>
    <div id="columnIdentifiers">
      <h4 id="datesWord">Check-in -> Check-Out</h4>
    </div>
    <?php foreach ($reservations as $reservation) {
        draw_reservation($reservation);
    }
  } ?>
  </div>

  <div id="reservation">
          <form id="reservationForm" method="post" action="../actions/action_reservation.php">
            <input id="id" type='hidden' name='id' value='<?= $property['id'] ?>' />
            <input id="price" type='hidden' name='price' value='<?= $property['price'] ?>' />
            <input type="text" placeholder="Check-In" onchange="updateCheckout()"  onfocus="(this.type='date')" oninput="this.className = ''" name="checkIn" id="begin_date" min="<?php echo date('Y-m-d'); ?>" required></<input>
    <input type="text" placeholder="Check-Out" onfocus="(this.type='date')" oninput="this.className = ''" name="checkOut" id="end_date" required></<input>
           
            <p id="totalPrice"></p>
            <p id="message"></p>
            <?php ?>
            <input id="button" name="bookButton" type="submit" value="Book">
          </form>
        </div>

        <div id="comments">
        <h3>Comments </h3>
        <div id="chat"></div>
        <form id="chatForm">
          <input type="hidden" name="username" value="<?= $_SESSION['username'] ?> ">
          <input type="hidden" name="place_id" value="<?= $property['id'] ?> ">
          <input type="text" name="message" placeholder="Say something nice about this place" pattern="[a-zA-Z\s.\-'!\?/]+">
          <input id="button" type="submit" value="Comment">
        </form>
      </div>
    <?php
    if ((checkIsPropertyOwner($property['id']))) {
        ?>
    <button onclick="window.location.href='../pages/editproperty.php?id=' + '<?= $property['id']?>'" ><i class="far fa-edit fa-2x"></i></button>
    <button onclick="window.location.href='../actions/action_delete_property.php?id=' + '<?= $property['id']?>'" ><i class="fas fa-trash fa-2x"></i></button>
    <?php
    } ?>
    
  </main>

</article>
<script src="../javascript/datefield.js"></script>


<?php
} ?>

<?php function add_property()
    {
        ?>
     <title>Add Property</title>

  <section class="add_property">

  <form id="add_prop" method="post" action="../actions/action_add_property.php" enctype="multipart/form-data">
  <h1>Add Property</h1>
  <!-- One "tab" for each step in the form: -->
  <div class="tab"><h2>Information</h2>
    <input type="text" placeholder="title" oninput="this.className = ''" name="title" required></<input>
    <input type="text" placeholder="description" oninput="this.className = ''" name="description" required></<input>
     <input type="text" placeholder="location" oninput="this.className = ''" name="location" required></<input>
  </div>
  <div class="tab"><h2>Dates Available</h2>
    <input type="text" placeholder="from" onfocus="(this.type='date')" oninput="this.className = ''" name="start_date" min="<?php echo date('Y-m-d'); ?>" id="begin_date" onchange="updateCheckout()" required></<input>
    <input type="text" placeholder="until" onfocus="(this.type='date')" oninput="this.className = ''" id="end_date" name="end_date" required></<input>
  </div>
  <div class="tab"><h2>Pricing</h2>
    <input type="number" placeholder="price" oninput="this.className = ''" name="price" required></<input>
  </div>
  <div class="tab"><h2>Images</h2>
  <div id="imageProp">
    <img src="../images/site/image-placeholder.jpg" onclick="pictureClick()" id="profileDisplay"/>
    <input type="file" oninput="this.className = ''" onchange=" createImageP(this)" style="display:none;" name="profilePicture" id="profilePicture" 
    accept = "image/jpeg" required></<input>
  </div>
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
<script src="../javascript/datefield.js"></script>
<script src="../javascript/profilePicture.js"></script>

  <?php
    } ?>

<?php function draw_reservation($reservation)
    {
        ?>
  <div class="reservation">
    
    <h4 id="dates"> <?= $reservation['startDate'] ?> | <?= $reservation['endDate'] ?> </h4>
  </div>
<?php
    } ?>

    <?php function edit_property($property)
    {
        ?>
     <title>Edit Property</title>

  <section class="add_property">

  <form id="add_prop" method="post" action="../actions/action_edit_property.php" enctype="multipart/form-data">
  <h1>Edit Property</h1>
  <!-- One "tab" for each step in the form: -->
  <div class="tab"><h2>Information</h2>
  <input type='hidden' placeholder="id" oninput="this.className = ''" name="id" value = "<?= $property['id'] ?>" display:none required></<input>
    <input type="text" placeholder="title" oninput="this.className = ''" name="title" value = "<?= $property['title'] ?>"required></<input>
    <input type="text" placeholder="description" oninput="this.className = ''" name="description" value = "<?= $property['description'] ?>" required></<input>
     <input type="text" placeholder="location" oninput="this.className = ''" name="location" value = "<?= $property['location'] ?>" required></<input>
  </div>
  <div class="tab"><h2>Dates Available</h2>
    <input type="text" placeholder="from" onfocus="(this.type='date')" oninput="this.className = ''" name="start_date" value = "<?= $property['availabilityStart'] ?>" required></<input>
    <input type="text" placeholder="until" onfocus="(this.type='date')" oninput="this.className = ''" name="end_date" value = "<?= $property['availabilityEnd'] ?>" required></<input>
  </div>
  <div class="tab"><h2>Pricing</h2>
    <input type="number" placeholder="price" oninput="this.className = ''" name="price" value = "<?= $property['price'] ?>" required></<input>
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
    </div>
</form>

</section>

<script src="../javascript/add_property.js"></script>
<script src="../javascript/profilePicture.js"></script>

  <?php
    } ?>
