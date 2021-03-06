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

    //Fonction retournant les données de l'utilisateur connecté
    public function getUserData(){ 
        $reqUser = $this->_bdd->query("SELECT * FROM user WHERE id = ".$this->_id);
        $userInfo = $reqUser->fetch();
        return $userInfo;
    }
    
    //Fonction déconnectant l'utilisateur connecté
    public function logout(){ 
        session_destroy();
        header('Location:index.php');
    }

    // fonction qui fère la liaison TCP
    public function submitTemp($temp){
        $adress = '192.168.65.25';
        $port = '203';
        $buf = $temp;

        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

        socket_connect($socket, $adress, $port);

        socket_send($socket, $buf, 6, 0);

        socket_close($socket);
    }
}
?>