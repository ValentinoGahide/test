<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="css/pizza_shop.css" >
        <title>PizzaShop</title>
    </head>
    <body>
        <header>
            <div class="container">
                <h1>PizzaShop</h1>
            </div>
            <div class="container">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#hoofdmenu">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="ctrl_pizzashop_home.php"> <img src="images/textlogosmall.png"></a>
                    </div>
                    <div class="collapse navbar-collapse" id="hoofdmenu">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="ctrl_pizzashop_home.php">Home</a></li>
                            <li><a href="ctrl_pizzashop_bestel.php">Bestellen</a></li>
                            <li><a href="ctrl_pizzashop_wiezijnwe.php">Wie zijn we</a></li>
                            <li><a href="test.gastenboek.php">Gastenboek</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <div class="container">
            <div class="row">
                <aside class="col-sm-4">
                    <div class="form">
                        <?php
                        if (isset($_COOKIE["aangemeld"])) {
                            $login = "aangemeld met " . $_COOKIE["aangemeld"];
                        } else {
                            $login = "U kan zich al aanmelden om het bestellen sneller te laten verlopen";
                        }
                        if ($error == "gebr_pasw_niet_ok") {
                            $show_error = "Uw gebruikersnaam of uw paswoord klopt niet !";
                        } elseif ($error == "gebr_actief_niet_ok") {
                            $show_error = "U kan zich niet aanmelden, gelieve eerst uw openstaande saldo te betalen ";
                        } else {
                            $show_error = $error;
                        }
                        ?>      
                        <p id="inlogok"> <?php print ($login); ?> </p>
                        <p id="show_error"> <?php print ($show_error); ?> </p><br>
                        <form role="form" method="post" action="ctrl_pizzashop_home.php?action=process">
                            <div class="form-group">
                                <label for="usernaam">Gebruikersnaam: </label>
                                <input class="form-control" type="text" name="usernaam" required>
                            </div>
                            <div class="form-group">
                                <label for="wachtwoord">Wachtwoord: </label>
                                <input class="form-control" type="password" name="wachtwoord" required>
                            </div>
                            <input class="btn btn-default" type="submit" value="Aanmelden">
                        </form><br>         
                        <form role="form" method="post" action="ctrl_voeg_gebr_toe.php" id ="button_nieuwe_gebr"> 
                            <p> Bent u een nieuwe gebruiker en wenst u een account aan te maken ?  </p>
                            <input class="btn btn-default" type="submit" value="Registreren">
                        </form>
                    </div>
                    <div id="contact_kort" class="col-sm-6">
                        <address>
                            <strong>Valentino's</strong><br>
                            Avelgemstraat 17<br>
                            8550 Zwevegem<br>
                            Gsm: 0479/45 42 13<br>
                            <a href="mailto:#">valentinogahide@gmail.com</a>
                        </address>
                    </div>
                    <div id="bedrijfslogo" class="col-sm-6">
                        <img id="logo" src="images/logo.gif">
                    </div>
                </aside>
                <section>
                    <div id="carousel" class="container col-sm-8">
                        <!--  Carousel - consult the Twitter Bootstrap docs at 
      http://twitter.github.com/bootstrap/javascript.html#carousel -->
                        <div id="this-carousel-id" class="carousel slide"><!-- class of slide for animation -->
                            <div class="carousel-inner">
                                <div class="item active"><!-- class of active since it's the first item -->
                                    <img src="images/pizza1.jpg" alt="" />
                                    <div class="carousel-caption">
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="images/pizza2.jpg" alt="" />
                                </div>
                                <div class="item">
                                    <img src="images/pizza3.jpg" alt="" />
                                </div>
                                <div class="item">
                                    <img src="images/pizza4.jpg" alt="" />
                                </div>
                                <div class="item">
                                    <img src="images/pizza5.jpg" alt="" />
                                </div>
                                <div class="item">
                                    <img src="images/pizza6.jpg" alt="" />
                                </div>
                                <div class="item">
                                    <img src="images/pizza7.jpg" alt="" />
                                </div>
                                <div class="item">
                                    <img src="images/pizza8.jpg" alt="" />
                                </div>
                                <div class="item">
                                    <img src="images/pizza9.jpg" alt="" />
                                </div>
                                <div class="item">
                                    <img src="images/pizza10.jpg" alt="" />
                                </div>
                            </div><!-- /.carousel-inner -->
                            <!--  Next and Previous controls below
                                  href values must reference the id for this carousel -->
                            <a class="carousel-control left" href="#this-carousel-id" data-slide="prev">&lsaquo;</a>
                            <a class="carousel-control right" href="#this-carousel-id" data-slide="next">&rsaquo;</a>
                        </div><!-- /.carousel -->
                    </div>
                    <div id="uitleg" class="container col-sm-8">
                        <strong>Klik snel op <a href="ctrl_pizzashop_bestel.php">Bestellen</a> en geniet van onze heerlijke pizza's!</strong>
                    </div>
                </section>
            </div>
        </div>
        <footer class="navbar-fixed-bottom">
            <div class="container"> 
                PHP eindtest &copy; Valentino Gahide 
            </div>
        </footer>
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script>
            $(document).ready(function() {
                $('.carousel').carousel({
                    interval: 4000
                });
            });
        </script>
    </body>
</html>
