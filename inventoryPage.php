<?php
    include("header.html");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssFiles/inventoryPage.css">
    <title>Quantify · User Orders</title>
</head>

<body>
    <div class="d-flex justify-content-between m-2">
        <div class="d-flex">
            <!-- Grouped buttons on the left -->
            <button type="button" class="btn btn-outline-primary mr-2">
                <a href="userOrders.php" class="text-decoration-none text-reset">User Reservation</a>
            </button>
            <!--Add Extra Button if something to add-->

        </div>
        <!-- Button to add new items to the table, moved to the right with margin -->
        <button type="button" class="btn btn-outline-primary">
            <a href="addItem.php" class="text-decoration-none text-reset">Add Item</a>
        </button>
    </div>

    <table class="table table-success table-striped mt-2">
        <thead>
            <tr>
                <!-- Table headers -->
                <th>#</th>
                <th>Item</th>
                <th>Category</th>
                <th>Description</th>
                <th>Size</th>
                <th>Price</th>
                <th>Stock</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                require 'database.php';

                $query = "Select
                            m.merchID, 
                            m.itemName,
                            c.categoryName,
                            m.description,
                            m.size,
                            m.price,
                            m.stock
                        from merchtbl as m
                        left JOIN categorytbl as c
                        on m.categoryID = c.categoryID;";

                $query_run = mysqli_query($conn, $query);

                if(mysqli_num_rows($query_run)){
                    $counter = 1;

                    while($row = mysqli_fetch_assoc($query_run)){
                        echo "<tr>";
                        echo "<td>" . $counter++ . "</td>";
                        echo "<td>" . $row["itemName"] . "</td>";
                        echo "<td>" . $row["categoryName"] . "</td>";
                        echo "<td>" .$row["description"] . "</td>";
                        echo "<td>" .$row["size"] . "</td>";
                        echo "<td>" .$row["price"] . "</td>";
                        echo "<td>" .$row["stock"] . "</td>";
                        echo '<td>
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="editMerch.php?merchID=' . $row["merchID"] . '" class="btn btn-outline-secondary">
                                        <img src="images/ic_edit.png" alt="Edit">
                                    </a>
                                    <button type="button" class="btn btn-outline-secondary">
                                        <img src="images/ic_trash.png" alt="Delete">
                                    </button>
                                </div>
                            </td>';
                        echo "</tr>";
                    }
                }else{
                    echo "<tr><td colspan='8'>No products found</td></tr>";;
                } 
            ?>
        </tbody>
    </table>
</body>
</html>