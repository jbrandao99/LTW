<?php function draw_userReservations($reservations)
{
 ?>
    <h2>My reservations</h2>

    <?php if (isset($_SESSION['messages'])) { ?>
      <h4 id="messages">
        <?php foreach ($_SESSION['messages'] as $message) { ?>
          <div class="<?= $message['type'] ?>"><?= $message['content'] ?></div>
        <?php } ?>
      </h4>
    <?php unset($_SESSION['messages']); 
    } ?>
    
    <?php if (count($reservations) == 0) { ?>
        <h3> You haven't made a reservation yet. <a href="../pages/search.php" style="text-decoration:none">Get Started</a></h2>
        <?php } ?>

        <section id="properties">

            <?php

                foreach ($reservations as $reservation) { ?>

                <div id="container">
                    <?php draw_reservation($reservation); ?>
                </div>

            <?php } ?>

        </section>
    <?php } ?>

<?php function draw_reservations($reservation)
{
    /**
     * Draws the reservations section.
     */ ?>
  <a href=<?php echo "../pages/property.php?id=" . $reservation['propertyID']; ?>>
            <div class="image">
            <?php 
            $photos = getPropertyPhotos($reservation['propertyID']); ?>
                <img src="<?= $photos[0]; ?>" alt="Error showing image">
            </div>
            <div class="desc">
                <div id="checkInCheckOut">
                    <p id="checkIn">Check In</p>
                    <p id="checkOut">Check Out</p>
                </div>
                <div id="dates">
                    <p id="checkIn"> <?= $reservation['startDate'] ?> </p>
                    <p id="checkOut"> <?= $reservation['endDate'] ?> </p>
                </div>
            </div>
        </a>

        <form id="deleteReservation" action="../actions/action_removeReservation.php" method="post">
            <input type="hidden" id="reservation_id" name="reservation_id" value="<?= $reservation['id'] ?> ">
            <input type="hidden" id="csrf" name="csrf" value="<?=$_SESSION['csrf']?>">           
            <input id="button" type="submit" value="Cancel">
        </form>
<?php
} ?>