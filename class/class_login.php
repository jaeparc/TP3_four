<?php

class login
{
    private $_mail;
    private $_password;
    private $_bdd;

    public function __construct($mail, $password, $bdd)
    {
        $this->_mail = $mail;
        $this->_password = $password;
        $this->_bdd = $bdd;
    }

    //Fonction testant l'existence d'un utilisateur correspondant aux données rentrées dans le formulaire et retournant un message d'erreur si erreur il y a 
    public function verifUser() 
    {
        if (!empty($this->_password) && !empty($this->_mail)) {
            if(filter_var($this->_mail, FILTER_VALIDATE_EMAIL)){
                $reqUser = $this->_bdd->prepare("SELECT * FROM user WHERE login = ? AND mdp = ?");
                $reqUser->execute(array($this->_mail, $this->_password));
                $userExist = $reqUser->rowCount();
                $userInfo = $reqUser->fetch();
                if ($userExist != 0) {
                    session_start();
                    $_SESSION['logged'] = true;
                    $_SESSION['id_logged'] = $userInfo['id'];
                    $_SESSION['rights'] = $userInfo['admin'];
                    header('Location:gestion.php');
                    return "<h6 class='green-text'><i>Connecté ".$_SESSION['id_logged']."</i></h6>";
                }else{
                    return "<h6 class='red-text'><i>Mail ou mot de passe incorrect</i></h6>";
                }
            }   
            else{
                return "<h6 class='red-text'><i>Adresse mail non valide</i></h6>";
            }
        }
        else{
            return "<h6 class='red-text'><i>Un des champs est vide</i></h6>";
        }
    }
}

?>