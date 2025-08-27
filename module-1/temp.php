<?php 


function convertToCelsius(int|float $temp) : int|float {

    return round(($temp - 32) * 5/9,2);
}

function convertToFer(int $temp) : int|float {
    return round(($temp * 9/5) + 32,2);
}

echo convertToFer(34);
echo "<br>";
echo convertToCelsius(93.2);