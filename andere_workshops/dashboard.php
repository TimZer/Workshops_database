<?php
session_start();

if (!isset($_SESSION["loggedin"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Welkom! Je bent ingelogd 🎉</h2>
<a href="logout.php">Uitloggen</a>

</body>
</html>
