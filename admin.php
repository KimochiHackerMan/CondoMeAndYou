<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Condo Bill Tracker - Add/Edit Bills</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 8px; }
        h1 { text-align: center; }
        form { display: flex; flex-direction: column; gap: 10px; }
        label { font-weight: bold; }
        input[type="text"], input[type="number"], input[type="date"] {
            padding: 8px; border: 1px solid #ccc; border-radius: 4px;
        }
        button { padding: 10px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #218838; }
    </style>
</head>
<body>

<div class="container">
    <h1>CondoMeAndYou</h1>

    <?php
    // Connect to the database
$host="localhost";
$user="root";
$pass="";
$db="condomeandyou";
$conn=new mysqli($host,$user,$pass,$db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if form is submitted for adding or updating bills
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $room = $_POST['room'];
        $water_bill_amount = $_POST['water_bill_amount'];
        $water_last_payment_date = $_POST['water_last_payment_date'];
        $water_due_date = $_POST['water_due_date'];
        $electricity_bill_amount = $_POST['electricity_bill_amount'];
        $electricity_last_payment_date = $_POST['electricity_last_payment_date'];
        $electricity_due_date = $_POST['electricity_due_date'];
        $rent_amount = $_POST['rent_amount'];
        $rent_last_payment_date = $_POST['rent_last_payment_date'];
        $rent_due_date = $_POST['rent_due_date'];

        // Check if room number already exists in the database
        $checkQuery = "SELECT * FROM Bills WHERE room = $room";
        $result = $conn->query($checkQuery);

        if ($result->num_rows > 0) {
            // Update existing record
            $updateQuery = "UPDATE Bills SET 
                water_bill_amount = '$water_bill_amount',
                water_last_payment_date = '$water_last_payment_date',
                water_due_date = '$water_due_date',
                electricity_bill_amount = '$electricity_bill_amount',
                electricity_last_payment_date = '$electricity_last_payment_date',
                electricity_due_date = '$electricity_due_date',
                rent_amount = '$rent_amount',
                rent_last_payment_date = '$rent_last_payment_date',
                rent_due_date = '$rent_due_date'
                WHERE room = $room";
            $conn->query($updateQuery);
            echo "<p style='color: green;'>Record updated successfully for Room $room!</p>";
        } else {
            // Insert new record
            $insertQuery = "INSERT INTO Bills (room, water_bill_amount, water_last_payment_date, water_due_date, electricity_bill_amount, electricity_last_payment_date, electricity_due_date, rent_amount, rent_last_payment_date, rent_due_date)
                VALUES ('$room', '$water_bill_amount', '$water_last_payment_date', '$water_due_date', '$electricity_bill_amount', '$electricity_last_payment_date', '$electricity_due_date', '$rent_amount', '$rent_last_payment_date', '$rent_due_date')";
            $conn->query($insertQuery);
            echo "<p style='color: green;'>New record added for Room $room!</p>";
        }
    }

    $conn->close();
    ?>

    <!-- Form to add or edit bill details -->
    <form method="POST" action="">
        <label for="room">Room Number:</label>
        <input type="number" id="room" name="room" required>

        <h3>Water Bill</h3>
        <label for="water_bill_amount">Amount Due:</label>
        <input type="number" step="0.01" id="water_bill_amount" name="water_bill_amount" required>
        <label for="water_last_payment_date">Last Payment Date:</label>
        <input type="date" id="water_last_payment_date" name="water_last_payment_date">
        <label for="water_due_date">Due Date:</label>
        <input type="date" id="water_due_date" name="water_due_date" required>

        <h3>Electricity Bill</h3>
        <label for="electricity_bill_amount">Amount Due:</label>
        <input type="number" step="0.01" id="electricity_bill_amount" name="electricity_bill_amount" required>
        <label for="electricity_last_payment_date">Last Payment Date:</label>
        <input type="date" id="electricity_last_payment_date" name="electricity_last_payment_date">
        <label for="electricity_due_date">Due Date:</label>
        <input type="date" id="electricity_due_date" name="electricity_due_date" required>

        <h3>Rent</h3>
        <label for="rent_amount">Amount Due:</label>
        <input type="number" step="0.01" id="rent_amount" name="rent_amount" required>
        <label for="rent_last_payment_date">Last Payment Date:</label>
        <input type="date" id="rent_last_payment_date" name="rent_last_payment_date">
        <label for="rent_due_date">Due Date:</label>
        <input type="date" id="rent_due_date" name="rent_due_date" required>

        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>
