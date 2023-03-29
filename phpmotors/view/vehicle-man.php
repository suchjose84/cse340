<?php
    if($_SESSION['clientData']['clientLevel'] < 2){
        header('Location: /cse340/phpmotors/');
    }
    if(isset($_SESSION['message'])){
        $message = $_SESSION['message'];
    }

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Management | PHPMotors</title>
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
        <main class="mainPage" id="vehicleManMain">
            <section class="boxShadow">
                <h1>Vehicle Management</h1>

                <ul class="vehicleManUL">
                    <li><a href="/cse340/phpmotors/vehicles/?action=add-classification">Add Classification</a></li>
                    <li><a href="/cse340/phpmotors/vehicles/?action=add-vehicle">Add Vehicle</a></li>
                    <li><a href="/cse340/phpmotors/uploads/">Image Management</a></li>

                </ul>

                <?php
                    if (isset($message)) { 
                        echo $message; 
                    } 
                    if (isset($classificationList)) { 
                        echo '<h2>Vehicles By Classification</h2>'; 
                        echo '<p>Choose a classification to see those vehicles</p>'; 
                        echo $classificationList; 
                    }
                ?>

                <noscript>
                <p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
                </noscript>

                <table id="inventoryDisplay"></table>


            </section>
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

    <script src="../js/inventory.js"></script>

</body>

</html><?php unset($_SESSION['message']); ?>