<?php

if (isset($_POST['submitOrder'])) {
  // database connection
  include_once 'dbh.inc.php';

  // ex-order table
  $xo_date = mysqli_real_escape_string($conn, $_POST['xo_date']);
  $booking_ref = mysqli_real_escape_string($conn, $_POST['booking_ref']);

  $sqlExOrder = "INSERT INTO exchange_order (xo_date, booking_ref) VALUES('$xo_date','$booking_ref')";
  $resultExOrder = mysqli_query($conn, $sqlExOrder);

  // passenger table
  /* var_dump($_POST['p_name']); */
  $exch_order = mysqli_insert_id($conn);
  $p_name = $_POST['p_name'];
  $ticket_no = $_POST['ticket_no'];
  $ticket_date = $_POST['ticket_date'];
  $tax_3 = $_POST['tax_3'];
  $tax_4 = $_POST['tax_4'];
  $total_tax = $_POST['total_tax'];
  $depart_date = $_POST['depart_date'];

  if ($resultExOrder) {

    foreach ($p_name as $key => $value) {

      $sqlPass = "INSERT INTO passenger(exch_order, p_name, ticket_no, ticket_date, tax_3, tax_4, total_tax, depart_date) VALUES(
      '" . $exch_order . "',
      '" . mysqli_real_escape_string($conn, $value) . "',
      '" . mysqli_real_escape_string($conn, $ticket_no[$key]) . "',
      '" . mysqli_real_escape_string($conn, $ticket_date[$key]) . "',
      '" . mysqli_real_escape_string($conn, $tax_3[$key]) . "',
      '" . mysqli_real_escape_string($conn, $tax_4[$key]) . "',
      '" . mysqli_real_escape_string($conn, $total_tax[$key]) . "',
      '" . mysqli_real_escape_string($conn, $depart_date[$key]) . "'
      );";

      $resultPass = mysqli_query($conn, $sqlPass);
    }

    if ($resultPass) {
      header('Location: ../ex-order.php?suc=all');
    } else {
      header('Location: ../ex-order.php?err=pass');
    }
  } else {
    header('Location: ../ex-order.php?err=order');
  }
}
