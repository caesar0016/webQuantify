<?php
include("header.html");
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quantify · Add Item</title>
</head>

<body>
    <!-- This is the close button -->
    <div class="d-flex m-4 gap-4 align-items-center">
        <!-- Button with red close style, redirects on click -->
        <button type="button" class="btn-close btn-close-red" aria-label="Close" onclick="location.href='inventoryPage.php'"></button>
        <!-- Add Category button with left margin -->
        <button type="button" class="btn btn-outline-primary ml-4">
            <a href="categoryAddItem.php" class="text-decoration-none text-reset">Add Category</a>
        </button>
    </div>
    <div class="container text-center p-4">
        <div class="row">
            <div class="col">
                <div class="container">
                    <div class="input-group mb-3 mt-5 itemName-input">
                        <!-- This is the input Item Name -->
                        <span class="input-group-text mt-3" id="inputGroup-sizing-default">Item Name</span>
                        <input type="text" class="form-control mt-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3 mt-4 itemName-input">
                        <!-- This is the input Description -->
                        <span class="input-group-text mt-3" id="inputGroup-sizing-default">Description</span>
                        <input type="text" class="form-control mt-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3 mt-4 itemName-input">
                        <!-- THis is the input price -->
                        <span class="input-group-text mt-3 mb-3" id="inputGroup-sizing-default">Price</span>
                        <input type="text" class="form-control mt-3 mb-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <!--This is the combo box for selecting the categories-->
                    <select class="form-select itemName-input" aria-label="Default select example">
                        <option selected disabled>Choose a category</option>

                        <!-- This is the php script for fetching the categories from the database -->
                        <?php
                        require 'database.php';

                        $query = "SELECT * FROM categoryTbl WHERE archive = 1";
                        $query_run = mysqli_query($conn, $query);

                        // Checking if any categories are returned
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($categoryList = mysqli_fetch_assoc($query_run)) {
                                // Output for every category
                                echo '<option value="' . $categoryList['categoryID'] . '">' . $categoryList['categoryName'] . '</option>';
                            }
                        } else {
                            // Output if no categories are found
                            echo '<option disabled>No categories found</option>';
                        }
                        ?>
                    </select>

                </div>
                <!-- This is the button save -->
                <div class="input-group mb-3 mt-4 itemName-input">
                    <div class="container">
                        <button type="button" class="btn btn-warning ml-5">
                            <a href="inventoryPage.php" class="text-decoration-none text-dark">Save</a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card mt-4 border border-black" style="width: 20rem;">
                <img src="https://i.pinimg.com/564x/95/5a/f7/955af7a2d19cc3cb70abb6d3e9a4c2ed.jpg" class="card-img-top mt-2" alt="...">
                <div class="card-body">
                    <p class="card-text">Insert Description</p>
                    <p class="card-text">Insert Price</p>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupFile01"></label>
                    <input type="file" class="form-control" id="inputGroupFile01">
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>