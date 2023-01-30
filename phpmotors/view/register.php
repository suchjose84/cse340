<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Motors Sign-up</title>
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
        <main class="mainPage" id="mainRegister">
            <section class='mainSections'>
                <h1>Register to PHPMotors</h1>
                <p>It's quick and simple.</p>
                <form class='forms'>
                    <div>
                        <label><input required type="text" class="input nameInput" placeholder="First Name" autofocus></label>
                        <label><input required class="input nameInput" type="text" placeholder="Last Name"></label>
                    </div>
                    <label class='formLabels'><input required type="email" class="emailInput input" placeholder="Email e.g. johndoe@mail.com"></label>
                    <button type="button" id="regButton" class='submitButton'>Sign up</button>

                </form>
                <p id="regP">Already have an account? <a href="http://localhost/cse340/phpmotors/accounts/?action=login">Log in</a></p>
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