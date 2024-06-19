<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "webquantify";
$conn = "";

try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    if (!$conn) {
        throw new Exception("Connection failed: " . mysqli_connect_error());
    }
} catch (Exception $ex) {
    echo json_encode(array('status' => 'error', 'message' => 'Connection failed: ' . $ex->getMessage()));
    exit(); // Ensure script stops if connection fails
}

if(isset($_POST['addMerch'])){
    $res = []; //initialize the response array

    $itemName = $_POST['itemName'];
    $description = $_POST['itemDesc'];
    $size = $_POST['itemSize'];
    $price = $_POST['itemPrice'];
    $category = $_POST['category'];


    $fileName = $_FILES["itemImage"]['name'];
    $fileSize = $_FILES["itemImage"]['size'];
    $tmpName = $_FILES["itemImage"]['tmp_name'];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));

    if(!in_array($imageExtension, $validImageExtension)){
        echo "<script> alert('Invalid Image Extension'); </script>";
        exit(); // Stop script execution if invalid extension
    }
    else if($fileSize > 1000000){
        echo "<script> alert('Image size is too large'); </script>";
        exit(); // Stop script execution if image size is too large
    }else{
        $target_dir = "img/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true); // Create the directory if it doesn't exist
        }

        $newImageName = uniqid() . '.' . $imageExtension;
        $target_file = $target_dir . $newImageName;

        if (!move_uploaded_file($tmpName, $target_file)) {
            echo json_encode(array('status' => 'error', 'message' => 'Failed to upload image.'));
            exit();
        }
    }

    // Now insert data into the database
    $query = "INSERT INTO merchTbl (itemName, description, size, price, categoryID, imagePath) VALUES (?, ?, ?, ?, ?, ?)";
    $statement = mysqli_prepare($conn, $query);

    if (!$statement) {
        echo json_encode(array('status' => 'error', 'message' => 'Query preparation failed: ' . mysqli_error($conn)));
        exit();
    }

    mysqli_stmt_bind_param($statement, "sssdis", $itemName, $description, $size, $price, $category, $newImageName);

    if(mysqli_stmt_execute($statement)) {
        $res['status'] = 'success';
    } else {
        $res['status'] = 'error';
        $res['message'] = 'Execution failed: ' . mysqli_stmt_error($statement);
    }

    echo json_encode($res);

    mysqli_stmt_close($statement);
}

?>