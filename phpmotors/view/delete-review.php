<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(isset($reviewInfo['invMake']) && isset($reviewInfo['invModel'])){ 
                echo "Delete $reviewInfo[invMake] $reviewInfo[invModel] Review";} 
                elseif(isset($invMake) && isset($invModel)) { 
                echo "Delete $invMake $invModel Review"; }
            ?> | PHPMotors</title>
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
            <h1><?php if(isset($reviewInfo['invMake']) && isset($reviewInfo['invModel'])){ 
                echo "Delete $reviewInfo[invMake] $reviewInfo[invModel] Review";} 
                elseif(isset($invMake) && isset($invModel)) { 
                echo "Delete $invMake $invModel Review"; }
            ?></h1>

            <?php if (isset($_SESSION['message'])) {echo $_SESSION['message'];}?>
            <h3><?php if(isset($reviewInfo['reviewDate'])){
                $date = date("F j, Y h:i A", strtotime($reviewInfo['reviewDate']));
                    echo "Reviewed on $date";
                } elseif(isset($reviewDate)) {
                    $date = date("F j, Y h:i A", strtotime($reviewDate));
                    echo "Reviewed on $date";
                }
            ?></h3>
            <p class='errorMessage'>Deletes cannot be undone. Are you sure you want to delete this review?</p>

            <form class="forms" action="/cse340/phpmotors/reviews/?action=update-review" method="post">
                <fieldset>
                    <label class="top">Review Text<textarea readonly name="reviewText" class='reviewTextArea autoSize'><?php if(isset($reviewInfo['reviewText'])){ 
                        echo "$reviewInfo[reviewText]";} 
                        elseif(isset($reviewText)) { 
                        echo "$reviewText";}?></textarea>
                    </label>
                    <input type="submit" name='submit' class="submitButton" value='Delete'>
                    <input type="hidden" name='action' value='delete-review'>
                    <input type="hidden" name='reviewId' value="<?php 
                        if(isset($reviewInfo['reviewId'])){
                            echo $reviewInfo['reviewId'];
                        } elseif(isset($reviewId)){ 
                            echo $reviewId; 
                        } ?>">
                        <input type="hidden" name='invMake' value="<?php 
                        if(isset($reviewInfo['invMake'])){
                            echo $reviewInfo['invMake'];
                        } elseif(isset($invMake)){ 
                            echo $invMake; 
                        } ?>">
                        <input type="hidden" name='invModel' value="<?php 
                        if(isset($reviewInfo['invModel'])){
                            echo $reviewInfo['invModel'];
                        } elseif(isset($invModel)){ 
                            echo $invModel;
                        } ?>">
                    </label>
                </fieldset>
        
            </form>
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