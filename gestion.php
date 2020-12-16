<?php
session_start();
require('class/class_gestion.php');
require('class/bdd.php');
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
    $gestion = new gestion($_SESSION['id_logged'], $bdd);
    $userInfo = $gestion->getUserData();
    if (isset($_POST['logout'])) {
        $gestion->logout();
    }
    if (isset($_POST['subTemp'])) {
    }
}
?>

<html>

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="compteur/RGraph.common.core.js"></script>
    <script src="compteur/RGraph.gauge.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="jquery-3.5.1.min.js"></script>
    <link rel="icon" type="image/png" href="images/four_allumé.png" />
    <title>Gestion - ContrOven</title>
</head>

<body style="background-image: url('images/background.jpg');background-attachment: fixed;background-position: center center;">
    <div class="white container z-depth-3" style="margin-top:2%;margin-bottom:2%;padding-top : 2%; padding-bottom : 2%;">
        <div class="container">
            <h1 class="center-align"><b>ContrOven</b></h1>
            <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) { ?>
                <div class="row">
                    <?php echo '<h5 class="center-align"><i>Bienvenue ' . $userInfo['nom'] . ' ' . $userInfo['prenom'] . '</i></h5>' ?>
                    <div class="row">
                        <div class="col s6">
                            <img class="responsive-img" style="display:block;margin-top:5%;margin-left: auto;margin-right: auto;" id="fourImg" src="images/four_eteint.png">
                        </div>
                        <div class="col s6">
                            <canvas id="cvs" width="250" height="250">[No canvas support]</canvas>
                        </div>
                    </div>
                    <h4 class="center-align" id="temperatureActuelle"></h4>
                    <div class="row">
                        <form method="POST" action="">
                            <div class="input-field col s4 offset-s2">
                                <input type="text" id="temperatureDesired" class="validate">
                                <label for="temperatureDesired">Température désirée (°C)</label>
                            </div>
                            <div class="input-field col s4">
                                <div class=" center-align">
                                    <button class="btn waves-effect waves-light" type="submit" name="subTemp">Valider
                                        <i class="material-icons right">check</i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col s6 center-align">
                            <form method="POST" action="">
                                <button type="submit" class="btn waves-effect waves-light" name="logout">Déconnexion</button>
                            </form>
                        </div>
                        <?php if ($userInfo['admin'] == 1) {
                            echo "
                            <div class='col s6 center-align'>
                                <a href='admin.php'>
                                    <button class='btn waves-effect waves-light' name='admin'>Page d'administration</button>
                                </a>
                            </div>";
                        } ?>
                    </div>
                </div>
            <?php } else {
                echo "<h1 class='center-align'><b>Vous avez l'air perdu...</b></h1>";
                echo "<a href='index.php' class='center-align'>Retour à l'accueil</a>";
            } ?>
        </div>
    </div>
</body>

</html>

<script type="text/javascript">
    function refreshTemp() {
        fetch("api/refreshTemp.php").then((resp) => resp.json())
            .then(function(data) {
                updateTemp(data);
                compteur(data);
            })
    }

    function updateTemp(temperature) {
        var divTemperature = document.getElementById('temperatureActuelle');
        divTemperature.innerHTML = "<b>" + temperature + "°C</b>";
        if (temperature > 0) {
            var four = document.getElementById("fourImg");
            four.setAttribute("src", "images/four_allumé.png");
        }
    }

    function compteur(valeur) {
        var gauge = new RGraph.Gauge({
            id: 'cvs',
            min: 0,
            max: 70,
            value: valeur
        }).draw();
    }

    updateTemp(0);
    compteur(0);
    setInterval(refreshTemp, 1000);
</script>