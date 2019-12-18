<?php
include_once('../database/db_rental.php');

function draw_userReservations($reservations)
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
                    <?php draw_reservations($reservation); ?>
                </div>

            <?php } ?>

        </section>
    <?php
} ?>

<?php function draw_reservations($reservation)
                {
                    /**
                     * Draws the reservations section.
                     */
                   $rental=  getProperty($reservation['propertyID']);
                   $photos = getPropertyPhotos($rental['id']); 
                    ?>
<a href="../pages/property.php?id=<?=$reservation['propertyID']?> " class="rental">
<article>
  <main>
    <div class="row">
        <div class="column">
        <img src="../images/properties/<?php echo $photos[0]['path'];?>" alt="Property Image"/>
        </div>
    
  
    <div class="column">
    <h2><?=$rental['title']?></h2>
    <h3>Location: <?=$rental['location']?></h3>
    <h3>Price: <?=$reservation['price']?>€</h3> 
    <p id="checkIn"><h3>Check-In: <?= $reservation['startDate'] ?></h3></p>
    <p id="checkOut"><h3>Check-Out: <?= $reservation['endDate'] ?></h3></p>
    <form id="deleteReservation" action="../actions/action_removeReservation.php" method="post">
            <input type="hidden" id="reservation_id" name="reservation_id" value="<?= $reservation['id'] ?> ">
            <input type="hidden" id="csrf" name="csrf" value="<?=$_SESSION['csrf']?>">           
            <input id="button" type="submit" value="Cancel">
        </form>
    </div>
    </div>
  </article>  </a>
</main>
<?php } ?>