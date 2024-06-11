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
<button type="button" class="btn btn-outline-primary m-2">Add Item</button>
<table class="table table-hover mt-2">
        <thead>
            <tr>
                <!-- Table headers -->
                <th class="table-primary">#</th>
                <th class="table-secondary">Category Name</th>
                <th class="table-success">Price</th>
                <th class="table-success">Stock</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example rows with initial data -->
            <tr>
                <td class="table-primary">1</td>
                <td class="table-secondary">Electronics</td>
                <td class="table-success">$500</td>
                <td class="table-success">In Stock</td>
            </tr>
              <!-- This is the rows 2-->
            <tr>
                <td class="table-primary">2</td>
                <td class="table-secondary">Furniture</td>
                <td class="table-success">$1500</td>
                <td class="table-success">Out of Stock</td>
            </tr>
              <!-- This is the rows 3-->
            <tr>
                <td class="table-primary">3</td>
                <td class="table-secondary">Furniture</td>
                <td class="table-success">$1500</td>
                <td class="table-success">Out of Stock</td>
            </tr>
        </tbody>
    </table>
</body>
</html>