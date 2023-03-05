<?php 
    if(!$_SESSION['loggedin']){
        header('Location: /cse340/phpmotors/');
    }

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Management | PHP Motors</title>
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
        <section class='boxShadow'>
                <h1>Manage Acount</h1>
                <?php
                    if (isset($message)) {
                    echo $message;
                    }
                ?>

                <h3>Update Account</h3>
                <fieldset>
                <form class='forms' action="" method="post">
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
                    <input type="submit" name='submit' id="regButton" class='submitButton' value='Update Info'>
                    <input type="hidden" name="action" value="">

                </form>
                </fieldset>

                <h3>Change Password</h3>
                <span class="pwNote">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span><br>
                <span class="pwNote">*Note. Your original password will be changed.</span>

                <fieldset>
                    <form>
                        <label class='formLabels' for='clientPassword'>
                            <input type="password" id='password' class="passwordInput input" placeholder="Password"
                            name="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                        </label>
                        <input type="submit" name='submit' id="regButton" class='submitButton' value='Update Password'>
                        <input type="hidden" name="action" value="register">

                    </form>
                </fieldset>
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