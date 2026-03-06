<?php
function ShowDate()
{

// Combine date and time
    $dateTime = date('Y-m-d H:i:s');  // 2026-02-09 14:30:45
    $message = "Current date and time: $dateTime";

    return $message;
}

function TrafficLight($color, $ambulance)
{
    if ($color == "green" && $ambulance == false) {
        $result = "je mag doorrijden! De kleur is: $color";
    } else {
        $result = "je moet stoppen! De kleur is: $color";
    }
    return $result;
}


function maandenNodig($prijs, $perMaand)
{
    if ($perMaand <= 0) {
        return "Bedrag per maand moet groter dan 0 zijn";
    }

    return ceil($prijs / $perMaand);
}

function SavingGoal($goal, $monthly)
{
    $savings = 0;
    $month = 0;
    $intrest = 1.2;
    $showMessage = true;
    
    while($savings < $goal)
    {
        $savings = $savings + $monthly;
        $savings = $savings * $intrest;
        $month++;

        echo "in maand $month heb ik $savings gespaard.<br>";

        if ($savings >= ($goal/2) && $showMessage == true)
        {
            echo "Je bent op de helft.";
            $showMessage = false;
        }
    }
    return "ik heb $month maanden nodig om mijn $goal te halen.";

}
echo SavingGoal(5000, 100);





?>
