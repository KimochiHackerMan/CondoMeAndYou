<?php
session_start();
include("connect.php");

// Check if the user is logged in and room is set in session
if (!isset($_SESSION['email']) || !isset($_SESSION['room'])) {
    header("Location: index.php"); // Redirect if not logged in
    exit();
}

// Get the user's email and room from session
$email = $_SESSION['email'];
$room_number = $_SESSION['room'];

// Query to get the user details and bill details for the logged-in room
$query = $conn->prepare("
    SELECT 
        u.firstName, u.lastName, u.room,
        b.water_bill_amount, b.water_last_payment_date, b.water_due_date,
        b.electricity_bill_amount, b.electricity_last_payment_date, b.electricity_due_date,
        b.rent_amount, b.rent_last_payment_date, b.rent_due_date
    FROM 
        users u 
    INNER JOIN 
        bills b ON u.room = b.room
    WHERE 
        u.email = ? AND u.room = ?
");

// Bind the parameters and execute the query
$query->bind_param("si", $email, $room_number);
$query->execute();
$result = $query->get_result();

// Fetch the user's information and bills data
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "<p>No bills found for your room.</p>";
    exit();
}

$query->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<div class="calendar">
    <h2>Welcome, <?php echo htmlspecialchars($row['firstName']) . " " . htmlspecialchars($row['lastName']); ?></h2>
    <p>Your Room Number: <?php echo htmlspecialchars($row['room']); ?></p>

    <!-- Display Water Bill -->
    <div class='bill-card'>
        <h3>Water Bill</h3>
        <p>Amount Due: $<?php echo $row["water_bill_amount"]; ?></p>
        <p>Last Payment: <?php echo $row["water_last_payment_date"]; ?></p>
        <p>Due Date: <?php echo $row["water_due_date"]; ?></p>
    </div>

    <!-- Display Electricity Bill -->
    <div class='bill-card'>
        <h3>Electricity Bill</h3>
        <p>Amount Due: $<?php echo $row["electricity_bill_amount"]; ?></p>
        <p>Last Payment: <?php echo $row["electricity_last_payment_date"]; ?></p>
        <p>Due Date: <?php echo $row["electricity_due_date"]; ?></p>
    </div>

    <!-- Display Rent -->
    <div class='bill-card'>
        <h3>Rent</h3>
        <p>Amount Due: $<?php echo $row["rent_amount"]; ?></p>
        <p>Last Payment: <?php echo $row["rent_last_payment_date"]; ?></p>
        <p>Due Date: <?php echo $row["rent_due_date"]; ?></p>
    </div>
</div>

<!-- Logout Button -->
<a href="logout.php">Logout</a>

</body>
</html>
