<?php




?>
<form method="post" action="resultaat.php">

    <p>
    <label>Naam</label>
        <input type="text" name="Naam">

        <input type="submit">
    </p>

    <p>
        <label>Email</label>
        <input type="email" name="Email">

        <input type="submit">
    </p>

    <p>
    <label>Gender</label>
        <input type="radio" name="Gender" value="man">Man
        <input type="radio" name="Gender" value="vrouw">Vrouw

        <input type="submit" name="form_verzonden" value="Nu verzonden">
    </p>

</form>