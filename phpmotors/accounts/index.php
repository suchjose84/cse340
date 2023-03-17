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
$action = trim(filter_input(INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
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

            // Run basic checks, return if errors
            if(empty($clientEmail) || empty($checkPassword)){
                $message = '<p class="errorMessage">Please provide a valid email address and password.</p>';
                $_SESSION['message'] = $message;
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
            $message = '<p class="errorMessage">Log in failed. Please check your username and password and try again.</p>';
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
            header('location: /cse340/phpmotors/accounts');
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
            session_unset();
            session_destroy();
            header('Location: /cse340/phpmotors/');

        break;
        case 'client-update';
            include '../view/client-update.php';
        break;
        case 'accountUpdate';

            // Filter data from Post
            $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));

            //server side validation on the email
            $clientEmail = checkEmail($clientEmail);

            //if email is existing in database, show error
            if($clientEmail != $_SESSION['clientData']['clientEmail']){
                $existingEmail = checkExistingEmail($clientEmail);
                if($existingEmail){
                    $message = '<p class="errorMessage">Email address already in use.</p>';
                    $_SESSION['message'] = $message;
                include '../view/client-update.php';
                exit;
                }
            }
            if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)){
                $message = '<p class="errorMessage">Please provide information for all empty form fields.</p>';
                $_SESSION['message'] = $message;
                include '../view/client-update.php';
                exit; 
            }
            //talk to model to update information on the database
            $updateResult = updateClient($clientFirstname, $clientLastname, $clientEmail, $_SESSION['clientData']['clientId']);

            if($updateResult) {
                //get client data from the database and store it on the session, remove the password for security
                $clientData = getClientFromId($_SESSION['clientData']['clientId']);
                array_pop($clientData);
                //Store client data to the session
                $_SESSION['clientData'] = $clientData;
                $message = "<p class='successMessage'>The account information was successfully updated.</p>";
                $_SESSION['message'] = $message;
                header('location: /cse340/phpmotors/accounts/');
                exit;

            } else {
                $message = '<p class="errorMessage">Sorry '."$clientFirstname".', but the update failed. Please try again.</p>';
                $_SESSION['message'] = $message;
                include '../view/client-update.php';
                exit;
            }
            
        break;
        case 'pwordChange';
            //filter from post
            $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            
            //server-side password validation
            $checkPassword = checkPassword($clientPassword);
            if(empty($checkPassword)){
                $message = '<p class="errorMessage">Please enter a valid password.</p>';
                $_SESSION['message'] = $message;
                include '../view/client-update.php';
                exit; 
            }
            //If no errors, hash the password
            $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

            //update the pword on the database
            $updPwordResult = updatePassword($hashedPassword, $_SESSION['clientData']['clientId']);

            if($updPwordResult){
                $message = "<p class='successMessage'>The password information was successfully updated.</p>";
                $_SESSION['message'] = $message;
                header('location: /cse340/phpmotors/accounts/');
                exit;

            } else {
                $message = '<p class="errorMessage">Sorry, but there was an error changing the password. Please try again.</p>';
                $_SESSION['message'] = $message;
                include '../view/client-update.php';
                exit;
            }
 
        break;
        default:
            include '../view/admin.php';
        break;
    }        





?>