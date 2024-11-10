<?php
include("connect.php");


if (isset($_POST['Look']) && !empty($_POST['room'])) {
    $room = $_POST['room'];
    

    $sql = "SELECT * FROM Bills WHERE room = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $room); 
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result && $result->num_rows > 0) {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['room'] = $row['room'];
        header("Location: roombills.php");
        exit();
    } else {
        echo "<p>Not Found, Your given room was no vacancy.</p>";


        header("Location: homepage.php");
        exit();
		    
    }
} else {
    echo "<p>Room number is required.</p>";


    header("Location: homepage.php");
    exit();
}
?>

