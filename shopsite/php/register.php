<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $user, $pass);

    if ($stmt->execute()) {
        echo "User registered successfully!";
    } else {
        echo "Username already exists!";
    }
    $stmt->close();
}
$conn->close();
?>
