<?php
    session_start();
    require('class/class_modif.php');
    require('class/bdd.php');
    if(isset($_SESSION['logged']) && $_SESSION['logged'] == true && isset($_SESSION['rights']) && $_SESSION['rights'] == 1 && isset($_SESSION['idUserModify']))
    {
        $modif = new modif($_SESSION['idUserModify'], $bdd);
        $userInfo = $modif->getUserData();
        if(isset($_POST['subModif'])){
            $message = $modif->modif($_POST['email'],$_POST['password'],$_POST['first_name'],$_POST['last_name']);
        }
    }
?>

<html>
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />  
        <link rel="icon" type="image/png" href="images/four_allumé.png" />
        <title>Gestion - ContrOven</title>
    </head>
    <body style="background-image: url('images/background.jpg');background-attachment: fixed;background-position: center center;">
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <div class="white container z-depth-3" style="margin-top:2%;margin-bottom:2%;padding-top : 2%; padding-bottom : 2%;">
            <a href="admin.php"><button class='btn waves-effect waves-light'><i class='material-icons'>arrow_back</i></button></a>
            <div class="container">
                <h1 class="center-align"><b>ContrOven</b></h1>
                <?php if(isset($_SESSION['logged']) && $_SESSION['logged'] == true && isset($_SESSION['rights']) && $_SESSION['rights'] == 1 && isset($_SESSION['idUserModify'])){?>
                <div class="row">
                <?php echo "<h5 class='center-align'><i>".$userInfo['nom']." ".$userInfo['prenom']."</i></h5>" ?>
                <form method="POST" action="">
                    <div class="row" style="margin-top:5%;">
                        <?php 
                        if(isset($message)){
                            echo $message;
                        } ?>
                        <div class="input-field col s8 offset-s2">
                            <input id="email" name="email" value="<?php echo $userInfo['login'] ?>" type="text" class="validate">
                            <label for="email">Adresse mail</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8 offset-s2">
                            <input id="password" name="password" value="<?php echo $userInfo['mdp'] ?>" type="text" class="validate">
                            <label for="password">Mot de passe</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4 offset-s2">
                            <input id="first_name" name="first_name" value="<?php echo $userInfo['prenom'] ?>" type="text" class="validate">
                            <label for="first_name">Prénom</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="last_name" name="last_name" value="<?php echo $userInfo['nom'] ?>" type="text" class="validate">
                            <label for="last_name">Nom</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s8 offset-s2">
                            <label>Droits</label>
                            <select class="browser-default">
                                <?php if($userInfo['admin'] == 0){
                                    echo "<option value='0' selected>Utilisateur</option>
                                    <option value='1'>Administrateur</option>";
                                }else{
                                    echo "<option value='0'>Utilisateur</option>
                                    <option value='1' selected>Administrateur</option>";
                                }?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="right-align">
                            <button class="btn waves-effect waves-light" type="submit" name="subModif">Modifier
                                <i class="material-icons right">edit</i>
                            </button>
                        </div>
                    </div>
                </form>
                </div>
                <?php }else{
                    echo "<h1 class='center-align'><b>Vous avez l'air perdu...</b></h1>";
                    if(isset($_SESSION['logged']) && $_SESSION['logged'] == true){
                        echo "<a href='gestion.php' class='center-align'>Retour à l'accueil</a>";
                    }else{
                        echo "<a href='index.php' class='center-align'>Retour à l'accueil</a>";
                    }
                } ?>
            </div>
        </div>
    </body>
</html>