<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="css/styles.css" media="screen">
    <link rel="stylesheet" href="css/styles_tablet.css" media="screen">
    <link rel="stylesheet" href="css/styles_large.css" media="screen">
</head>

<body>
    <div id="wrapper">
        <header>
            <img src="images/site/logo.png" alt="logoImg">
            <a id="myAccountText" href="">My Account</a>
        </header>
        <nav>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Classic</a></li>
                <li><a href="">Sports</a></li>
                <li><a href="">SUV</a></li>
                <li><a href="">Trucks</a></li>
                <li><a href="">Used</a></li>


            </ul>
        </nav>
        <main>
            <section id="firstSection">
            <h1>Welcome to PHP Motors!</h1>
            <div id="carSpecCard">
                <h2>DMC Delorean</h2>
                <p>3 cup holders<br>
                    Superman doors<br>
                    Fuzzy dice!
                </p>
                <button id="ownToday1" type="Button">Own Today</button>
            </div>
            <img id="bigCarPic" src="images/delorean.jpg" alt="bigCarPIc">
            <button id="ownToday2" type="Button">Own Today</button>
            </section>
            <section id="upgradesReviews">

                <div class="sectionWrappers" id="reviewsWrapper">
                    <h2>DMC Deloran Reviews</h2>
                    <ul>
                        <li>"So fast, it's like travelling in time" (4/5)</li>
                        <li>"Coolest ride on the road." (4/5)</li>
                        <li>"I'm feeling Marty McFly!" (5/5)</li>
                        <li>"The most futuristic ride of our day." (4/5)</li>
                        <li>"80's livin and I love it!" (5/5)</li>
                    </ul>
                </div>
                <div class="sectionWrappers" id="upgradesWrapper">
                    <h2>Deloran Upgrades</h2>
                    <ul>
                        <li class="upgradesLI">
                            <div class="upgrImgBox"><img src="images/upgrades/flux-cap.png" alt="flux cap icon"></div>
                            <div class="upgrADiv"><a href="https://www.google.com/" target="_blank">Flux Capacitor</a>
                            </div>
                        </li>
                        <li class="upgradesLI">
                            <div class="upgrImgBox"><img src="images/upgrades/flame.jpg" alt="flame decal icon"></div>
                            <div class="upgrADiv"><a href="https://www.google.com/" target="_blank">Flame Decals</a>
                            </div>
                        </li>
                        <li class="upgradesLI">
                            <div class="upgrImgBox"><img src="images/upgrades/bumper_sticker.jpg" alt="bumper icon"></div>
                            <div class="upgrADiv"><a href="https://www.google.com/" target="_blank">Bumper Stickers</a>
                            </div>
                        </li>
                        <li class="upgradesLI">
                            <div class="upgrImgBox"><img src="images/upgrades/hub-cap.jpg" alt="hub cap icon"></div>
                            <div class="upgrADiv"><a href="https://www.google.com/" target="_blank">Hub Caps</a></div>
                        </li>


                    </ul>
                </div>

            </section>
        </main>
        <footer>
            <ul>
                <li>&#169; PHP Motors, All rights reserved.</li>
                <li>All images used are believed to be in "Fair Use". Please notify the author if any are not
                    and they will be removed.
                </li>
                <li>Last Updated: 30 March, 2018</li>
            </ul>
        </footer>
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