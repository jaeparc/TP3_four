<?php
    class signin{
        private $_mail;
        private $_password;
        private $_nom;
        private $_prenom;
        private $_bdd;

        public function __construct($mail,$password,$nom,$prenom,$bdd)
        {
            $this->_mail = $mail;
            $this->_password = $password;
            $this->_nom = $nom;
            $this->_prenom = $prenom;
            $this->_bdd = $bdd;
        }

        public function signUser(){
            $reqUser = $this->_bdd->query("INSERT INTO `user` (`id`, `login`, `mdp`, `prenom`, `nom`) VALUES (NULL, '".$this->_mail."', '".$this->_password."', '".$this->_prenom."', '".$this->_nom."')");
            if(!empty($this->_mail) && !empty($this->_password) && !empty($this->_nom) && !empty($this->_prenom)){
                if(filter_var($this->_mail, FILTER_VALIDATE_EMAIL)){
                    return "<h6 class='green-text'><i>Inscrit!</i></h6>";
                    session_start();
                    $_SESSION['logged'] = true;
                    header('Location:control.php');
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