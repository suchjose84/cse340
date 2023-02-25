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
            <section class='boxShadow'>
                <h1>Register to PHPMotors</h1>
                <p>It's quick and simple.</p>

                <?php
                    if (isset($message)) {
                    echo $message;
                    }
                ?>


                <form class='forms' action="/cse340/phpmotors/accounts/" method="post">
                    <div>
                        <label for='clientFirstname'>
                            <input type="text" id='fname' class="input nameInput" placeholder="First Name" autofocus
                                name="clientFirstname" required <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";} ?>>
                        </label>
                        <label for='clientLastname'>
                            <input id='lname' class="input nameInput" type="text" placeholder="Last Name"
                                name="clientLastname" required <?php if(isset($clientLastname)){echo "value='$clientLastname'";} ?>>
                        </label>
                    </div>
                    <label class='formLabels' for='clientEmail'>
                        <input type="email" id='email' class="emailInput input"placeholder="Email e.g. johndoe@mail.com" 
                        name="clientEmail" required <?php if(isset($clientEmail)){echo "value='$clientEmail'";} ?>>
                    </label>
                    <label class='formLabels' for='clientPassword'>
                    <span class="pwNote">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
                        <input type="password" id='password' class="passwordInput input" placeholder="Password"
                            name="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                    </label>
                    <input type="submit" name='submit' id="regButton" class='submitButton' value='Register'>
                    <input type="hidden" name="action" value="register">

                </form>
                <p id="regP">Already have an account? <a
                        href="http://localhost/cse340/phpmotors/accounts/?action=login">Log in</a></p>
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