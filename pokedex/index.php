<?php
session_start();

$correct_username = "admin";
$correct_password = "1234";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === $correct_username && $password === $correct_password) {
        $_SESSION["loggedin"] = true;

        // terug naar pokedex (index.php)
        header("Location: index.php");
        exit();
    } else {
        // fout? gewoon terug
        header("Location: index.php");
        exit();
    }
}
?>

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
    <a href="pokemon_bijwerken.php">ga naar bijwerk pagina</a>
    <a href="pokemon_inbrengen.php">Ga naar de insert pagina</a>
    <a href="index.php">
        <h1>Heel veel sigma pokemons</h1>
    </a>

    <div>
        <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
            <a href="logout.php">Uitloggen</a>
        <?php else: ?>
            <form action="index.php" method="post" style="display:inline;">
                <input type="text" name="username" placeholder="username" required>
                <input type="password" name="password" placeholder="password" required>
                <button type="submit">Login</button>
            </form>
        <?php endif; ?>
    </div>
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
    $number = $row["number"];

    echo "<article>";
    echo $row["name"]. "<br>";
    echo "<img src='$img' alt='$name' width='50'>";
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        echo "<p><a href='pokemon_bijwerken.php?pokemonNumber=$number'>bewerk</a>;</p>";
        echo "<p><a href='pokemon_verwijderen.php?pokemonNumber=$number'>verwijder</a>;</p>";
    }
    "</article>";
}
?>
</main>
</body>
</html>