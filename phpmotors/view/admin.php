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
    <title>PHP Motors Header, Nav, Footer Template</title>
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

            <ul>
                <li>Client ID: <?php echo $_SESSION['clientData']['clientId']?></li>
                <li>Client First Name: <?php echo $_SESSION['clientData']['clientFirstname']?></li>
                <li>Client Last Name: <?php echo $_SESSION['clientData']['clientLastname']?></li>
                <li>Client Email: <?php echo $_SESSION['clientData']['clientEmail']?></li>
                <li>Client Level: <?php echo $_SESSION['clientData']['clientLevel']?></li>
            </ul>

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

</html>