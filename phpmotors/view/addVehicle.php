<?php

    if($_SESSION['clientData']['clientLevel'] < 2){
        header('Location: /cse340/phpmotors/');
    }

    //Build a drop down list using the $classifications array
    $classificationList = buildClassificationList($classifications);

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vehicle | PHPMotors</title>
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

            <h1>Add Vehicle</h1>

            <?php if (isset($message)) {echo $message;}?>
        
            <!-- Create the main page -->
            <form class="forms vehicleManForm" action="/cse340/phpmotors/vehicles/  " method="post">
            
            <?php echo $classificationList;?>
            <label for="make" class="top">Make
                <input type="text" id="make" name="invMake" class="input" required maxlength="30"
                <?php if(isset($invMake)){echo "value='$invMake'";}?>>
            </label>
            <label for="model" class="top">Model
                <input type="text" id="model" name="invModel" class="input" required maxlength="30"
                <?php if(isset($invModel)){echo "value='$invModel'";} ?>>
            </label>
            <label for="description" class="top">Description<textarea id="description" name="invDescription" 
            class="input vehicleDescription" required><?php if(isset($invDescription)){echo $invDescription;}?></textarea></label>
            <label for="image" class="top">Image Path
                <input type="text" id="image" name="invImage" class="input" required maxlength="200"
                <?php if(isset($invImage)){echo "value='$invImage'";} ?>>
            </label>
            <label for="thumbnail" class="top">Thumbnail Path
                <input type="text" id="thumbnail" name="invThumbnail" class="input" required maxlength="200"
                <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";} ?>>
            </label>
            <label for="price" class="top">Price
                <input type="number" step="0.01" id="price" name="invPrice" min="1" class="input" required max="1000000000"
                <?php if(isset($invPrice)){echo "value='$invPrice'";} ?>>
            </label>
            <label for="inStock" class="top"># in Stock
                <input type="number" id="inStock" name="invStock" min="1" max="100000" class="input" required 
                <?php if(isset($invStock)){echo "value='$invStock'";} ?>>
            </label>
            <label for="color" class="top">Color
                <input type="text" id="color" name="invColor" class="input" required maxlength="20"
                <?php if(isset($invColor)){echo "value='$invColor'";} ?>>
            </label>
            <input type="submit" name='submit' class="vehicleSubmitButton submitButton" value='Submit'>
            <input type="hidden" name='action' value='addVehicleSubmit'> 
            

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