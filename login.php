<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Store user details in session
            $_SESSION['email'] = $user['email'];
            $_SESSION['password'] = $user['password'];  // Store the room number in session

            // Redirect to user bills page
            header("Location: homepage.php");
            exit();
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "No user found with that email!";
    }
}
$conn->close();
?>
