<?php
    include("header.html");
    include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <div class="input-group mb-3 mt-4 itemName-input">
        <span class="input-group-text" id="inputGroup-sizing-default">Item Name</span>
        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <div class="input-group mb-3 mt-4 itemName-input">
        <span class="input-group-text" id="inputGroup-sizing-default">Description</span>
        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <div class="input-group mb-3 mt-4 itemName-input">
        <span class="input-group-text" id="inputGroup-sizing-default">Price</span>
        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <select class="form-select itemName-input" aria-label="Default select example">
    <option selected>Category</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
    </select>
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
