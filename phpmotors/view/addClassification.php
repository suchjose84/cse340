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

                <h1>Add Car Classification</h1>
                <?php if (isset($message)) {echo $message;}?>

                <form class="forms vehicleManForm" action="/cse340/phpmotors/vehicles/" method="post">

                    <label class="top" for="classificationName">
                        <span>Classification name should not be more than 30 characters.</span>
                        <input type="text" class="input" id="classificationName" name="classificationName" autofocus 
                        placeholder="Car Classification" required maxlength="30"></label>
                    <input type="submit" class="vehicleSubmitButton submitButton" value="Submit">
                    <input type="hidden" name="action" value="addClassificationSubmit">

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