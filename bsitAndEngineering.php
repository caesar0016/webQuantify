<?php
include("header.html");
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT AND ENGINEERING</title>
    <style>
        .card {
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="container-fluid text-center">
        <div class="row mt-5">
            <div class="col">
                <img src="images/uniform1.png" alt="Uniform" class="img-fluid">
            </div>
            <div class="col">
            <div class="row">
            <?php
            require 'database.php';
            $query = "SELECT * FROM merchTbl";
            $query_run = mysqli_query($conn, $query);

            if (mysqli_num_rows($query_run) > 0) {
                while ($merchList = mysqli_fetch_assoc($query_run)) {
                    $imagePath = $merchList['imagePath']; // Assuming 'imagePath' is the column name in your database
                    $price = $merchList['price']; // Assuming 'price' is the column name in your database
                    $description = $merchList['description']; // Assuming 'description' is the column name in your database
                    $itemName = $merchList['itemName']; // Assuming 'itemName' is the column name in your database

                    echo '<div class="col-md-6 mb-4">
                        <div class="card">
                            <img src="img/' . htmlspecialchars($imagePath) . '" class="card-img-top" alt="Item Image">
                            <div class="card-body">
                                <h5 class="card-title">' . htmlspecialchars($itemName) . '</h5>
                                <p class="card-text">' . htmlspecialchars($description) . '</p>
                                <p class="card-text text-danger">P' . htmlspecialchars($price) . '</p>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo '<p class="text-center">No merchandise found.</p>';
            }
            ?>
        </div>


            </div>
        </div>
    </div>
</body>

</html>