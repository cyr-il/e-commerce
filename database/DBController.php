<?php

class DBController 
{
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $db = 'myfirstshop';

    //connection property
    public $connexion = null;

    public function __construct() 
    {
        $this->connexion = mysqli_connect(
            $this->host,
            $this->user,
            $this->password,
            $this->db
        );

        if($this->connexion->connect_error) {
            echo "erreur de connexion à la database". $this->connexion->connect_error;
        }
        echo "<h6>".'connection successful !'.'</h6>';
    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    //closing property
    protected function closeConnection() 
    {
        if($this->connexion != null) {
            $this->connexion->close();
            $this->connexion = null;
        }
    }
}
