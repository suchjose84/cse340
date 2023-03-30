<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $vehicle['invMake']." ".$vehicle['invModel']?> | PHPMotors</title>
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
                <?php if(isset($message)){echo $message;}?>
                <?php if(isset($vehicleInfoDisplay)){echo $vehicleInfoDisplay;} ?>
                <hr>
                <?php if(isset($showReviews)){echo $showReviews;} ?>


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
        <script>
            var textarea = document.querySelector(".reviewTextArea");
            textarea.style.minHeight = '100px';
            textarea.style.maxHeight = '500px';
            textarea.style.height = 'auto'; // set height to auto

            // show remaining character
            var maxLength = textarea.getAttribute('maxlength');
            var initialChars = maxLength - textarea.value.length;
            var span = document.querySelector('.remainingSpan');
            span.innerText = `${initialChars} / ${maxLength}`;

            // update count as user types
            textarea.addEventListener('input', function() {
                var remainingChars = maxLength - textarea.value.length;
                span.innerText = `${remainingChars}/${maxLength}`;

                // set height to auto again
                textarea.style.height = 'auto';
            });
        </script>

    </body>

</html><?php 
    unset($_SESSION['message']); 
    unset($_SESSION['invData']);
    ?>