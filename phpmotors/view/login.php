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
            <section class='boxShadow'>
                <h1 id="loginH1">Welcome Back</h1>

                <?php
                    if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    }
                ?>
                
                <form class='forms' action="/cse340/phpmotors/accounts/" method="post">
                    <label class='formLabels'>
                        <input type="email" name="clientEmail" id='loginEmailInput' class='input emailInput'
                        placeholder="Email e.g. johndoe@mail.com" autofocus required <?php if(isset($clientEmail)){echo "value='$clientEmail'";} ?>>
                    </label>
                    <label class='formLabels'>
                        <span class="pwNote">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
                        <input type="password" name="clientPassword" id='loginPasswordInput' class='input passwordInput' placeholder="Password" required
                        pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                    </label>
                    <input type="submit" name="submit" id="loginButton" class='submitButton' value="Log In">
                    <input type="hidden" name="action" value="signin">
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