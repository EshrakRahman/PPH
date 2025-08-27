<?php

$number = -0;
if ($number === 0) {
    echo " The number {$number} is neither positive nor negative and even";

}else if ($number > 0 && $number % 2 == 0 ) {
   
    echo " The number {$number} is positive and even";

} else if ($number < 0 && $number % 2 == 0) {
    echo " The number {$number} is negative and even";
 
} else {
    echo " The number {$number} is negative and odd";

}