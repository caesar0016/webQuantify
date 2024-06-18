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
    exit(); // Ensure script stops if connection fails
}

//THis handles the archiving the category

if(isset($_POST['delete_category'])){
    
    $categoryID = $_POST['categoryID'];
    $query = "update categoryTbl set archive = 0 where categoryID = '$categoryID'";

    $query_run = mysqli_query($conn, $query);

    if($query_run){
        $response = array('status' => 200, 'message' => 'Category Deleted Successfully.');
    }else{
        $response = array('status' => 500, 'message' => 'Failed to Delete Category.');
    }
    
    echo json_encode($response);

}

// Handle editing category
if(isset($_POST['edit_category'])){
    $res = []; // Initialize response array
    
    // Handle saving category here
    $categoryName = mysqli_real_escape_string($conn, $_POST['categoryName']);
    $categoryID = mysqli_real_escape_string($conn, $_POST['categoryID']);

    if(empty($categoryName)){
        // Handle the case where category name is empty
        $res = [
            'status' => 400,
            'message' => 'Category name cannot be empty'
        ];
    } else {
        $query = "UPDATE categoryTbl SET categoryName=? WHERE categoryID=? and archive = 1";
        $statement = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($statement, "si", $categoryName, $categoryID); // Note the "si" type parameters
        
        if(mysqli_stmt_execute($statement)){
            $res = [
                'status' => 200,
                'message' => 'Update successful'
            ];
        } else {
            $res = [
                'status' => 500,
                'message' => 'Error updating category: ' . mysqli_error($conn)
            ];
        }
        
        mysqli_stmt_close($statement); // Close statement after execution
    }
    
    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($res);
    
    // Close database connection    
    mysqli_close($conn);
    exit(); // Ensure script stops after handling request
}

// Handle fetching category by ID
if(isset($_GET['categoryID'])){
    $categoryID = mysqli_real_escape_string($conn, $_GET['categoryID']); // Fix typo: $get to $_GET

    $query = "SELECT * FROM categoryTbl WHERE categoryID = '$categoryID' and archive = 1";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) == 1){
        $category = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Category fetched successfully',
            'data' => $category
        ];
    } else {
        $res = [
            'status' => 404,
            'message' => 'Category ID not found'
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($res);
    mysqli_close($conn);
    exit(); // Ensure script stops after handling request
}

// Handle saving category
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
    exit(); // Ensure script stops after handling request
}
?>
