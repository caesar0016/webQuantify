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
        <form method="post" action="ajaxFiles/insertMerch.php" id="formSaveMerch" autocomplete="off" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <div class="container">
                        <div class="input-group mb-3 itemName-input">
                            <!-- Item Name -->
                            <span class="input-group-text mt-3" id="inputGroup-sizing-default">Item Name</span>
                            <input type="text" class="form-control mt-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="itemName" required>
                        </div>
                        <!-- Description -->
                        <div class="input-group mb-3 mt-4 itemName-input">
                            <span class="input-group-text mt-3" id="inputGroup-sizing-default">Description</span>
                            <input type="text" class="form-control mt-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="itemDesc" required>
                        </div>
                        <!-- Size and Price -->
                        <div class="input-group mt-4 itemName-input">
                            <span class="input-group-text mt-3 mb-3" id="inputGroup-sizing-default">Size</span>
                            <input type="text" class="form-control mt-3 mb-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="itemSize" required>
                            <span class="input-group-text mt-3 mb-3" id="inputGroup-sizing-default">Price</span>
                            <input type="number" class="form-control mt-3 mb-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="itemPrice" required>
                        </div>
                        <!-- Stock -->
                        <div class="input-group mb-3 itemName-input">
                            <span class="input-group-text mt-3" id="inputGroup-sizing-default">Stock</span>
                            <input type="number" class="form-control mt-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="itemStock" required>
                        </div>
                        <!-- Category Selection -->
                        <select name="category" class="form-select itemName-input mt-4" aria-label="Default select example" required>
                            <option selected disabled>Choose a category</option>
                            <?php
                            require 'database.php';

                            $query = "SELECT * FROM categoryTbl WHERE archive = 1";
                            $query_run = mysqli_query($conn, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                while ($categoryList = mysqli_fetch_assoc($query_run)) {
                                    echo '<option value="' . $categoryList['categoryID'] . '">' . $categoryList['categoryName'] . '</option>';
                                }
                            } else {
                                echo '<option disabled>No categories found</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <!-- Save Button -->
                    <div class="input-group mb-3 mt-4 itemName-input">
                        <div class="container">
                            <button type="submit" class="btn btn-warning ml-5" id="btnSubmit">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Image Preview -->
                <div class="card mt-4 border border-black" style="width: 20rem;">
                    <img id="itemImagePreview" src="" class="card-img-top mt-2" alt="...">
                    <div class="card-body">
                        <p class="card-text">This is an image description</p>
                        <p class="card-text"><div class="h5 text-danger">350</div></p>
                    </div>
                    <!-- File Input -->
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupFile01"></label>
                        <input type="file" class="form-control" id="inputGroupFile01" name="itemImage" accept=".jpg, .png, .jpeg" onchange="previewImage(event)" required>
                    </div>
                </div>
            </div>
        </form>

    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // This handles adding merch to the database
            $(document).on('submit', '#formSaveMerch', function(e) {
                e.preventDefault();

                var categoryID = $('select[name="category"]').val();
                // Get form data
                var formData = new FormData(this);
                formData.append("addMerch", true);

                // Send AJAX request
                $.ajax({
                    type: 'POST',
                    url: 'ajaxFiles/insertMerch.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json', // Ensure we expect JSON data
                    success: function(response) {
                        console.log(response);
                        if (response.status === 'success') {
                            console.log(response);
                            // Uncomment this line if you want to reload the page on success
                            window.location.href = 'inventoryPage.php';
                            alert('Item successfully added.');
                        } else {
                            // console.error('Failed to add merch:', response.message);
                            // alert('Failed to add merchandise: ' + response.message + '. Please try again.');
                            // console.log(response);
                            window.location.href = 'inventoryPage.php';
                        }
                    },
                    error: function(xhr, status, error) {
                        // console.error('AJAX request failed:', error);
                        // alert('An error occurred while adding merchandise. Please try again later.');
                        window.location.href = 'inventoryPage.php';
                    }
                });
            });
        });
    </script>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var itemImagePreview = document.getElementById('itemImagePreview');
                itemImagePreview.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

</body>

</html>