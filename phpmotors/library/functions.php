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
        $classificationList = '<select name="classificationId" id="classificationList">'; 
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

    function buildVehicleInfoDisplay($vehicle){
        
        $dv = '<div id="vehicleInfoBox">';
            $dv .= '<div class=leftInfo>';
                $dv .= "<h1>$vehicle[invMake] $vehicle[invModel]</h1>";
                $dv .= "<img id='vehicleInfoImg' src='$vehicle[invImage]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'>";
                $dv .= '<h3>Price: $'.number_format($vehicle['invPrice']).'</h3>';
            $dv .= "</div>";
            $dv .= "<div class=rightInfo>";
                $dv .= "<h3>$vehicle[invMake] $vehicle[invModel] Details</h3>";
                $dv .= "<p id='vehicleDescription'>$vehicle[invDescription]</p>";
                $dv .= "<h3>Color: ".ucfirst($vehicle['invColor'])."</h3>";
                $dv .= "<h3>In Stock: ".number_format($vehicle['invStock'])."</h3>";
            $dv .= "</div>";
        $dv .= '</div>';

        return $dv;
    }


?>
