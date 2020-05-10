<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ex-Order</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>

<body>

  <?php

  $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  if (strpos($fullUrl, "err=order") == true) {
    echo '<div style="margin-top:1rem;" class="alert alert-danger mga1" id="alert-danger" role="alert">
      <strong>Oh snap!</strong> Records ware not added
      </div>';
  } elseif (strpos($fullUrl, "suc=all") == true) {
    echo '<div style="margin-top:1rem;" class="alert alert-success mga1" id="alert-success" role="alert">
      <strong>Well done!</strong> Records have been Added.
      </div>';
  } elseif (strpos($fullUrl, "err=pass") == true) {
    echo '<div style="margin-top:1rem;" class="alert alert-danger mga1" id="alert-danger" role="alert">
      <strong>Oh snap!</strong> Passanger Records ware not added <b>Try Again</b>  
      </div>';
  }

  ?>

  <form action="includes/ex-order.inc.php" method="post">
    <div class="col-lg-3 col-mg-12 top-form">
      <div class="form-group">
        <input type="date" name="xo_date" class="form-control" placeholder="XO Date">
      </div>
      <div class="form-group">
        <input type="text" name="booking_ref" class="form-control" placeholder="Booking Reference">
      </div>
      <div id="main-div" class="mdt2">
        <button class="btn btn-primary mdb1" type="button" name="add" id="add"><i class="fas fa-plus"></i></button>
        <div class="form-group">
          <input type="text" name="p_name[]" class="form-control" placeholder="Passenger Name">
        </div>
        <div class="form-group">
          <input type="text" name="ticket_no[]" class="form-control" placeholder="Ticket No.">
        </div>
        <div class="form-group">
          <input type="date" name="ticket_date[]" class="form-control" placeholder="Ticket date">
        </div>
        <div class="form-group">
          <input type="number" name="tax_3[]" class="form-control" placeholder="Tax 3">
        </div>
        <div class="form-group">
          <input type="number" name="tax_4[]" class="form-control" placeholder="Tax 4">
        </div>
        <div class="form-group">
          <input type="number" name="total_tax[]" class="form-control" placeholder="Total Tax">
        </div>
        <div class="form-group">
          <input type="date" name="depart_date[]" class="form-control" placeholder="Departure Date">
        </div>
      </div>
      <div class="form-group">
        <input class="btn btn-success" type="submit" name="submitOrder" class="form-control">
      </div>
  </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function() {

      let i = 1;

      // add button
      $(document).on('click', '#add', function() {
        i++;
        console.log('add', i);
        let html = `
        <div id="sec-div${i}" class="sec-pass mdt2">
        <button class="btn btn-danger mdb1 remove" type="button" name="remove" id="${i}">X</button>
        <div class="form-group">
          <input type="text" name="p_name[]" class="form-control" placeholder="Passenger Name">
        </div>
        <div class="form-group">
          <input type="text" name="ticket_no[]" class="form-control" placeholder="Ticket No.">
        </div>
        <div class="form-group">
          <input type="date" name="ticket_date[]" class="form-control" placeholder="Ticket date">
        </div>
        <div class="form-group">
          <input type="number" name="tax_3[]" class="form-control" placeholder="Tax 3">
        </div>
        <div class="form-group">
          <input type="number" name="tax_4[]" class="form-control" placeholder="Tax 4">
        </div>
        <div class="form-group">
          <input type="number" name="total_tax[]" class="form-control" placeholder="Total Tax">
        </div>
        <div class="form-group">
          <input type="date" name="depart_date[]" class="form-control" placeholder="Departure Date">
        </div>
      </div>
        `;

        $('#main-div').append(html);

      });

      // remove button
      $(document).on('click', '.remove', function() {
        let removebtn = $(this).attr('id');
        $('#sec-div' + removebtn).remove();
        i--;
        console.log('remove', i);
      });
    });
  </script>

</body>

</html>