<?php

    if($_SESSION['clientData']['clientLevel'] < 2){
        header('Location: /cse340/phpmotors/');
    }

    //Build a drop down list using the $classifications array
    $classificationList = '<label for="vehicleList">';
    $classificationList .= '<select id="vehicleList" name="classificationID" autofocus required>';
    $classificationList .= '<option value="">Choose a car classification</option>';
    foreach($classifications as $classification) {
        $classificationList .= "<option value='$classification[classificationId]'";
        if(isset($classificationId)){
            if($classification['classificationId'] == $classificationId) {
                $classificationList .= ' selected ';
            }
        }elseif(isset($invInfo['classificationId'])){
            if($classification['classificationId'] === $invInfo['classificationId']){
             $classificationList .= ' selected ';
            }
        }
        $classificationList .= ">$classification[classificationName]</option>";
    }
    $classificationList .= '</select></label>';

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
		echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
	    elseif(isset($invMake) && isset($invModel)) { 
		echo "Modify $invMake $invModel"; }?> | PHP Motors</title>
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

            <h1><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
                echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
                elseif(isset($invMake) && isset($invModel)) { 
                echo "Modify $invMake $invModel"; }
            ?></h1>

            <?php if (isset($_SESSION['message'])) {echo $_SESSION['message'];}?>
        
            <!-- Create the main page -->
            <form class="forms vehicleManForm" action="/cse340/phpmotors/vehicles/?action=add-vehicle" method="post">
            
                <?php echo $classificationList;?>
                <label for="make" class="top">Make
                    <input type="text" id="make" name="invMake" class="input" required maxlength="30"
                    <?php if(isset($invMake)){
                        echo "value='$invMake'";
                        }elseif(isset($invInfo['invMake'])) {
                        echo "value='$invInfo[invMake]'"; }
                    ?>>
                </label>
                <label for="model" class="top">Model
                    <input type="text" id="model" name="invModel" class="input" required maxlength="30"
                    <?php if(isset($invModel)){echo "value='$invModel'";
                        }elseif(isset($invInfo['invModel'])) {
                            echo "value='$invInfo[invModel]'"; }
                    ?>>
                </label>
                <label for="description" class="top">Description<textarea id="description" name="invDescription" 
                    class="input vehicleDescription" required><?php if(isset($invDescription)){echo $invDescription;
                        }elseif(isset($invInfo['invDescription'])) {
                        echo $invInfo['invDescription'];}
                    ?></textarea>
                </label>
                <label for="image" class="top">Image Path
                    <input type="text" id="image" name="invImage" class="input" required maxlength="50"
                    <?php if(isset($invImage)){echo "value='$invImage'";
                        }elseif(isset($invInfo['invImage'])) {
                        echo "value='$invInfo[invImage]'";} 
                    ?>>
                </label>
                <label for="thumbnail" class="top">Thumbnail Path
                    <input type="text" id="thumbnail" name="invThumbnail" class="input" required maxlength="50"
                    <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";
                        }elseif(isset($invInfo['invThumbnail'])) {
                        echo "value='$invInfo[invThumbnail]'";} 
                    ?>>
                </label>
                <label for="price" class="top">Price
                    <input type="number" step="0.01" id="price" name="invPrice" min="1" class="input" required max="1000000000"
                    <?php if(isset($invPrice)){echo "value='$invPrice'";
                        }elseif(isset($invInfo['invPrice'])) {
                        echo "value='$invInfo[invPrice]'";}
                    ?>>
                </label>
                <label for="inStock" class="top"># in Stock
                    <input type="number" id="inStock" name="invStock" min="1" max="100000" class="input" required 
                    <?php if(isset($invStock)){echo "value='$invStock'";
                        }elseif(isset($invInfo['invStock'])) {
                        echo "value='$invInfo[invStock]'";}
                    ?>>
                </label>
                <label for="color" class="top">Color
                    <input type="text" id="color" name="invColor" class="input" required maxlength="20"
                    <?php if(isset($invColor)){echo "value='$invColor'";
                        }elseif(isset($invInfo['invColor'])) {
                        echo "value='$invInfo[invColor]'";}
                    ?>>
                </label>
                <input type="submit" name='submit' class="vehicleSubmitButton submitButton" value='Update Vehicle'>
                <input type="hidden" name='action' value='updateVehicle'>
                <input type="hidden" name="invId" value="<?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];
                } elseif(isset($invId)){ echo $invId; } ?>">
            

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