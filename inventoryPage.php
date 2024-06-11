<?php
    include("header.html");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssFiles/inventoryPage.css">
    <title>Inventory</title>
</head>
<body>
<div class="d-flex justify-content-end m-2">
        <!-- Button to add new items to the table, moved to the right with margin -->
        <button type="button" class="btn btn-outline-primary mr-2">
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
                <td class="table-success"><img src="images/ic_edit.png" alt="Edit"></td>
            </tr>
              <!-- This is the rows 2-->
            <tr>
                <td class="table-primary">2</td>
                <td class="table-secondary">Polo Female</td>
                <td class="table-success">350 php</td>
                <td class="table-success">Out of Stock</td>
                <td class="table-success"><img src="images/ic_edit.png" alt="Edit"></td>
            </tr>
              <!-- This is the rows 3-->
            <tr>
                <td class="table-primary">3</td>
                <td class="table-secondary">Male Pants</td>
                <td class="table-success">400 php</td>
                <td class="table-success">200</td>
                <td class="table-success"><img src="images/ic_edit.png" alt="Edit"></td>
            </tr>
        </tbody>
    </table>
</body>
</html>