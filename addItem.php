<?php
    include("header.html");
    include('dbConnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="addItem.php" method="post">
        <label for="">Item Name</label> <br>
        <input type="text" name="itemName"><br>
        <label for="">Description</label> <br>
        <input type="text" name="itemName"><br>
        <label for="">Price</label> <br>
        <input type="text" name="itemName"><br>
        <button>Save</button>
    </form>
</body>
</html>