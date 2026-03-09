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

    <h1>Pokedex</h1>

    <form action="index.php" method="get">

        <fieldset>

        <legend>Zoeken</legend>
        <input type="text" name="searchName">
        <input type="submit" name="searchName" value="Zoeken">

        </fieldset>
<main>

    <?php



        include "../includes/db_functions.php";

        StartConnection("pokemondb");

       //code om zoekveld te laten werken
        if (isset($_GET["searchName"]))
        {
              $searchName = $_GET["searchName"];

              $query = "SELECT * FROM pokemon WHERE name LIKE '%$searchName%';";
        }
        else
        {
            $query = "SELECT * FROM pokemon;";
        }



        //$query = "SELECT * FROM `pokemon` WHERE type1 = 'Water' OR type1 = 'Fire'";

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
        ?>
</main>


</body>
</html>






