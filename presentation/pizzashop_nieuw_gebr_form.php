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
                            <li><a href="ctrl_pizzashop_home.php">Home</a></li>
                            <li><a href="ctrl_pizzashop_bestel.php">Bestellen</a></li>
                            <li><a href="ctrl_pizzashop_wiezijnwe.php">Wie zijn we</a></li>
                            <li><a href="ctrl_pizzashop_gastenboek.php">Gastenboek</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <div class="row">
            <div id="inhoud" class="container">
                <section id="main" class="col-sm-7">
                    <div class="form_otherpage">
                        <?php
                        if (isset($_COOKIE["aangemeld"])) {
                            $login = "aangemeld met " . $_COOKIE["aangemeld"];
                        } else {
                            $login = "Gelieve aan te melden om een bestelling te doen";
                        }
                        if ($error == "gebr_exists") {
                            $show_error = "Gebruikersnaam bestaat al !";
                        } else {
                            $show_error = "";
                        }
                        ?>      
                        <br/>
                        <p id="inlogok"> <?php print ($login); ?> </p>
                        <p id="show_error"> <?php print ($show_error); ?> </p><br>
                    </div>
                    <form role="form" method="post" action="ctrl_voeg_gebr_toe.php?action=process">
                        <div class="form-group">
                            <label for="usernaam" class="col-md-3 control-label">Gebruikersnaam:</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="usernaam" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="wachtwoord" class="col-md-3 control-label">Wachtwoord:</label>
                            <div class="col-md-9">
                                <input class="form-control" type="password" name="wachtwoord" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="naam" class="col-md-3 control-label">Naam:</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="naam" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="adres" class="col-md-3 control-label">Adres:</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="adres" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="postcode_id" class="col-md-3 control-label">Woonplaats:</label>
                            <div class="col-md-9">
                                <select class="form-control" name="postcode_id" required>
                                    <?php
                                    foreach ($postcodes as $pc) {
                                        if ($pc['id'] == 1)
                                            $selected = " selected = 'selected'";
                                        else
                                            $selected = "";
                                        echo ("<option value=" . $pc['id'] . $selected . '>' . $pc['gemeente'] . " (" . $pc['postnr'] . ")" . '</option>');
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class = "form-group">
                            <label for = "email" class = "col-md-3 control-label">Email:</label>
                            <div class = "col-md-9">
                                <input class = "form-control" type = "email" name = "email" required>
                            </div>
                        </div>
                        <div class = "form-group">
                            <label for = "telefoon" class = "col-md-3 control-label">Telefoon:</label>
                            <div class = "col-md-9">
                                <input class = "form-control" type = "text" name = "telefoon" required>
                            </div>
                        </div>
                        <div class = "form-group">
                            <label for = "btwnr" class = "col-md-3 control-label">Btwnummer:</label>
                            <div class = "col-md-9">
                                <input class = "form-control" type = "text" name = "btwnr" required>
                            </div>
                        </div>
                        <div class = "form-group">
                            <label for = "opm_extra" class = "col-md-3 control-label">Opmerkingen:</label>
                            <div class = "col-md-9">
                                <textarea class = "form-control" rows = "3" name = "opm_extra" required></textarea>
                            </div>
                        </div>
                        <input id = "registerbtn" class = "btn btn-default" type = "submit" value = "Registreren">
                        <input id = "registerbtn" class = "btn btn-default" type = "reset" value = "Reset">
                    </form>
                </section>
                <div class = "thuisbezorging col-sm-5">
                </div>
                <!--einde inhoud-->
            </div>
        </div>
        <footer class = "navbar-fixed-bottom">
            <div class = "container">
                PHP eindtest &copy;
                Valentino Gahide
            </div>
        </footer>
        <script src = "http://code.jquery.com/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
    </body>
</html>
