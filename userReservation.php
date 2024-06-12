<?php
    include("header.html");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quantify · User Reservation</title>
</head>
<body>
    <div class="d-flex justify-content-between m-2">
        <h2 class="ms-4">Orders</h2>

        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
            <label class="btn btn-outline-primary" for="btnradio1">To Pay</label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio2">To Received</label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio3">Received</label>
</div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
        <tr class="table-primary">
            <th scope="col">#</th>
            <th scope="col">Item</th>
            <th scope="col">Quantity</th>
            <th scope="col">Amount</th>
            <th scope="col">Pickup Date</th>
            <th scope="col"></th>
        </tr>
        </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>BSIT Polo</td>
            <td>3</td>
            <td>900</td>
            <td>July 4, 2024</td>
            <td>
                <button type="button" class="btn btn-outline-danger">Cancel</button>
            </td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>BSIT Polo Female</td>
            <td>2</td>
            <td>500</td>
            <td>June 25, 2024</td>
            <td>
                <button type="button" class="btn btn-outline-danger">Cancel</button>
            </td>
        </tr>
        <tr>
            <th scope="row">4</th>
            <td >P.E Shirt</td>
            <td>1</td>
            <td>200</td>
            <td>June 30, 2024</td>
            <td>
                <button type="button" class="btn btn-outline-danger">Cancel</button>
            </td>
        </tr>
  </tbody>
</table>
</body>
</html>