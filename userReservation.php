<?php
    include("header.html");
    include("database.php");
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
                <th scope="col">Item</th>
                <th scope="col">Qty</th>
                <th scope="col">Status</th>
                <th scope="col">Date</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT 
                        r.reservationID,
                        r.customerName,
                        m.itemName,
                        r.qty,
                        r.paymentStatus
                    FROM reservationtbl AS r
                    LEFT JOIN merchtbl AS m
                    ON r.merchID = m.merchID;";
            $query_run = mysqli_query($conn, $query);

            if(mysqli_num_rows($query_run) > 0){
                while($reserveList = mysqli_fetch_assoc($query_run)){
                    $id = $reserveList['reservationID'];
                    $customer = $reserveList['customerName'];
                    $itemName = $reserveList['itemName'];
                    $qty = $reserveList['qty'];
                    $status = $reserveList['paymentStatus'];
                 //   $date = $reserveList['date'];
                    
                    echo '
                        <tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $customer . '</td>
                            <td>' . $itemName . '</td>
                            <td>' . $qty . '</td>
                            <td>' . $status . '</td>
                            <td>Date</td>
                            <td class="">
                                <a href="#" class="btn btn-primary" role="button">
                                    <img src="images/ic_receipt.png" alt="Receipt">
                                </a>
                            </td>
                            <td class="">
                                <a href="#" class="btn btn-primary" role="button">
                                    <img src="images/ic_edit.png" alt="Edit">
                                </a>
                            </td>
                        </tr>
                    ';
                }
            }
            ?>
        </tbody>
    </table>
</body>
</html>
