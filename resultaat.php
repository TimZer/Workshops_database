<?php

//var_dump($_POST);

if (isset($_POST['form_verzonden']))
{


    $name = $_POST['Naam'];

    echo $name;

    $email = $_POST['Email'];

    echo $email;


    if (isset($_POST ['Gender'])) {
        $Gender = $_POST['Gender'];

        echo $Gender;
    }

}
else
{
    echo "U komt niet vanaf het formulier is verplicht";
}


