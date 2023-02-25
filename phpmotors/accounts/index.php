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
// Access the functions file
require_once '../library/functions.php';

// Create or access a session
session_start();


// Get the array of classifications
$classifications = getClassifications();

// Build a navigation bar using the $classifications array
// Build a navigation bar using the $classifications array
$navList = createNav($classifications);

// Get the value from the action name - value pair
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
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
            $clientEmail = checkEmail($clientEmail);
            $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $checkPassword = checkPassword($clientPassword);

            // Run basic checks, return if errors
            if(empty($clientEmail) || empty($checkPassword)){
                $message = '<p class="errorMessage">Please provide a valid email address and password.</p>';
                include '../view/login.php';
                exit; 
            }

            // A valid password exists, proceed with the login process
            // Query the client data based on the email address
            $clientData = getClient($clientEmail);

            // Compare the password just submitted against
            // the hashed password for the matching client
            $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);

            // If the hashes don't match create an error
            // and return to the login view
            if(!$hashCheck) {
            $message = '<p class="notice">Please check your password and try again.</p>';
            include '../view/login.php';
            exit;
            }
            // A valid user exists, log them in
            $_SESSION['loggedin'] = TRUE;

            // Remove the password from the array
            // the array_pop function removes the last
            // element from an array
            array_pop($clientData);

            // Store the array into the session
            $_SESSION['clientData'] = $clientData;

            // Send them to the admin view
            include '../view/admin.php';
            exit;

        break;
        case 'register':
            // Filter and store the data
            $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
            $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

            $clientEmail = checkEmail($clientEmail);
            $checkPassword = checkPassword($clientPassword);

            //Check for duplicate email
            $existingEmail = checkExistingEmail($clientEmail);
            
            if($existingEmail){
                $message = '<p class="notice">Email address already exists. Please log in instead.</p>';
                include '../view/login.php';
                exit;
            }

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
                setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
                $_SESSION['message'] = '<p class="successMessage">Thanks for registering '."$clientFirstname".'. Please use your email and password to login.</p>';
                header('Location: /cse340/phpmotors/accounts/?action=login');
                exit;
            } else {
                $message = '<p class="errorMessage">Sorry '."$clientFirstname".', but the registration failed. Please try again.</p>';
                include '../view/registration.php';
                exit;
            }
        break;
        case 'logout':
            //unset and destroy session when case is logout
            unset($_SESSION['clientData']);
            session_destroy();
            header('Location: /cse340/phpmotors/');

            
        default:
            include '../view/admin.php';
        break;
    }        





?>