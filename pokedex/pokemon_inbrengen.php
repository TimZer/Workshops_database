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
    if (isset($_POST["submitForm"])) {
       //var_dump($_POST);
        $name = $_POST['pokemonName'];
        $number = $_POST['pokemonNumber'];
        $type1 = $_POST['pokemonType1'];
        $type2 = $_POST['pokemonType2'];
        $ability = $_POST['pokemonAbility'];
        $species = $_POST['pokemonSpecies'];
        $picture = $_POST['pokemonPicture'];


        $query = "INSERT INTO pokemon (name, number, type1, type2, ability, species, picture) 
        VALUES ('$name', '$number', '$type1', '$type2', '$ability', '$species', '$picture')";

        include "../includes/db_functions.php";

        StartConnection("pokemondb");

        $rowsAffected = ExecuteQuery($query);
        if ($rowsAffected >= 1)
        {
            echo "U heeft een $name toegevoegd!";
        }
        else
        {
            echo "helaas er is iets fout gegaan! ";
        }
    }



    ?>


    <form action="pokemon_inbrengen.php" method="post">
        <fieldset>
        <p>
            <label>name</label>
            <input type="text" name="pokemonName" id="name">
        </p>
        <p>
            <label>number</label>
            <input type="number" name="pokemonNumber" id="number">
        </p>
        <p>
            <label>type1</label>
            <input type="text" name="pokemonType1" id="type1">
        </p>
        <p>
            <label>type2</label>
            <input type="text" name="pokemonType2" id="type2">
        </p>
        <p>
            <label>ability</label>
            <input type="text" name="pokemonAbility" id="ability">
        </p>
        <p>
            <label>species</label>
            <input type="text" name="pokemonSpecies" id="species">
        </p>
        <p>
            <label>picture</label>
            <input type="url" name="pokemonPicture" id="picture">
        </p>
        <p>
            <input type="submit" name="submitForm">
        </p>
        </fieldset>
    </form>






</body>
</html>



