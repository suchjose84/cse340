<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Motors Log-in</title>
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

        <main class="mainPage" id="mainLogin">
            <section class='mainSections'>
                <h1 id="loginH1">Welcome Back</h1>

                <?php
                    if (isset($message)) {
                    echo $message;
                    }
                ?>
                
                <form>
                    <label class='formLabels'><input type="text" id='loginEmailInput' class='input emailInput'
                            placeholder="Email e.g. johndoe@mail.com" autofocus></label>
                    <label class='formLabels'><input type="password" id='loginPasswordInput' class='input passwordInput'
                            placeholder="Password"></label>
                    <button type="button" id="loginButton" class='submitButton'>Log In</button>
                    <p id='loginP'>No account yet? <a href="http://localhost/cse340/phpmotors/accounts/?action=signup">Register</a></p>


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