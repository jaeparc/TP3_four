<?php
class modif{
    private $_id,$_bdd;
    public function __construct($id,$bdd)
    {
        $this->_id = $id;
        $this->_bdd = $bdd;
    }

    public function getUserData(){
        $reqUser = $this->_bdd->query("SELECT * FROM user WHERE id = ".$this->_id);
        $userInfo = $reqUser->fetch();
        return $userInfo;
    }

    public function modif($mail,$mdp,$prenom,$nom){
        if (!empty($mail) && !empty($mdp) && !empty($prenom) && !empty($nom)) {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
                $reqUser = $this->_bdd->query("UPDATE user SET `login` = ".$mail.", `mdp` = ".$mdp.", `prenom` = ".$prenom.", `nom` = ".$nom." WHERE `id` = ".$this->_id);
                $_SESSION['idUserModify'] = "";
                header('Location:admin.php');
            }else{
                return "<h6 class='red-text'><i>Adresse mail non valide</i></h6>";
            }
        }else{
            return "<h6 class='red-text'><i>Un des champs est vide</i></h6>";
        }
    }
}
?>