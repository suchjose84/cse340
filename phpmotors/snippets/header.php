<header>
    <div id="logoImage"><a href="http://localhost/cse340/phpmotors/"><img src="/cse340/phpmotors/images/site/logo.png" alt="logoImg"></a></div>
    <div id="myAccountText">
        <?php 
        
            if(isset($_SESSION['loggedin'])){
                $headerTopRight = 'Hello '. $_SESSION['clientData']['clientFirstname'] . " | ";
                $headerTopRight .= '<a href="/cse340/phpmotors/accounts/?action=logout">Log Out</a>';
                
                echo $headerTopRight;

            }else {
                
                $headerTopRight = '<a href="/cse340/phpmotors/accounts/?action=login" 
                title="Go to log in page">My Account</a>';
                
                echo $headerTopRight;

            }
        ?>
        
    </div>
    
    <!-- <div id="myAccountText"><a href="http://localhost/cse340/phpmotors/accounts/?action=login" 
    title="Go to log in page">My Account</a></div> -->
</header>