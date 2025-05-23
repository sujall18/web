<?php
include "db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];

    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_pass);
        $stmt->fetch();
        if (password_verify($pass, $hashed_pass)) {
           // $_SESSION["username"] = $user;
           // echo "Login successful!";
            $_SESSION["username"] = $user;
            header("Location: ../dashboard.php");
            exit();

        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "User not found!";
    }
    $stmt->close();
}
$conn->close();
?>
