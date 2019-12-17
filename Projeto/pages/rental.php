  <?php
  include_once('../includes/session.php');
  include_once('../templates/common/tpl_common.php');
  include_once('../templates/common/tpl_rental.php');
  include_once('../database/db_rental.php');


  // Verify if user is logged in
  if (!isset($_SESSION['username'])) {
      die(header('Location: login.php'));
  }
  
  $location = $_POST['location'];
  $price = $_POST['price'];
  $start = $_POST['begin_date'];
  $end = $_POST['end_date'];

 if($start>$end)
  {
      $temp = $start;
      $start = $end;
      $end = $temp;
  }
  
  $rentals = searchProperties($price,$location,$start,$end);

  if(empty($rentals))
  {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'No properties found');
    die(header('Location: search.php'));
  }
  
  draw_header($_SESSION['username']);
  draw_rentals($rentals);
  draw_footer();
