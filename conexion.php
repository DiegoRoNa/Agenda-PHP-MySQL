<?php 

class Conexion{
    private $server = 'mysql:local=localhost;dbname=agenda_php';
    private $user = 'root';
    private $password = '';
    private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

    protected $conexion;

    public function open(){
        try {
            $this->conexion = new PDO($this->server, $this->user, $this->password, $this->options);
            return $this->conexion;
        } catch (PDOException $e) {
            echo 'Ocurrió un problema con la conexión: '.$e->getMessage();
        }
    }


    public function close(){
        $this->conexion = null;
    }

}

?>
