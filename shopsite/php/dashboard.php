<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body style="background-color:#151516; color:white; text-align:center; padding-top:100px;">
    <h1>Welcome, <?php echo $_SESSION["username"]; ?> 👋</h1>
    <p>You are now logged in to your shopping account.</p>
    <a href="php/logout.php"><button>Logout</button></a>
</body>
</html>
