<?php

    /* PHPMotors Main Controller
            * This file is accessed at http://lvh.me/phpmotors/vehicles
            * or at http://localhost/cse340/phpmotors/vehicles/
            * 
            * This file controls all traffic to the http://lvh.me/phpmotors/ URL
    */

    // Get the database connection file
        require_once '../library/connections.php';
        // Get the PHP Motors model for use as needed
        require_once '../model/main-model.php';
        // Get the vehicles model
        require_once '../model/vehicles-model.php';
        // Access the functions file
        require_once '../library/functions.php';

    // Get the array of classifications
    $classifications = getClassifications();

    // Build a navigation bar using the $classifications array
    $navList = createNav($classifications);

    //Name value pair in this part using filter input and switch
    $action = trim(filter_input(INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        if ($action == NULL) {
            $action = filter_input(INPUT_GET, 'action');
        }        
            
    switch ($action) {
        case 'add-vehicle';
            include '../view/addVehicle.php';
        break;
        case 'add-classification';
            include '../view/addClassification.php';
        break;

        
        case 'addClassificationSubmit';
            //Filter and store the data
            $classificationName = trim(filter_input(INPUT_POST, 'classificationName', FILTER_SANITIZE_FULL_SPECIAL_CHARS ));
            
            //Check for missing data
            if(empty($classificationName)) {
                $message = '<p class="errorMessage"> Please provide information for all empty form fields. </p>';
                include '../view/addClassification.php';
                exit;
            }
            //Send the data to the model
            $addClassOutcome = addClassification($classificationName);

            //Check and report the result
            if($addClassOutcome === 1) {
                header('Location:?');
                exit;
            } else {
                $message = "<p>There was an error adding the classification to the database. Please try again.</p>";
                include '../view/addClassification.php';
                exit;
            }
        break;

        case 'addVehicleSubmit';
            //Filter and store the data
            $classificationID = trim(filter_input(INPUT_POST, 'classificationID', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $invMake = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $invModel = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $invDescription = trim(filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $invImage = trim(filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $invThumbnail = trim(filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $invPrice = trim(filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
            $invStock = trim(filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT));
            $invColor = trim(filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            // echo $classificationID;
            // exit;

            $checkMake = checkMake($invMake);
            $checkModel = checkModel($invModel);
            $checkImage = checkImage($invImage);
            $checkThumbnail = checkThumbnail($invThumbnail);
            $checkPrice = checkPrice($invPrice);
            $checkStock = checkStock($invStock);
            $checkColor = checkColor($invColor);



            //Check for missing data
            if(empty($checkMake) || empty($checkModel) || empty($invDescription) || empty($checkImage) || empty($checkThumbnail) || empty($checkPrice)
            || empty($checkStock) || empty($checkColor) || empty($classificationID)) {
                $message = '<p class="errorMessage"> Please provide information for all empty form fields. </p>';
                include '../view/addVehicle.php';
                exit;
            }
            //Send the data to the model
            $addClassOutcome = addVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, 
            $invStock, $invColor, $classificationID);
            $message = '<p class="successMessage">The car information was successfully added to the database</p>';
            

            //Check and report the result
            if($addClassOutcome === 1) {
                include '../view/addVehicle.php';
                exit;
            } else {
                $message = '<p class="errorMessage"> There was an error adding the classification to the database. Please try again. </p>';
                include '../view/addVehicle.php';
                exit;
            }
        break;

        default:
            include '../view/vehicle-man.php';
    }        





?>