<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "webquantify";

    // Establish database connection
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    if (!$conn) {
        echo json_encode(array('status' => 'error', 'message' => 'Connection failed: ' . mysqli_connect_error()));
        exit(); // Ensure script stops if connection fails
    }

    // Sanitize and validate inputs
    $rMerchID = isset($_POST['viewItemMerchID']) ? intval($_POST['viewItemMerchID']) : 0;
    $rCustomerName = isset($_POST['clientName']) ? $_POST['clientName'] : '';
    $rDate = isset($_POST['viewItemSelectedDate']) ? $_POST['viewItemSelectedDate'] : '';
    $rQty = isset($_POST['inputQty']) ? intval($_POST['inputQty']) : 0;

    // Prepare and execute the statement
    $query1 = "INSERT INTO reservationTbl (merchID, userID, customerName, reservationDate, qty)
        VALUES (?, ?, ?, ?, ?)";
    $statement = mysqli_prepare($conn, $query1);
    if ($statement) {
        mysqli_stmt_bind_param($statement, "iisdi", $rMerchID, $rUserID, $rCustomerName, $rDate, $rQty);
        if (mysqli_stmt_execute($statement)) {
            echo json_encode(array('status' => 'success', 'message' => 'Reservation successful.'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Failed to execute statement: ' . mysqli_stmt_error($statement)));
        }
        mysqli_stmt_close($statement);
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Failed to prepare statement: ' . mysqli_error($conn)));
    }

    mysqli_close($conn); // Close database connection
?>
