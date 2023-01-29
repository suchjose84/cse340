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

<body style="background-image: url('images/site/small_check.jpg');">
    <div id="wrapper">
        <!--header, nav, and footer templates-->
        <?php require $_SERVER['DOCUMENT_ROOT'].'/cse340/phpmotors/snippets/header.php'?>
        <nav><?php echo $navList; ?></nav>

        <main class="mainPage" id="mainlogin">
            <section class='mainSections'>
                <h1>Welcome Back</h1>
                <form>
                    <div>
                        <label><input type="text" id='loginEmail' class='input' placeholder="Email"></label>
                        <label><input type="password" id='loginPassword' class='input' placeholder="Password"></label>
                        <button type="button" id="loginButton">Log In</button>
                        <p id='loginP'>No account yet?<a href="http://localhost/cse340/phpmotors/accounts/?action=register"> Register</a></p>
                    </div>


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