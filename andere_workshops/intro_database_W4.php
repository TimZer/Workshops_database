<?php
//includen van DB_function

include "includes/db_functions.php";

//databaseverbinding starten

StartConnection("world");

$query = "SELECT * FROM `country`";

//uitvoeren van query
$result = ExecuteSelectQuery($query);

//loop resultaten
foreach ($result as $row)
{
    echo $row["name"]."<br>";
}
