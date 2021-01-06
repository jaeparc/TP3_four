<?php
class gestion
{
    private $_id, $_bdd;

    public function __construct($id,$bdd)
    {
        $this->_id = $id;
        $this->_bdd = $bdd;
        $reqUser = $this->_bdd->query("SELECT * FROM user WHERE id = ".$this->_id);
        $userInfo = $reqUser->fetch();
    }

    public function getUserData(){ //Fonction retournant les données de l'utilisateur connecté
        $reqUser = $this->_bdd->query("SELECT * FROM user WHERE id = ".$this->_id);
        $userInfo = $reqUser->fetch();
        return $userInfo;
    }

    public function logout(){ //Fonction déconnectant l'utilisateur connecté
        session_destroy();
        header('Location:index.php');
    }
}
?>