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

    $query = "INSERT INTO merchTbl (itemName, description, size, price, categoryID) VALUES (?, ?, ?, ?, ?)";
    $statement = mysqli_prepare($conn, $query);

    if (!$statement) {
        echo json_encode(array('status' => 'error', 'message' => 'Query preparation failed: ' . mysqli_error($conn)));
        exit();
    }

    mysqli_stmt_bind_param($statement, "sssdi", $itemName, $description, $size, $price, $category);

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
