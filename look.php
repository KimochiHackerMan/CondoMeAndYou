<?php
include("connect.php");



// Initialize variables
$room = "";
$billData = null;

// Check if a room number was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['room'])) {
    $room = $_POST['room'];

    // Query to get bill information for the specified room
    $sql = "SELECT 
                bills.water_bill_amount, 
                bills.water_last_payment_date, 
                bills.water_due_date, 
                bills.electricity_bill_amount, 
                bills.electricity_last_payment_date, 
                bills.electricity_due_date, 
                bills.rent_amount, 
                bills.rent_last_payment_date, 
                bills.rent_due_date 
            FROM 
                bills
            WHERE 
                bills.room = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $room);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $billData = $result->fetch_assoc();
    } else {
        $error = "No billing information found for room " . htmlspecialchars($room);
    }

    $stmt->close();
}

$conn->close();
?>

