<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Motors Sign-up | PHPMotors</title>
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
            <section class='boxShadow'>
                <h1>Register to PHPMotors</h1>
                <p>It's quick and simple.</p>

                <?php
                    if (isset($message)) {
                    echo $message;
                    }
                ?>


                <form class='forms regForms' action="/cse340/phpmotors/accounts/" method="post">
                    <div>
                        <label for='clientFirstname' class="label regLabels">
                            <input type="text" id='clientFirstname' class="input nameInput" placeholder="First Name" autofocus
                                name="clientFirstname" required <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";} ?>>
                        </label>
                        <label for='clientLastname' class="label regLabels">
                            <input id='clientLastname' class="input nameInput" type="text" placeholder="Last Name"
                                name="clientLastname" required <?php if(isset($clientLastname)){echo "value='$clientLastname'";} ?>>
                        </label>
                    </div>
                    <label class="label regLabels" for='clientEmail'>
                        <input type="email" id='clientEmail' class="emailInput input" placeholder="Email e.g. johndoe@mail.com" 
                        name="clientEmail" required <?php if(isset($clientEmail)){echo "value='$clientEmail'";} ?>>
                    </label>
                    <label class="label regLabels" for='clientPassword'>
                    <input type="password" id='clientPassword' class="passwordInput input" placeholder="Password"
                            name="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                            <span class="pwNote">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
                    </label>
                    <input type="submit" name='submit' id="regButton" class='submitButton regSubmit' value='Register'>
                    <label id="regP">Already have an account? <a
                        href="http://localhost/cse340/phpmotors/accounts/?action=login">Log in</a></label>
                    <input type="hidden" name="action" value="register">

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