<?php

    if($_SESSION['clientData']['clientLevel'] < 2){
        header('location: /phpmotors/');
        exit;
    }

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(isset($invInfo['invMake'])){ 
	echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?> | PHP Motors</title>
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
        
        <section class="boxShadow">

            <h1><?php 
                if(isset($invInfo['invMake'])){ echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?>
            </h1>
            <strong class="strong delStrong">Confirm Vehicle Deletion. The delete is permanent.</strong>
            <?php if (isset($message)) {echo $message;}?>
            
            <!-- Create the main page -->
            <form method="post" action="/cse340/phpmotors/vehicles/">
                <fieldset class="fieldsets">
                    <label for="invMake" class="top">Vehicle Make</label>
                    <input type="text" class="input" readonly name="invMake" id="invMake" <?php
                    if(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?>>

                    <label for="invModel" class="top">Vehicle Model</label>
                    <input type="text" class="input" readonly name="invModel" id="invModel" <?php
                    if(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?>>

                    <label for="invDescription" class="top">Vehicle Description</label>
                    <textarea name="invDescription" readonly id="invDescription" class="input vehicleDescription"><?php
                    if(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; }
                    ?></textarea>

                    <input type="submit" name="submit" class="vehicleSubmitButton submitButton" value="Delete">

                    <input type="hidden" name="action" value="deleteVehicle">
                    <input type="hidden" name="invId" value="<?php if(isset($invInfo['invId'])){
                    echo $invInfo['invId'];} ?>">

                </fieldset>
            </form>

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

</body>

</html>