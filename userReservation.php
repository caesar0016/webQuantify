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
        <h2 class="ms-4">User Reservation</h2>

        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
            <label class="btn btn-outline-primary" for="btnradio1">Pending</label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio2">Cancelled</label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio3">Paid</label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio4">Completed</label>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
        <tr class="table-primary">
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
            <th scope="col">Pickup Date</th>
            <th scope="col">Receipt</th>
            <th scope="col"></th>
        </tr>
        </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Jonathan</td>
            <td>Pending</td>
            <td>June 4, 2024</td>
            <td class="">
                <a href="#" class="btn" role="button">
                    <img src="images/ic_receipt.png" alt="Edit">
                </a>
            </td>
            <td class="">
                <a href="#" class="btn" role="button">
                    <img src="images/ic_edit.png" alt="Edit">
                </a>
            </td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jane Miranda</td>
            <td>Pending</td>
            <td>June 25, 2024</td>
            <td class="">
                <a href="#" class="btn" role="button">
                    <img src="images/ic_receipt.png" alt="Edit">
                </a>
            </td>
            <td class="">
                <a href="#" class="btn" role="button">
                    <img src="images/ic_edit.png" alt="Edit">
                </a>
            </td>
            
        </tr>
        <tr>
            <th scope="row">4</th>
            <td >Peter</td>
            <td>Pending</td>
            <td>June 30, 2024</td>
            <td class="">
                <a href="#" class="btn" role="button">
                    <img src="images/ic_receipt.png" alt="Edit">
                </a>
            </td>
            <td class="">
                <a href="#" class="btn" role="button">
                    <img src="images/ic_edit.png" alt="Edit">
                </a>
            </td>
        </tr>
  </tbody>
</body>
</html>