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
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="">Item Name</label> <br>
        <input type="text" name="itemName"><br>
        <label for="">Description</label> <br>
        <input type="text" name="itemDesc"><br>
        <label for="">Price</label> <br>
        <input type="text" name="itemPrice"><br>
        <br>
        <input type="submit" name="submit" value="Register">
    </form>
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
