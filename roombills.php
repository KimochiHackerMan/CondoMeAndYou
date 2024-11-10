<?php
session_start();
include("connect.php"); 

if(isset($_SESSION['room'])){
    $room = $_SESSION['room'];
    $query = mysqli_query($conn, "SELECT bills.* FROM `bills` WHERE bills.room='$room'");
    
    if($row = mysqli_fetch_array($query)){
        echo "<div class='calendar-theme'>";
        echo "<h2>Billing Information for Room " . htmlspecialchars($room) . "</h2>";

        // Water Bill Card
        echo "<div class='bill-card water-bill'>";
        echo "<h3>Water Bill</h3>";
        echo "<p><strong>Amount Due:</strong> ₱" . htmlspecialchars($row['water_bill_amount']) . "</p>";
        echo "<div class='date-section'>";
        echo "<div class='calendar-date'><strong>Last Payment:</strong><br>" . htmlspecialchars($row['water_last_payment_date']) . "</div>";
        echo "<div class='calendar-date'><strong>Due Date:</strong><br>" . htmlspecialchars($row['water_due_date']) . "</div>";
        echo "</div>";
        echo "</div>";

        // Electricity Bill Card
        echo "<div class='bill-card electricity-bill'>";
        echo "<h3>Electricity Bill</h3>";
        echo "<p><strong>Amount Due:</strong> ₱" . htmlspecialchars($row['electricity_bill_amount']) . "</p>";
        echo "<div class='date-section'>";
        echo "<div class='calendar-date'><strong>Last Payment:</strong><br>" . htmlspecialchars($row['electricity_last_payment_date']) . "</div>";
        echo "<div class='calendar-date'><strong>Due Date:</strong><br>" . htmlspecialchars($row['electricity_due_date']) . "</div>";
        echo "</div>";
        echo "</div>";

        // Rent Card
        echo "<div class='bill-card rent-bill'>";
        echo "<h3>Rent</h3>";
        echo "<p><strong>Amount Due:</strong> ₱" . htmlspecialchars($row['rent_amount']) . "</p>";
        echo "<div class='date-section'>";
        echo "<div class='calendar-date'><strong>Last Payment:</strong><br>" . htmlspecialchars($row['rent_last_payment_date']) . "</div>";
        echo "<div class='calendar-date'><strong>Due Date:</strong><br>" . htmlspecialchars($row['rent_due_date']) . "</div>";
        echo "</div>";
        echo "</div>";

        echo "</div>"; 
    } else {
        echo "<p>No billing information found for this room.</p>";
    }
}
?>

<!-- CSS Styling -->
<style>
    .calendar-theme {
        font-family: Arial, sans-serif;
        max-width: 800px;
        margin: 0 auto;
    }

    .bill-card {
        background-color: #f3f3f3;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        margin: 15px 0;
    }

    .water-bill { border-left: 6px solid #007BFF; }
    .electricity-bill { border-left: 6px solid #FF5733; }
    .rent-bill { border-left: 6px solid #28A745; }

    .bill-card h3 {
        margin-top: 0;
    }

    .date-section {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    .calendar-date {
        background-color: #fff;
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 8px;
        text-align: center;
        width: 45%;
    }

    .calendar-date strong {
        color: #555;
    }
</style>
<script async type='module' src='https://interfaces.zapier.com/assets/web-components/zapier-interfaces/zapier-interfaces.esm.js'></script>

<div id="chatbot-container">
  <button id="minimize-button" onclick="toggleChatbot()">_</button>
  <zapier-interfaces-chatbot-embed
    is-popup='false'
    chatbot-id='cm3bx4www003a8ova4kl0w4zp'
    height='600px'
    width='400px'>
  </zapier-interfaces-chatbot-embed>
</div>
        <div class="footer">
			<center>
            <p>&copy; 2024 CondoMeAndYou - All rights reserved.</p>
			</center>
        </div>
<h1> <a href="homepage.php">RETURN</a> </h1>

<style>
  #chatbot-container {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 400px;
    height: 600px;
    z-index: 1000;
  }

  #minimize-button {
    position: absolute;
    top: 5px;
    right: 5px;
    z-index: 1001;
    background: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    padding: 5px;
    cursor: pointer;
  }

  #chatbot-container.minimized zapier-interfaces-chatbot-embed {
    display: none;
  }

  #chatbot-container.minimized {
    height: auto;
    width: auto;
  }
</style>

<script>
  function toggleChatbot() {
    const container = document.getElementById('chatbot-container');
    container.classList.toggle('minimized');
    
    const button = document.getElementById('minimize-button');
    button.textContent = container.classList.contains('minimized') ? '+' : '_';
  }
</script>

