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

    public function verifUser()
    {
        if (!empty($this->_password) && !empty($this->_mail)) {
            if(filter_var($this->_mail, FILTER_VALIDATE_EMAIL)){
                $reqUser = $this->_bdd->prepare("SELECT * FROM user WHERE login = ? AND mdp = ?");
                $reqUser->execute(array($this->_mail, $this->_password));
                $userExist = $reqUser->rowCount();
                $userInfo = $reqUser->fetch();
                if ($userExist != 0) {
                    return "<h6 class='green-text'><i>Connecté</i></h6>";
                    session_start();
                    $_SESSION['logged'] = true;
                    $_SESSION['id_logged'] = $userInfo['id'];
                    header('Location:control.php');
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