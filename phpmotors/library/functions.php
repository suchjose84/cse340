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
        $navList .= "<li><a href='/cse340/phpmotors/' title='View the PHP Motors home page'>Home</a></li>";
        foreach ($classifications as $classification) {
            $navList .= "<li><a href='/cse340/phpmotors/vehicles/?action=classification&classificationName=".urlencode($classification['classificationName']).
            "' title='View our $classification[classificationName] lineup of vehicles'>$classification[classificationName]</a></li>";
            
        }
        $navList .= '</ul>';

        return $navList;

    }

    // Build the classifications drop down list
    function buildClassificationList($classifications){ 
        $classificationList = '<select class="select" name="classificationId" id="classificationList">'; 
        $classificationList .= "<option>Choose a Classification</option>"; 
        foreach ($classifications as $classification) { 
        $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>"; 
        } 
        $classificationList .= '</select>'; 
        return $classificationList; 
    }
    // Build the unordered list of vehicles
    function buildVehiclesDisplay($vehicles){
        $dv = '<ul id="ulVehicles">';
        foreach ($vehicles as $vehicle) {
         $dv .= '<li class="vehicleListItem">';
         $dv .= "<a href='/cse340/phpmotors/vehicles/?action=inventory&invId={$vehicle['invId']}' class='vehicleList'>";         
         $dv .= "<img src='$vehicle[invThumbnail]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'></a>";
         $dv .= '<div class="cardLower"><hr>';
         $dv .= "<a href='/cse340/phpmotors/vehicles/?action=inventory&invId={$vehicle['invId']}'>$vehicle[invMake] $vehicle[invModel]</a>";
         $dv .= '<span class="vehiclesListSpan">$'.number_format($vehicle['invPrice'])."</span></div>";
         $dv .= '</li>';
        }
        $dv .= '</ul>';
        return $dv;
    }

    function buildVehicleInfoDisplay($vehicle, $thumbnails){
        $dv = "<h1>$vehicle[invMake] $vehicle[invModel]</h1>";
        $dv .= "<div id='vehicleDisplayMain'>";
            $dv .= '<div id="vehicleInfoBox">';
                $dv .= '<div class=leftInfo>';
                    $dv .= "<div id='vehicleImageBox'>";
                        $dv .= buildThumbnails($vehicle, $thumbnails);
                        $dv .= "<img id='vehicleInfoImg' src='$vehicle[imgPath]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'>";
                    $dv .= "</div>";
                    $dv .= '<h3>Price: $'.number_format($vehicle['invPrice']).'</h3>';
                $dv .= "</div>";
                $dv .= "<div class=rightInfo>";
                    $dv .= "<h3>$vehicle[invMake] $vehicle[invModel] Details</h3>";
                    $dv .= "<p id='vehicleDescription'>$vehicle[invDescription]</p>";
                    $dv .= "<h3>Color: ".ucfirst($vehicle['invColor'])."</h3>";
                    $dv .= "<h3>In Stock: ".number_format($vehicle['invStock'])."</h3>";
                $dv .= "</div>";
                
            $dv .= '</div>';
            $dv .= "<div id='thumbnailsOnBottomBox'>";
                $dv .= "<h3>Vehicle Thumbnails</h3>";
                $dv .= buildThumbnails($vehicle, $thumbnails);
            $dv .= "</div>";
        $dv .= '</div>';
        return $dv;
    }
    function buildThumbnails($vehicle, $thumbnails){
        $dv = "<ul class=thumbnailsListBox>";
            foreach($thumbnails as $thumbnail){
                $dv .= "<li>";
                $dv .= "<img src='{$thumbnail['imgPath']}' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'>";
                $dv .= "</li>";

                    }
        $dv .= "</ul>";
        return $dv;

    }

    /* * ********************************
    *  Functions for working with images
    * ********************************* */

    // Adds "-tn" designation to file name
    function makeThumbnailName($image) {
        $i = strrpos($image, '.');
        $image_name = substr($image, 0, $i);
        $ext = substr($image, $i);
        $image = $image_name . '-tn' . $ext;
        return $image;
    }

    function buildImageDisplay($imageArray) {
        $id = '<ul class="ul uploadUl" id="image-display">';
        foreach ($imageArray as $image) {
            $imgName = $image['imgName'];
            $class = strpos($imgName, '-tn') !== false ? ' class="thumbnails"' : 'class="mainPic"';
            $id .= '<li>';
            $id .= "<img src='$image[imgPath]' $class title='$image[invMake] $image[invModel] image on PHP Motors.com' alt='$image[invMake] $image[invModel] image on PHP Motors.com'>";
            $id .= "<p><a href='/cse340/phpmotors/uploads?action=delete&imgId=$image[imgId]&filename=$imgName' title='Delete the image'>Delete $imgName</a></p>";
            $id .= '</li>';
        }
        $id .= '</ul>';
        return $id;
    }

    /* * ********************************
    *  Functions for working with reviews
    * ********************************* */
    function buildReviews($reviews){
        //Show review form if client is logged in
        $dv = "<div class='reviewDivs'>";
        $dv .= "<h2>Customer Reviews</h2>";
        $dv .= "<h3>Review the {$_SESSION['invData']['invMake']} {$_SESSION['invData']['invModel']}</h3>";
        if(isset($_SESSION['message'])){
            $dv .= "$_SESSION[message]";
        }
        if(isset($_SESSION['loggedin'])){
            $firstLetter = substr($_SESSION['clientData']['clientFirstname'], 0, 1);
            $dv .= '<form class="reviewForm" action="/cse340/phpmotors/reviews/" method="post">';
                $dv .= "<label id='screenName'>Screen Name: {$firstLetter}{$_SESSION['clientData']['clientLastname']}</label>";
                $dv .= "<label class='top' for='addReviewInput'>Review: Max 500 chars";
                $dv .= "<textarea name='reviewText' required id='addReviewInput' class='reviewTextArea autoSize' placeholder='Write your review here' maxlength='500'></textarea></label>";
                $dv .= "<span class='remainingSpan'></span>";
                $dv .= "<input type='submit' class='submitButton reviewSubmitButton' value='Submit Review'>";
                $dv .= "<input type='hidden' name='invId' value='{$_SESSION['invData']['invId']}'>";
                $dv .= "<input type='hidden' name='clientId' value='{$_SESSION['clientData']['clientId']}'>";
                $dv .= "<input type='hidden' name='action' value='add-review'>";
            $dv .= '</form>';
        } else {
            $dv .= '<p class="vehicleInfoP">You must <a href="/cse340/phpmotors/accounts/?action=login">log in</a> to create a review</p>';
        }
        $dv .= "</div>";

        //Show reviews. If there are no reviews, tell the client to write a review if client is logged in. Show
        //show nothing if client is not logged in and no vehicles reviews in database
        $dv .= "<div class='reviewDivs' id='listedReviewsBox'>";
        if(!count($reviews) && isset($_SESSION['loggedin'])){
            $dv .= "<h3>No reviews yet. Be the first to write a review.</h3>";
        }
        foreach($reviews as $review) {
            $firstLetter = substr($review['clientFirstname'], 0, 1);
            $date = date("F j, Y h:i A", strtotime($review['reviewDate']));
            $dv .= "<form class='formShowReview'>";
            $dv .= "<label class='top'>{$firstLetter}{$review['clientLastname']} wrote on {$date}";
            $dv .= "<textarea class='top autoSize reviewVehicleInfo' readonly>{$review['reviewText']}</textarea></label>";
            $dv .= "</form>";
        }
        $dv .= '</div>';
        return $dv;
    }
    
    // Build the vehicles select list
    function buildVehiclesSelect($vehicles) {
        $prodList = '<select class="select" name="invId" id="invItem">';
        $prodList .= "<option>Choose a Vehicle</option>";
        foreach ($vehicles as $vehicle) {
        $prodList .= "<option value='$vehicle[invId]'>$vehicle[invMake] $vehicle[invModel]</option>";
        }
        $prodList .= '</select>';
        return $prodList;
    }

    // Handles the file upload process and returns the path
    // The file path is stored into the database
    function uploadFile($name) {
        // Gets the paths, full and local directory
        global $image_dir, $image_dir_path;
        if (isset($_FILES[$name])) {
        // Gets the actual file name
        $filename = $_FILES[$name]['name'];
        if (empty($filename)) {
        return;
        }
        // Get the file from the temp folder on the server
        $source = $_FILES[$name]['tmp_name'];
        // Sets the new path - images folder in this directory
        $target = $image_dir_path . '/' . $filename;
        // Moves the file to the target folder
        move_uploaded_file($source, $target);
        // Send file for further processing
        processImage($image_dir_path, $filename);
        // Sets the path for the image for Database storage
        $filepath = $image_dir . '/' . $filename;
        // Returns the path where the file is stored
        return $filepath;
        }
    }

    // Processes images by getting paths and 
    // creating smaller versions of the image
    function processImage($dir, $filename) {
        // Set up the variables
        $dir = $dir . '/';
    
        // Set up the image path
        $image_path = $dir . $filename;
    
        // Set up the thumbnail image path
        $image_path_tn = $dir.makeThumbnailName($filename);
    
        // Create a thumbnail image that's a maximum of 200 pixels square
        resizeImage($image_path, $image_path_tn, 200, 200);
    
        // Resize original to a maximum of 500 pixels square
        resizeImage($image_path, $image_path, 500, 500);
    }

    // Checks and Resizes image
    function resizeImage($old_image_path, $new_image_path, $max_width, $max_height) {
        
        // Get image type
        $image_info = getimagesize($old_image_path);
        $image_type = $image_info[2];
    
        // Set up the function names
        switch ($image_type) {
        case IMAGETYPE_JPEG:
        $image_from_file = 'imagecreatefromjpeg';
        $image_to_file = 'imagejpeg';
        break;
        case IMAGETYPE_GIF:
        $image_from_file = 'imagecreatefromgif';
        $image_to_file = 'imagegif';
        break;
        case IMAGETYPE_PNG:
        $image_from_file = 'imagecreatefrompng';
        $image_to_file = 'imagepng';
        break;
        default:
        return;
    } // ends the swith
    
        // Get the old image and its height and width
        $old_image = $image_from_file($old_image_path);
        $old_width = imagesx($old_image);
        $old_height = imagesy($old_image);
    
        // Calculate height and width ratios
        $width_ratio = $old_width / $max_width;
        $height_ratio = $old_height / $max_height;
    
        // If image is larger than specified ratio, create the new image
        if ($width_ratio > 1 || $height_ratio > 1) {
    
        // Calculate height and width for the new image
        $ratio = max($width_ratio, $height_ratio);
        $new_height = round($old_height / $ratio);
        $new_width = round($old_width / $ratio);
    
        // Create the new image
        $new_image = imagecreatetruecolor($new_width, $new_height);
    
        // Set transparency according to image type
        if ($image_type == IMAGETYPE_GIF) {
        $alpha = imagecolorallocatealpha($new_image, 0, 0, 0, 127);
        imagecolortransparent($new_image, $alpha);
        }
    
        if ($image_type == IMAGETYPE_PNG || $image_type == IMAGETYPE_GIF) {
        imagealphablending($new_image, false);
        imagesavealpha($new_image, true);
        }
    
        // Copy old image to new image - this resizes the image
        $new_x = 0;
        $new_y = 0;
        $old_x = 0;
        $old_y = 0;
        imagecopyresampled($new_image, $old_image, $new_x, $new_y, $old_x, $old_y, $new_width, $new_height, $old_width, $old_height);
    
        // Write the new image to a new file
        $image_to_file($new_image, $new_image_path);
        // Free any memory associated with the new image
        imagedestroy($new_image);
        } else {
        // Write the old image to a new file
        $image_to_file($old_image, $new_image_path);
        }
        // Free any memory associated with the old image
        imagedestroy($old_image);
    } // ends resizeImage function

    

?>
