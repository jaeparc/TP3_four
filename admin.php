<?php
    session_start();
    require('class/class_admin.php');
    require('class/bdd.php');
    if(isset($_SESSION['logged']) && $_SESSION['logged'] == true && $_SESSION['rights'] == 1){
        $admin = new admin($bdd);
        $usersInfo = $admin->getUsersData();
        for($j = 0; $j < sizeof($usersInfo); $j++){
            if(isset($_POST[$j])){
                $admin->deleteUser($usersInfo[$j]['id']);
            }
            if(isset($_POST['modify'.$j])){
                $_SESSION['idUserModify'] = $usersInfo[$j]['id'];
                header('Location:modifUser.php');
            }
        }
        $usersInfo = $admin->getUsersData();
    }
?>

<html>
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />  
        <link rel="icon" type="image/png" href="images/four_allumé.png" />
        <title>Administation - ContrOven</title>
    </head>
    <body style="background-image: url('images/background.jpg');background-attachment: fixed;background-position: center center;">
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <div class="white container z-depth-3" style="margin-top:2%;margin-bottom:2%;padding-top : 2%; padding-bottom : 2%;">
            <a href="gestion.php"><button class='btn waves-effect waves-light'><i class='material-icons'>arrow_back</i></button></a>
            <div class="container">
                <h1 class="center-align"><b>ContrOven</b></h1>
                <?php if(isset($_SESSION['logged']) && $_SESSION['logged'] == true && $_SESSION['rights'] == 1){ ?>
                <div class="row">
                    <h5 class="center-align"><i>Administration</i></h5>
                    <table class="highlight centered responsive-table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Droits</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php for($i = 0; $i < sizeof($usersInfo); $i++){
                                echo "<tr>
                                    <td>".$usersInfo[$i]['nom']."</td>
                                    <td>".$usersInfo[$i]['prenom']."</td>";
                                if($usersInfo[$i]['admin'] == 1){
                                    echo "<td>Administrateur</td>";
                                }
                                else{
                                    echo "<td>Utilisateur</td>";
                                }
                                echo "
                                <td>
                                    <form method='POST' action=''>
                                        <button class='btn waves-effect waves-light' name='modify".$i."'><i class='material-icons'>edit</i></button>
                                    </form>
                                </td>
                                <td>
                                    <form method='POST' action=''>
                                        <button class='btn waves-effect waves-light' name='".$i."'><i class='material-icons'>delete_forever</i></button>
                                    </form>
                                </td>";
                            }?>
                        </tbody>
                    </table>
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