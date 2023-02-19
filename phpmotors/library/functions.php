<?php
// Check the email
function checkEmail($clientEmail){
    $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
    return $valEmail;

}

// Check the password for a minimum of 8 characters,
// at least one 1 capital letter, at least 1 number and
// at least 1 special character

function checkPassword($clientPassword){
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]\s])(?=.*[A-Z])(?=.*[a-z])(?:.{8,})$/';
    return preg_match($pattern, $clientPassword);
}

function checkMake($invMake){
    $pattern = '/^.{0,30}$/';
    return preg_match($pattern, $invMake);
}

function checkModel($invModel){
    $pattern = '/^.{0,30}$/';
    return preg_match($pattern, $invModel);
}

function checkImage($invImage){
    $pattern = '/^.{0,50}$/';
    return preg_match($pattern, $invImage);
}

function checkThumbnail($invThumbnail){
    $pattern = '/^.{0,50}$/';
    return preg_match($pattern, $invThumbnail);
}

function checkPrice($invPrice){
    $pattern = '/^(?!0\d)\d{0,10}(\.\d{1,2})?$/';
    return preg_match($pattern, $invPrice);
}

function checkStock($invStock){
    $pattern = '/^(?:[1-9]\d{0,3}|0)$/';
    return preg_match($pattern, $invStock);
}

function checkColor($invColor){
    $pattern = '/^.{0,30}$/';
    return preg_match($pattern, $invColor);
}

//Create the nav using a function
function createNav($classifications){
    $navList = '<ul>';
    $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
    foreach ($classifications as $classification) {
        $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName']).
        "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
    }
    $navList .= '</ul>';

    return $navList;

}


?>
