<?php
  include_once('../includes/session.php');
  include_once('../database/db_rental.php');

  $location = $_POST['location'];
  $price = $_POST['price'];
  $begin_date = $_POST['begin_date'];
  $end_date = $_POST['end_date'];

  