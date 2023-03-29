<?php

    /* PHPMotors review controller file
            * This file is accessed at http://lvh.me/phpmotors/vehicles
            * or at http://localhost/cse340/phpmotors/reviews/
            * 
            * This file controls all traffic to the http://lvh.me/phpmotors/ URL
    */

    // Get the database connection file
    require_once '../library/connections.php';
    // Get the PHP Motors model for use as needed
    require_once '../model/main-model.php';
    // Get the vehicles model
    require_once '../model/vehicles-model.php';
    // Access the uploads model file
    require_once '../model/uploads-model.php';
    // Access the reviews model file
    require_once '../model/reviews-model.php';
    // Access the functions file
    require_once '../library/functions.php';


    // Create or access a session
    session_start();

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
        case 'add-review':
            //Filter and store the data
            $reviewText = trim(filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $invId = trim(filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT));
            $clientId = trim(filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT));
        
            // $checkReview = checkReviewText($reviewText);
            if(empty($reviewText) || empty($invId) || empty($clientId)) {
                header("location:/cse340/phpmotors/vehicles/?action=inventory&invId=$invId");
                $_SESSION['message'] = '<p class="errorMessage">Please provide correct information for all required fields</p>';
                $message = $_SESSION['message'];
                exit;
            }
            $review = addReview($reviewText, $invId, $clientId);
            
            if ($review) {
                $_SESSION['message'] = "<p class='successMessage'>The review was successfully added.</p>";
                header("location:/cse340/phpmotors/vehicles/?action=inventory&invId=$invId");
                exit;
            } else {
                $_SESSION['message'] = "<p class='errorMessage'>Error! The review was not added.</p>";
                header("location:/cse340/phpmotors/vehicles/?action=inventory&invId=$invId");
                exit;
                
            }

        break;
        case 'getReviewItems': 
            // Get review data using review Id
            $reviewId = trim(filter_input(INPUT_GET, 'reviewId', FILTER_SANITIZE_NUMBER_INT));
            // Fetch the vehicles by classificationId from the DB 
            $reviewArray = getReviewsByReviewId($reviewId);
            // Convert the array to a JSON object and send it back
            echo json_encode($reviewArray);
        break;
        case 'mod':
            $reviewId = trim(filter_input(INPUT_GET, 'reviewId', FILTER_VALIDATE_INT));
            // echo ($reviewId);
            // exit;
            $reviewInfo = getReviewsByReviewId($reviewId);
            if(!$reviewInfo){
                $message = '<p class="errorMessage">Sorry, no reviews can be found.</p>';
            }
            include '../view/edit-review.php';
            exit;

        break;
        case 'update-review':
            $reviewId = trim((filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT)));
            $reviewText = trim((filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_FULL_SPECIAL_CHARS)));
            $invMake = trim((filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS)));
            $invModel = trim((filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS)));
            
            // $updated = updateReview(); 
            //Check for missing data
            if(empty($reviewId) || empty($reviewText) || empty($invMake) || empty($invModel)) {
                $message = '<p class="errorMessage">Please provide information for all empty form fields.</p>';
                include '../view/edit-review.php';
                exit;
            }
            //Send the data to the model
            $updateResult = updateReview($reviewId, $reviewText);
            $message = '<p class="successMessage">Congratulations! Your review was successfully updated.</p>';
            

            //Check and report the result
            if ($updateResult) {
                $message = "<p class='successMessage'>Congratulations, the $invMake $invModel review was successfully updated.</p>";
                $_SESSION['message'] = $message;
                header('location: /cse340/phpmotors/accounts/');
                exit;
            } else {
                $message = '<p class="errorMessage"> There was an error updating the review. Please try again. </p>';
                $_SESSION['message'] = $message;
                header("location: /cse340/phpmotors/reviews/?action=mod&reviewId=$reviewId");
                exit;
            }

        break;
        case 'del':
            $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_VALIDATE_INT);
            $reviewInfo = getReviewsByReviewId($reviewId);
            if ($reviewInfo) {
		        $message = '<p class="errorMessage">Sorry, no reviews could be found.</p>';
	        }
	        include '../view/delete-review.php';
	        exit;
        break;
        case 'delete-review':
            //Filter and store the data
            $invMake = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $invModel = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $reviewId = trim(filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT));


            if(empty($reviewId) || empty($invMake) || empty($invModel)) {
                $message = '<p class="errorMessage">Please provide information for all empty form fields.</p>';
                include '../view/delete-review.php';
                exit;
            }

            //Send the data to the model
            $deleteResult = deleteReview($reviewId);

            //Check and report the result
            if ($deleteResult) {
                $message = "<p class='successMessage'>The review for $invMake $invModel was	successfully deleted.</p>";
                $_SESSION['message'] = $message;
                header('location: /cse340/phpmotors/accounts/');
                exit;
            } else {
                $message = "<p class='errorMessage'>Error: The review for $invMake $invModel was not deleted.</p>";
                $_SESSION['message'] = $message;
                header("location: /cse340/phpmotors/reviews/?action=mod&reviewId=$reviewId");
                exit;
            }
        
        break;

        default:
            if(isset($_SESSION['loggedin'])){
                include '../view/admin.php';
            } else {
                include '../view/home.php';
            }
        break;
    }     


?>