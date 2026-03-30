<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <a href="index.php">Ga naar pokedex</a>
</header>

<?php

$pokemonNumber = $_GET ["pokemonNumber"];

$query = "DELETE FROM pokemon WHERE number = $pokemonNumber;";

include "../includes/db_functions.php";

StartConnection("pokemondb");

$rowsAffected = ExecuteQuery($query);

if ($rowsAffected)
{
    echo "succesvol verwijderd!";
}
else
{
    echo "Er is iets fout gegaan!";
}

?>







</body>
</html>
