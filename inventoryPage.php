<?php
    include("header.html");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssFiles/inventoryPage.css">
    <title>Quantify · Inventory</title>
</head>
<body>
<div class="d-flex justify-content-between m-2">
    <div class="d-flex">
        <!-- Grouped buttons on the left -->
        <button type="button" class="btn btn-outline-primary mr-2">
            <a href="userReservation.php" class="text-decoration-none text-reset">User Reservation</a>
        </button>
        <!--Add Extra Button if something to add-->
        


    </div>
    <!-- Button to add new items to the table, moved to the right with margin -->
    <button type="button" class="btn btn-outline-primary">
        <a href="addItem.php" class="text-decoration-none text-reset">Add Item</a>
    </button>
</div>

<table class="table table-hover mt-2">
        <thead>
            <tr>
                <!-- Table headers -->
                <th class="table-primary">#</th>
                <th class="table-secondary">Category Name</th>
                <th class="table-success">Price</th>
                <th class="table-success">Stock</th>
                <th class="table-success"></th>
            </tr>
        </thead>
        <tbody>
            <!-- Example rows with initial data -->
            <tr>
                <td class="table-primary">1</td>
                <td class="table-secondary">Polo Male</td>
                <td class="table-success">500 php</td>
                <td class="table-success">250</td>
                <td class="table-success">
                    <a href="#" class="btn" role="button">
                        <img src="images/ic_edit.png" alt="Edit">
                    </a>
                </td>
            </tr>
              <!-- This is the rows 2-->
            <tr>
                <td class="table-primary">2</td>
                <td class="table-secondary">Polo Female</td>
                <td class="table-success">350 php</td>
                <td class="table-success">Out of Stock</td>
                <td class="table-success">
                    <a href="#" class="btn" role="button">
                        <img src="images/ic_edit.png" alt="Edit">
                    </a>
                </td>
            </tr>
              <!-- This is the rows 3-->
            <tr>
                <td class="table-primary">3</td>
                <td class="table-secondary">Male Pants</td>
                <td class="table-success">400 php</td>
                <td class="table-success">200</td>
                <td class="table-success">
                    <a href="#" class="btn" role="button">
                        <img src="images/ic_edit.png" alt="Edit">
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>