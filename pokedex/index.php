<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href=style.css>
</head>
<body>
<header>
    <a href="pokemon_inbrengen.php">Ga naar de insert pagina</a>
    <a href="index.php">
        <h1>Heel veel sigma pokemons</h1>
    </a>
    <form action="index.php" method="get">
        <fieldset>
            <legend>zoeken</legend>
            <label>Zoeken</label>
            <input type="text" name="searchName">
            <input type="submit" name="searchForm" value="zoeken">

            <select name="searchType1">
                <?php

                include "../includes/db_functions.php";

                StartConnection("pokemondb");


                    $type1Query = "SELECT DISTINCT type1 FROM pokemon;";

                    $type1 = ExecuteSelectQuery($type1Query);

                    foreach ($type1 as $item) {
                        echo "<option ='" . $item['type1'] . "'>" . $item['type1'] . "</option>";
                }
                ?>
            </select>

        </fieldset>

    </form>
</header>
<main>
<?php

//code om het zoekveld te laten functioneren
if(isset($_GET["searchForm"]))
{
    $searchName = $_GET["searchName"];
    $searchType1 = $_GET["searchType1"];

    if(isset($searchType1))
    {
        $query = "SELECT * FROM pokemon WHERE type1 ='$searchType1' AND name LIKE '%$searchName%';";
}
    else {
        $query = "SELECT * FROM pokemon WHERE name LIKE '%$searchName%';";
    }
}
else{
    $query = "SELECT * FROM pokemon;";
}


$result = ExecuteSelectQuery($query);

foreach($result as $row)
{
    $name = $row["name"];
    $img = $row["picture"];
    echo "<article>";
    echo $row["name"]. "<br>";
    echo "<img src='$img' alt='$name' width='50'>";
    echo "</article>";
}
?>
</main>
</body>
</html>