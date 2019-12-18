<?php
include_once('../database/db_rental.php');
include_once('../database/db_user.php');
include_once('../database/db_reservations.php');
include_once('../includes/session.php');

function draw_property($property)
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

    <?php
    $reservations = getPropertyReservations($property['id']); ?>

    <div id="listReservations">

    <h3 id="reservations">List of Reservations</h3>

    <?php if (count($reservations) == 0) { ?>
    <h4> No reservations yet. </h4>
    <?php } else { ?>
    <div id="columnIdentifiers">
      <h4 id="guestWord">Guest</h4>
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
            <input type="text" placeholder="Check-In" onchange="updateCheckout()"  onfocus="(this.type='date')" oninput="this.className = ''" name="checkIn" required></<input>
    <input type="text" placeholder="Check-Out" onfocus="(this.type='date')" oninput="this.className = ''" name="checkOut" required></<input>
           
            <p id="totalPrice"></p>
            <p id="message"></p>
            <?php ?>
            <input id="button" name="bookButton" type="submit" value="Book">
          </form>
        </div>
    <?php
    if ((checkIsPropertyOwner($property['id']))) {
        ?>
    <button><i class="far fa-edit fa-2x"></i></button>
    <button onclick="window.location.href='../actions/delete_property.php?id=' + '<?= $property['id']?>'" ><i class="fas fa-trash fa-2x"></i></button>
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
    <input type="text" placeholder="from" onfocus="(this.type='date')" oninput="this.className = ''" name="start_date" required></<input>
    <input type="text" placeholder="until" onfocus="(this.type='date')" oninput="this.className = ''" name="end_date" required></<input>
  </div>
  <div class="tab"><h2>Pricing</h2>
    <input type="number" placeholder="price" oninput="this.className = ''" name="price" required></<input>
  </div>
  <div class="tab"><h2>Images</h2>
  <div id="imageProp">
    <img src="../images/site/placeholder.png" onclick="pictureClick()" id="profileDisplay"/>
    <input type="file" oninput="this.className = ''" onchange="displayImage(this); createImage(this)" style="display:none;" name="profilePicture" id="profilePicture" required></<input>
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
<script src="../javascript/profilePicture.js"></script>

  <?php
    } ?>

<?php function draw_reservation($reservation)
    {
        ?>
  <div class="reservation">
    <h4 id="guest"> <?= getUserbyID($reservation['touristID'])['username'] ?> </h4>
    <h4 id="dates"> <?= $reservation['startDate'] ?> | <?= $reservation['endDate'] ?> </h4>
  </div>
<?php
    } ?>