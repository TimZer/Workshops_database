<?php


include "../includes/db_functions.php";

StartConnection("pokemondb");

//$query = "SELECT * FROM `pokemon` WHERE type1 = 'Water' OR type1 = 'Fire'";

$query = "SELECT * FROM `pokemon`";

$result = ExecuteSelectQuery($query);

foreach ($result as $row)
{
    $name = $row["name"];
    $img = $row["picture"];
    echo "<article>";

        echo $name."<br>";
        echo "<img src='$img' alt='$name' width='75'>";

    echo "</article>";
}

