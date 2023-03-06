<?php 

    //this function will add classification to carClassification database
    function addClassification($classificationName) {
        
        // Create a connection object using the phpmotors connection function
        $db = phpmotorsConnect();

        // The SQL statement
        $sql = 'INSERT INTO carClassification (classificationName)
        VALUES (:classificationName)';

        // Create the prepared statement using the phpmotors connection
        $stmt = $db->prepare($sql);

        // The next line replace the placeholders in the SQL
        // statement with the actual values in the variables
        // and tells the database the type of data it is
        $stmt->bindValue(':classificationName', $classificationName, PDO::PARAM_STR);

        // Insert the data
        $stmt->execute();
        // Ask how many rows changed as a result of our insert
        $rowsChanged = $stmt->rowCount();
        // Close the database interaction
        $stmt->closeCursor();
        // Return the indication of success (rows changed)
        return $rowsChanged;

    }


    //this function will add classification to carClassification database
    function addVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, 
    $classificationID) {


        
        // Create a connection object using the phpmotors connection function
        $db = phpmotorsConnect();

        // // The SQL statement
        $sql = 'INSERT INTO inventory (invMake, invModel, invDescription, invImage, invThumbnail, invPrice, invStock, 
        invColor, classificationID)
        VALUES (:invMake, :invModel, :invDescription, :invImage, :invThumbnail, :invPrice, :invStock, :invColor, 
        :classificationID)';

        // Create the prepared statement using the phpmotors connection
        $stmt = $db->prepare($sql);

        // The next line replace the placeholders in the SQL statement with the actual values in the variables
        // and tells the database the type of data it is
        $stmt->bindValue(':invMake', $invMake, PDO::PARAM_STR);
        $stmt->bindValue(':invModel', $invModel, PDO::PARAM_STR);
        $stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
        $stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
        $stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
        $stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_INT);
        $stmt->bindValue(':invStock', $invStock, PDO::PARAM_INT);
        $stmt->bindValue(':invColor', $invColor, PDO::PARAM_STR);
        $stmt->bindValue(':classificationID', $classificationID, PDO::PARAM_INT);



        // Insert the data
        $stmt->execute();
        // Ask how many rows changed as a result of our insert
        $rowsChanged = $stmt->rowCount();
        // Close the database interaction
        $stmt->closeCursor();
        // Return the indication of success (rows changed)
        return $rowsChanged;

    }

    // Get vehicles by classificationId 
    function getInventoryByClassification($classificationId){ 
    $db = phpmotorsConnect(); 
    $sql = ' SELECT * FROM inventory WHERE classificationId = :classificationId'; 
    $stmt = $db->prepare($sql); 
    $stmt->bindValue(':classificationId', $classificationId, PDO::PARAM_INT); 
    $stmt->execute(); 
    $inventory = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    $stmt->closeCursor(); 
    return $inventory; 
    }

    // Get vehicle information by invId
    function getInvItemInfo($invId){
    $db = phpmotorsConnect();
    $sql = 'SELECT * FROM inventory WHERE invId = :invId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $invInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $invInfo;
    }

    //this function will update classification to carClassification database
    function updateVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice,
    $invStock, $invColor, $classificationId, $invId) {

        // Create a connection object using the phpmotors connection function
        $db = phpmotorsConnect();

        // // The SQL statement
        $sql = 'UPDATE inventory SET invMake = :invMake, invModel = :invModel, 
        invDescription = :invDescription, invImage = :invImage, 
        invThumbnail = :invThumbnail, invPrice = :invPrice, 
        invStock = :invStock, invColor = :invColor, 
        classificationId = :classificationId WHERE invId = :invId';

        // Create the prepared statement using the phpmotors connection
        $stmt = $db->prepare($sql);

        // The next line replace the placeholders in the SQL statement with the actual values in the variables
        // and tells the database the type of data it is
        $stmt->bindValue(':invMake', $invMake, PDO::PARAM_STR);
        $stmt->bindValue(':invModel', $invModel, PDO::PARAM_STR);
        $stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
        $stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
        $stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
        $stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_INT);
        $stmt->bindValue(':invStock', $invStock, PDO::PARAM_INT);
        $stmt->bindValue(':invColor', $invColor, PDO::PARAM_STR);
        $stmt->bindValue(':classificationId', $classificationId, PDO::PARAM_INT);
        $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);

        // Insert the data
        $stmt->execute();
        // Ask how many rows changed as a result of our insert
        $rowsChanged = $stmt->rowCount();
        // Close the database interaction
        $stmt->closeCursor();
        // Return the indication of success (rows changed)
        return $rowsChanged;

    }

    //this function will delete classification to carClassification database
    function deleteVehicle($invId) {

        // Create a connection object using the phpmotors connection function
        $db = phpmotorsConnect();

        // // The SQL statement
        $sql = 'DELETE FROM inventory WHERE invId = :invId';

        // Create the prepared statement using the phpmotors connection
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);

        // Insert the data
        $stmt->execute();
        // Ask how many rows changed as a result of our insert
        $rowsChanged = $stmt->rowCount();
        // Close the database interaction
        $stmt->closeCursor();
        // Return the indication of success (rows changed)
        return $rowsChanged;

    }


?>