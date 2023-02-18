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
        require_once '../model/vehicles-model.php';

    // Get the array of classifications
    $classifications = getClassifications();

    // Build a navigation bar using the $classifications array
    $navList = '<ul>';
    $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
    foreach ($classifications as $classification) {
        $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName']).
        "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
    }
    $navList .= '</ul>';

    //Build a drop down list using the $classifications array
    $classificationList = '<label for="vehicleList">';
    $classificationList .= '<select id="vehicleList" name="classificationID" autofocus required>';
    $classificationList .= '<option value="" selected>Choose a car classification</option>';
    foreach($classifications as $classification) {
        $classificationList .= "<option value='" . $classification['classificationID'] . "'>" . 
        $classification['classificationName'] . "</option>";
    }
    $classificationList .= '</select></label>';

    //Name value pair in this part using filter input and switch
    $action = filter_input(INPUT_POST, 'action');
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
            $classificationName = filter_input(INPUT_POST, 'classificationName');
            
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
            $classificationID = filter_input(INPUT_POST, 'classificationID');
            $invMake = filter_input(INPUT_POST, 'invMake');
            $invModel = filter_input(INPUT_POST, 'invModel');
            $invDescription = filter_input(INPUT_POST, 'invDescription');
            $invImage = filter_input(INPUT_POST, 'invImage');
            $invThumbnail = filter_input(INPUT_POST, 'invThumbnail');
            $invPrice = filter_input(INPUT_POST, 'invPrice');
            $invStock = filter_input(INPUT_POST, 'invStock');
            $invColor = filter_input(INPUT_POST, 'invColor');
            // echo $classificationID;
            // exit;

            //Check for missing data
            if(empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice)
            || empty($invStock) || empty($invColor) || empty($classificationID)) {
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