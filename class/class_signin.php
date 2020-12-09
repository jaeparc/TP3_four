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
    }
?>