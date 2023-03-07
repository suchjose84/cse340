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
    <title><?php if(isset($_SESSION['clientData']['clientFirstname']) && isset($_SESSION['clientData']['clientLastname'])){ 
		echo "Modify {$_SESSION['clientData']['clientFirstname']} {$_SESSION['clientData']['clientLastname']}";} 
	    elseif(isset($clientFirstname) && isset($clientLastname)) { 
		echo "Modify $clientFirstname $clientLastname"; }?> | PHP Motors</title>
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
                <?php if (isset($message)) {echo $message;}?>
                
                <h3>Update Information</h3>
                <fieldset class='fieldsets'>
                    <div>
                        <form class='forms' id='updAcctForm' action="/cse340/phpmotors/accounts/?action=client-update" method="post">
                            
                            <label for='clientFirstname'>
                                <input type="text" id='clientFirstname' class="input nameInput acctUpdateInput" name="clientFirstname" required
                                <?php if(isset($_SESSION['clientData']['clientFirstname'])){
                                        echo "value='{$_SESSION['clientData']['clientFirstname']}'";
                                    } elseif(isset($clientFirstname)){echo "value='$clientFirstname'";}
                                ?>>
                            </label>
                            <label for='clientLastname'>
                                <input id='clientLastname' class="input nameInput acctUpdateInput" type="text" placeholder="Last Name"
                                    name="clientLastname" required <?php if(isset($_SESSION['clientData']['clientLastname'])){
                                        echo "value='{$_SESSION['clientData']['clientLastname']}'";
                                    } elseif(isset($clientLastname)){echo "value='$clientLastname'";}
                                ?>>
                            </label>
                            
                            <label for='clientEmail'>
                                <input type="email" id='clientEmail' class="emailInput input acctUpdateInput" placeholder="Email e.g. johndoe@mail.com" 
                                name="clientEmail" required <?php if(isset($_SESSION['clientData']['clientEmail'])){
                                        echo "value='{$_SESSION['clientData']['clientEmail']}'";
                                    } elseif(isset($clientEmail)){echo "value='$clientEmail'";}
                                ?>>
                            </label>
                            <input type="submit" name='submit' class='submitButton updateAcctBtn' value='Update Info'>
                            <input type="hidden" name="action" value="accountUpdate">

                        </form>
                    </div>
                </fieldset>

                <h3>Change Password</h3>
                <fieldset class='fieldsets'>
                    <div>
                        <span class="pwNote">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span><br>
                        <span class="pwNote">*Note. Your original password will be changed.</span>
                        <form class='forms' action="/cse340/phpmotors/accounts/?action=account-update" method="post">
                            <label class='formLabels' for='clientPassword'>
                                <input type="password" id='clientPassword' class="passwordInput input" placeholder="Password"
                                name="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                            </label>
                            <input type="submit" name='submit' class='submitButton updateAcctBtn' value='Update Password'>
                            <input type="hidden" name="action" value="pwordChange">

                        </form>
                    </div>
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