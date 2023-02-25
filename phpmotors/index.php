<?php

    /* PHPMotors Main Controller
            * This file is accessed at http://lvh.me/phpmotors/
            * or at http://lvh.me/phpmotors/index.php
            * 
            * This file controls all traffic to the http://lvh.me/phpmotors/ URL
    */

    // Get the database connection file
    require_once 'library/connections.php';

    // Get the PHP Motors model for use as needed
    require_once 'model/main-model.php';

    // Access the functions file
    require_once 'library/functions.php';

    // Create or access a session
    session_start();

    
    

    // Get the array of classifications
    $classifications = getClassifications();

    // Build a navigation bar using the $classifications array
    $navList = createNav($classifications);

    $action = trim(filter_input(INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
    }  
    
    // Check if the firstname cookie exists, get its value
    if(isset($_COOKIE['firstname'])){
        $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
        
    switch ($action) {
        case 'something';
            break;
        default:
            include 'view/home.php';
    }        





?>