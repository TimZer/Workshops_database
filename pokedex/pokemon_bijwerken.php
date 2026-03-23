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

    $pokemonNumber = $_GET["pokemonNumber"];

    $query = "SELECT * FROM pokemon WHERE number= $pokemonNumber;";

    include "../includes/db_functions.php";

    StartConnection("pokemondb");

    $result = ExecuteSelectQuery($query);

    $now = $result[0];

    $nowName = $now["name"];
    $nowNumber = $now["number"];
    $nowType1 = $now["type1"];
    $nowType2 = $now["type2"];
    $nowAbility = $now["ability"];
    $nowSpecies = $now["species"];
    $nowPicture = $now["picture"];



    if (isset($_POST["submitForm"])) {
        //var_dump($_POST);
        $name = $_POST['pokemonName'];
        $number = $_POST['pokemonNumber'];
        $type1 = $_POST['pokemonType1'];
        $type2 = $_POST['pokemonType2'];
        $ability = $_POST['pokemonAbility'];
        $species = $_POST['pokemonSpecies'];
        $picture = $_POST['pokemonPicture'];
    }

?>

<form action="pokemon_bijwerken.php" method="post">
    <fieldset>
        <p>
            <label>name</label>
            <input type="text" name="pokemonName" id="name" value="<?php echo $nowName; ?>">
        </p>
        <p>
            <label>number</label>
            <input type="number" name="pokemonNumber" id="number" value="<?php echo $nowNumber; ?>">
        </p>
        <p>
            <label>type1</label>
            <input type="text" name="pokemonType1" id="type1" value="<?php echo $nowType1; ?>">
        </p>
        <p>
            <label>type2</label>
            <input type="text" name="pokemonType2" id="type2" value="<?php echo $nowType2; ?>">
        </p>
        <p>
            <label>ability</label>
            <input type="text" name="pokemonAbility" id="ability" value="<?php echo $nowAbility; ?>">
        </p>
        <p>
            <label>species</label>
            <input type="text" name="pokemonSpecies" id="species" value="<?php echo $nowSpecies; ?>">
        </p>
        <p>
            <label>picture</label>
            <input type="url" name="pokemonPicture" id="picture" value="<?php echo $nowPicture; ?>">
        </p>
        <p>
            <input type="submit" name="submitForm">
        </p>
    </fieldset>
</form>






</body>
</html>