<?php

class login
{
    private $_mail;
    private $_password;
    private $_bdd;

    public function __construct($mail, $password, $bdd)
    {
        $this->_mail = $mail;
        $this->_password;
        $this->_bdd;
    }

    public function verifUser()
    {
        if (!empty($this->_password) && !empty($this->_mail)) {
            $reqUser = $this->_bdd->prepare("SELECT * FROM user WHERE login = ? AND password = ?");
            $reqUser->execute(array($this->_mail, $this->_password));
            $userExist = $reqUser->rowCount();
            if ($userExist == 1) {
                return 1;
                session_start();
                $_SESSION['logged'] = true;
                header('Location:control.php');
            }else{
                return "Mail ou mot de passe incorrect";
            }
        }
    }
}

?>