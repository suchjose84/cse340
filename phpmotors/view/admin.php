<?php
    if(!$_SESSION['loggedin']){
        header('Location: /cse340/phpmotors/');
    }
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page | PHPMotors</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="/cse340/phpmotors/css/styles.css" media="screen">
    <link rel="stylesheet" href="/cse340/phpmotors/css/styles_tablet.css" media="screen">
    <link rel="stylesheet" href="/cse340/phpmotors/css/styles_large.css" media="screen">

    

</head>

<body>
    <div class="wrapper">
        <!--header, nav, and footer templates-->
        <?php require $_SERVER['DOCUMENT_ROOT'].'/cse340/phpmotors/snippets/header.php'?>
        <nav><?php echo $navList; ?></nav>
        <main class="mainPage">
            
            <h1><?php echo $_SESSION['clientData']['clientFirstname']." ".$_SESSION['clientData']['clientLastname'];?></h1>
            <?php 
                if(isset($_SESSION['message'])){
                    echo $_SESSION['message'];
                }
            ?>
            <p>You are logged in</p>

            <ul>
                <li>Client ID: <?php echo $_SESSION['clientData']['clientId']?></li>
                <li>Client First Name: <?php echo $_SESSION['clientData']['clientFirstname']?></li>
                <li>Client Last Name: <?php echo $_SESSION['clientData']['clientLastname']?></li>
                <li>Client Email: <?php echo $_SESSION['clientData']['clientEmail']?></li>
            </ul>
            <div>
                <h3>Account Management</h3>
                <p>Use this link to update account information</p>
                <a href="/cse340/phpmotors/accounts/?action=client-update">Update Account Information</a>
                <h3>Manage your Product Reviews</h3>

                <?php
                    
                    if(isset($reviews) && !empty($reviews)) {
                        $dv = "<ul>";
                        foreach($reviews as $review){
                            $date = date("F j, Y h:i A", strtotime($review['reviewDate']));
                            $dv .= "<li>{$review['invMake']}{$review['invModel']} (Reviewed on $date): ";
                            $dv .= "<a href='/cse340/phpmotors/reviews/?action=mod&reviewId={$review['reviewId']}'>Edit</a>";
                            $dv .= " | <a href='/cse340/phpmotors/reviews/?action=del&reviewId={$review['reviewId']}'>Delete</a></li>";
                        }
                        $dv .= "</ul>";
                        echo $dv;
                    } else {
                        echo "No reviews found.";
                    }

                ?>


            </div>

            <?php 
                if($_SESSION['clientData']['clientLevel'] > 1) {
                    $manageInventory = '<h3>Inventory Management</h3>';
                    $manageInventory .= '<p>Use this link to manage the inventory</p>';
                    $manageInventory .= '<a href="/cse340/phpmotors/vehicles/">Vehicle Management</a>';
                    echo $manageInventory;
                }
            
            
            ?>
        
        
        </main>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/cse340/phpmotors/snippets/footer.php'?>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ['orbitron', 'Genos']
            }
        });
    </script>

</body>

</html><?php unset($_SESSION['message']);?>