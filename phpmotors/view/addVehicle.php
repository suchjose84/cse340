<!DOCTYPE html>
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
        
        <section class="boxShadow">

            <h1>Add Vehicle</h1>

            <?php if (isset($message)) {echo $message;}?>
        
            <!-- Create the main page -->
            <form class="forms vehicleManForm" action="/cse340/phpmotors/vehicles/?action=add-vehicle" method="post">
            
            <?php echo $classificationList;?>
            <label for="make" class="top">Make<input type="text" id="make" name="invMake" class="input" required></label>
            <label for="model" class="top">Model<input type="text" id="model" name="invModel" class="input" required></label>
            <label for="description" class="top">Description<textarea id="description" name="invDescription" class="input" required></textarea></label>
            <label for="image" class="top">Image Path<input type="text" id="image" name="invImage" class="input" required></label>
            <label for="thumbnail" class="top">Thumbnail Path<input type="text" id="thumbnail" name="invThumbnail" class="input" required></label>
            <label for="price" class="top">Price<input type="number" id="price" name="invPrice" min="1" max="1000000000" class="input" required></label>
            <label for="inStock" class="top"># in Stock<input type="number" id="inStock" name="invStock" min="1" max="1000" class="input" required></label>
            <label for="color" class="top">Color<input type="text" id="color" name="invColor" class="input" required></label>
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