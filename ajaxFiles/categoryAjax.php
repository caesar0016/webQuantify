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
    echo "Not connected: " . $ex->getMessage();
}

if(isset($_POST['save_category'])){
    $res = []; // Initialize response array
    
    // Handle saving category here
    $categoryName = mysqli_real_escape_string($conn, $_POST['categoryName']);
    
    if(empty($categoryName)){
        // Handle the case where category name is empty
        $res = [
            'status' => 400,
            'message' => 'Category name cannot be empty'
        ];
    } else {
        $query = "INSERT INTO categoryTbl (categoryName) VALUES (?)";
        $statement = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($statement, "s", $categoryName);
        
        if(mysqli_stmt_execute($statement)){
            $res = [
                'status' => 200,
                'message' => 'Category inserted successfully'
            ];
        } else {
            $res = [
                'status' => 500,
                'message' => 'Error inserting category: ' . mysqli_error($conn)
            ];
        }
        
        mysqli_stmt_close($statement); // Close statement after execution
    }
    
    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($res);
    
    // Close database connection
    mysqli_close($conn);
}
?>
