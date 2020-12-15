<?php
    session_start();
    require('class/class_login.php');
    require('class/class_signin.php');
    require('class/bdd.php');
    if(isset($_POST['subLogin'])){
        $login = new login($_POST['emailLogin'],$_POST['passwordLogin'],$bdd);
        $messageLogin = $login->verifUser();
        $signinDisplay = false;
    }
    if(isset($_POST['subSignin'])){
        $signin = new signin($_POST['emailSignin'],$_POST['passwordSignin'],$_POST['last_name'],$_POST['first_name'],$bdd);
        $messageSignin = $signin->signUser();
        $signinDisplay = true;
    }
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="images/four_allumé.png" />
    <title>Accueil - ContrOven</title>
</head>

<body style="background-image: url('images/background.jpg');background-attachment: fixed;background-position: center center;">
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <div class="white container z-depth-3" style="margin-top:2%;margin-bottom:2%;padding-top : 2%; padding-bottom : 2%;">
        <div class="container">
            <h1 class="center-align"><b>ContrOven</b></h1>
            <?php if(!isset($signinDisplay) || $signinDisplay != true){
                echo "<div class='row' id='login'>";
            }
            else{
                echo "<div class='row' id='login' style='display:none'>";
            }
            ?>
                <h5 class="center-align"><i>Se connecter</i></h5>
                <form method="POST" action="">
                    <div class="row" style="margin-top:5%;">
                        <?php 
                        if(isset($messageLogin)){
                            echo $messageLogin;
                        } ?>
                        <div class="input-field col s8 offset-s2">
                            <input id="emailLogin" name="emailLogin" type="text" class="validate">
                            <label for="emailLogin">Adresse mail</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8 offset-s2">
                            <input id="passwordLogin" name="passwordLogin" type="password" class="validate">
                            <label for="passwordLogin">Mot de passe</label>
                        </div>
                    </div>
                    <div class="row">
                        <a href="#" onclick="displaySignin()">S'inscrire</a>
                        <div class="right-align">
                            <button class="btn waves-effect waves-light" type="submit" name="subLogin">Se connecter
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <?php if(isset($signinDisplay) && $signinDisplay == true){
                echo "<div class='row' id='signin'>";
            }
            else{
                echo "<div class='row' id='signin' style='display:none'>";
            }
            ?>
                <h5 class="center-align"><i>S'inscrire</i></h5>
                <form method="POST" action="">
                    <div class="row" style="margin-top:5%;">
                        <?php 
                        if(isset($messageSignin)){
                            echo $messageSignin;
                        } ?>
                        <div class="input-field col s8 offset-s2">
                            <input id="emailSignin" name="emailSignin" type="text" class="validate">
                            <label for="emailSignin">Adresse mail</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8 offset-s2">
                            <input id="passwordSignin" name="passwordSignin" type="password" class="validate">
                            <label for="passwordSignin">Mot de passe</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4 offset-s2">
                            <input id="first_name" name="first_name" type="text" class="validate">
                            <label for="first_name">Prénom</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="last_name" name="last_name" type="text" class="validate">
                            <label for="last_name">Nom</label>
                        </div>
                    </div>
                    <div class="row">
                        <a href="#" onclick="displayLogin()">Se connecter</a>
                        <div class="right-align">
                            <button class="btn waves-effect waves-light" type="submit" name="subSignin">S'inscrire
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>


<script type="text/javascript">
    function displaySignin() {
        var formSignin = document.getElementById("signin");
        var formLogin = document.getElementById("login");
        formSignin.style.display = "block";
        formLogin.style.display = "none";
    }

    function displayLogin() {
        var formSignin = document.getElementById("signin");
        var formLogin = document.getElementById("login");
        formSignin.style.display = "none";
        formLogin.style.display = "block";
    }
</script>