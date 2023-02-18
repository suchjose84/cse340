<?php

/* PHPMotors Accounts Controller
         * This file is accessed at http://lvh.me/phpmotors/
         * or at http://localhost/cse340/phpmotors/accounts/
         * 
         * This file controls all traffic to the http://lvh.me/phpmotors/ URL
*/

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the accounts model
require_once '../model/accounts-model.php';
// Get the validate email function
require_once '../library/functions.php';


// Get the array of classifications
$classifications = getClassifications();

// Build a navigation bar using the $classifications array
$navList = '<ul>';
$navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
    $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';

// Get the value from the action name - value pair
$action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
    }        
        
    switch ($action) {
        // Code to deliver the views will be here
        case 'login';
            include '../view/login.php';
        break;
        case 'signup';
            include '../view/register.php';
        break;
        case 'signin';
            $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
            $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

            $clientEmail = checkEmail($clientEmail);
            $checkPassword = checkPassword($clientPassword);

            if(empty($clientEmail) || empty($checkPassword)){
                $message = '<p class="errorMessage">Please provide information for all empty form fields.</p>';
                include '../view/login.php';
                exit; 
            } else {
                $message = '<p class="successMessage">Log In Success!</p>';
                include '../view/login.php';
                exit; 
            }

        break;
        case 'register':
            // Filter and store the data
            $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
            $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

            $clientEmail = checkEmail($clientEmail);
            $checkPassword = checkPassword($clientPassword);

            // Check for missing data
            if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)){
            $message = '<p class="errorMessage">Please provide information for all empty form fields.</p>';
            include '../view/register.php';
            exit; 
            }
            
            // Hash the checked password
            $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
            //Send the data to the model
            $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);
            // Check and report the result
            if($regOutcome === 1){
                $message = '<p class="successMessage">Thanks for registering '."$clientFirstname".'. Please use your email and password to login.</p>';
                // header('Location:?action=login');
                include '../view/login.php';
                exit;
            } else {
                $message = '<p class="errorMessage">Sorry '."$clientFirstname".', but the registration failed. Please try again.</p>';
                include '../view/registration.php';
                exit;
            }
        break;

            
        default:
            include '../view/home.php';
            break;
    }        





?>