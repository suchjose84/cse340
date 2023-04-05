<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(isset($reviewInfo['invMake']) && isset($reviewInfo['invModel'])){ 
                echo "Edit $reviewInfo[invMake] $reviewInfo[invModel] Review";} 
                elseif(isset($invMake) && isset($invModel)) { 
                echo "Edit $invMake $invModel Review"; }
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
                echo "Update $reviewInfo[invMake] $reviewInfo[invModel] Review";} 
                elseif(isset($invMake) && isset($invModel)) { 
                echo "$invMake $invModel Review"; }
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

            <form class="forms editReviewForm" action="/cse340/phpmotors/reviews/?action=update-review" method="post">
                <fieldset class='fieldsets boxShadow reviewFieldset'>
                    <label class="top">Review: Max 500 chars<textarea name="reviewText" class='reviewTextArea autoSize' maxlength="500"><?php if(isset($reviewInfo['reviewText'])){ 
                        echo "$reviewInfo[reviewText]";} 
                        elseif(isset($reviewText)) { 
                        echo "$reviewText";}?></textarea>
                    </label>
                    <div class='rowSpaceBetween'>
                        <span class=remainingSpan></span>
                        <input type="submit" name='submit' class="submitButton" value='Update'>
                    </div>
                    <input type="hidden" name='action' value='update-review'>
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
    
    <script src="/cse340/phpmotors/js/styles.js"></script>

</body>

</html>