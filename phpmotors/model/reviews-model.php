<?php 

    function addReview($reviewText, $invId, $clientId) {
        
        $db = phpmotorsConnect();

        // // The SQL statement
        $sql = 'INSERT INTO reviews (reviewText, invId, clientId)
        VALUES (:reviewText, :invId, :clientId)';

        // Create the prepared statement using the phpmotors connection
        $stmt = $db->prepare($sql);

        // The next line replace the placeholders in the SQL statement with the actual values in the variables
        // and tells the database the type of data it is
        $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
        $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
        $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);

        //execute request
        $stmt->execute();
        // Ask how many rows changed as a result of our insert
        $rowsChanged = $stmt->rowCount();
        // Close the database interaction
        $stmt->closeCursor();
        // Return the indication of success (rows changed)
        return $rowsChanged;

    }

    function getReviews($invId) {
        
        $db = phpmotorsConnect();

        // // The SQL statement
        $sql = 'SELECT Reviews.reviewId, Reviews.reviewText, Reviews.reviewDate, Reviews.invId, Reviews.clientId,
        Clients.clientFirstname, Clients.clientLastname, Inventory.invMake, Inventory.invModel
        FROM Reviews INNER JOIN Clients 
        ON Reviews.clientId = Clients.clientId
        INNER JOIN Inventory
        ON Reviews.invId = Inventory.invId
        WHERE Reviews.invId = :invId 
        ORDER BY Reviews.reviewDate DESC';

        // Create the prepared statement using the phpmotors connection
        $stmt = $db->prepare($sql);

        // The next line replace the placeholders in the SQL statement with the actual values in the variables
        // and tells the database the type of data it is
        $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);

        // Insert the data
        $stmt->execute();
        $revInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $revInfo;

    }
    function getReviewsByClientId($clientId) {
        
        $db = phpmotorsConnect();

        // // The SQL statement
        $sql = 'SELECT Reviews.reviewId, Reviews.reviewText, Reviews.reviewDate, Reviews.invId, Reviews.clientId,
        Clients.clientFirstname, Clients.clientLastname, Inventory.invMake, Inventory.invModel
        FROM Reviews INNER JOIN Clients 
        ON Reviews.clientId = Clients.clientId
        INNER JOIN Inventory
        ON Reviews.invId = Inventory.invId
        WHERE Reviews.clientId = :clientId
        ORDER BY Reviews.reviewDate DESC';

        // Create the prepared statement using the phpmotors connection
        $stmt = $db->prepare($sql);

        // The next line replace the placeholders in the SQL statement with the actual values in the variables
        // and tells the database the type of data it is
        $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);

        // Insert the data
        $stmt->execute();
        $revInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $revInfo;

    }
    function getReviewsByReviewId($reviewId) {
        
        $db = phpmotorsConnect();

        // // The SQL statement
        $sql = 'SELECT Reviews.reviewId, Reviews.reviewText, Reviews.reviewDate, Reviews.invId, Reviews.clientId,
        Clients.clientFirstname, Clients.clientLastname, Inventory.invMake, Inventory.invModel
        FROM Reviews INNER JOIN Clients 
        ON Reviews.clientId = Clients.clientId
        INNER JOIN Inventory
        ON Reviews.invId = Inventory.invId
        WHERE Reviews.reviewId = :reviewId';

        // Create the prepared statement using the phpmotors connection
        $stmt = $db->prepare($sql);

        // The next line replace the placeholders in the SQL statement with the actual values in the variables
        // and tells the database the type of data it is
        $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);

        // Insert the data
        $stmt->execute();
        $revInfo = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $revInfo;

    }

    //this function will update the review on the database
    function updateReview($reviewId, $reviewText) {

        // Create a connection object using the phpmotors connection function
        $db = phpmotorsConnect();

        // // The SQL statement
        $sql = 'UPDATE Reviews 
        SET reviewText = :reviewText 
        WHERE reviewId = :reviewId';

        // Create the prepared statement using the phpmotors connection
        $stmt = $db->prepare($sql);

        // The next line replace the placeholders in the SQL statement with the actual values in the variables
        // and tells the database the type of data it is
        $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
        $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);

        // Insert the data
        $stmt->execute();
        // Ask how many rows changed as a result of our insert
        $rowsChanged = $stmt->rowCount();
        // Close the database interaction
        $stmt->closeCursor();
        // Return the indication of success (rows changed)
        return $rowsChanged;

    }

    //this function will delete the review on the database
    function deleteReview($reviewId) {

        // Create a connection object using the phpmotors connection function
        $db = phpmotorsConnect();

        // // The SQL statement
        $sql = 'DELETE FROM Reviews WHERE reviewId = :reviewId';

        // Create the prepared statement using the phpmotors connection
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);

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