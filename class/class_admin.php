<?php
    class admin{
        private $_bdd;
        public function __construct($bdd)
        {
            $this->_bdd = $bdd;
        }
        
        //Fonction retournant les données de tous les utilisateurs
        public function getUsersData(){ 
            $reqUser = $this->_bdd->query("SELECT * FROM user");
            $i = 0;
            while($userInfo = $reqUser->fetch()){
                $usersData[$i]['id'] = $userInfo['id'];
                $usersData[$i]['nom'] = $userInfo['nom'];
                $usersData[$i]['prenom'] = $userInfo['prenom'];
                $usersData[$i]['admin'] = $userInfo['admin'];
                $i++;
            }
            return $usersData;
        }
        
        //Fonction supprimant l'utilisateur sélectionné
        public function deleteUser($id){ 
            $reqUser = $this->_bdd->query("DELETE FROM user WHERE id = ".$id);
        }
    }
?>