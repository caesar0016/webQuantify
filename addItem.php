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
        <span class="input-group-text mt-3" id="inputGroup-sizing-default">Item Name</span>
        <input type="text" class="form-control mt-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <div class="input-group mb-3 mt-4 itemName-input">
        <span class="input-group-text mt-3" id="inputGroup-sizing-default">Description</span>
        <input type="text" class="form-control mt-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <div class="input-group mb-3 mt-4 itemName-input">
        <span class="input-group-text mt-3 mb-3" id="inputGroup-sizing-default">Price</span>
        <input type="text" class="form-control mt-3 mb-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
            <!--This is the combo box for selecting the categories-->
    <select class="form-select itemName-input" aria-label="Default select example">
        <option selected disabled>Choose a category</option>
        <option value="1">One</option> 
        <option value="2">Two</option>
        <option value="3">Three</option>
        <option value="4">Four</option>
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
    <div class="card mt-4" style="width: 20rem;">
        <img src="https://i.pinimg.com/564x/95/5a/f7/955af7a2d19cc3cb70abb6d3e9a4c2ed.jpg" class="card-img-top mt-2" alt="...">
        <div class="card-body">
    <p class="card-text">Insert Description</p>
    <p class="card-text">Insert Price</p>
  </div>
  <button type="button" class="btn btn-outline-primary m-4">Add Image</button>
</div>
  </div>
  </div>
</div>
    
</body>
</html>
<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $itemName = filter_input(INPUT_POST, "itemName", FILTER_SANITIZE_SPECIAL_CHARS);
        $itemDesc = filter_input(INPUT_POST, "itemDesc", FILTER_SANITIZE_SPECIAL_CHARS);
        $itemPrice = filter_input(INPUT_POST, "itemPrice", FILTER_SANITIZE_SPECIAL_CHARS);
        $stock = 100;

        if(empty($itemName)){
            echo "Please enter an item name";
        } else {
            // Prepared statement
            $query = "INSERT INTO item (itemName, itemDescription, price, stock) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $query);
            
            // Bind parameters
            mysqli_stmt_bind_param($stmt, "ssdi", $itemName, $itemDesc, $itemPrice, $stock);
            
            // Execute statement
            if(mysqli_stmt_execute($stmt)){
                echo "Item added successfully";
            } else {
                echo "Error adding item: " . mysqli_error($conn);
            }
            
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    mysqli_close($conn);
?>
