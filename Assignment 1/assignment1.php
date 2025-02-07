<?php

/* Challenge 1*/
$name = "John";
$age = 25;
$favoriteColor = "blue";

echo "My name is " . $name . ", I am " . $age . " years old and my favorite color is " . $favoriteColor .".";

echo "\n"; // New line

/* Challenge 2 */
echo "\"He said, \"PHP is fun!\" and left.\"";
echo "\n"; // New line
echo "\n \tFirst line \n \tSecond line";

echo "\n"; // New line

/* Challenge 3 */
$greeting = "Welcome to the PHP world!";
$age = 25;

echo $greeting . "\nYour age is " .$age; 

echo "\n"; // New line

/* Challenge 4 */

echo "Welcome to PHP! "; // this line was missing an ending semicolon
$name = "John"; // "John" was missing the quotation marks
echo "Hello, $name"; /* Should have used "" instead of '' so that the variables expression was used 
instead of the name of the variable
Also missing the closing " */ 


echo "\n"; // New line

/* Challenge 5 */
$price = 50; //assigns the int 50 to the variable named price
$discount = 10; // assigns the int 10 to the variable named discount
/*  Calculation of the final price which is calculated by subtracting 
the discount amount from the price and assigning this value to 
finalPrice */
$finalPrice = $price - $discount; 

# Displays the total price
echo "Total price: $" .$finalPrice;
?>