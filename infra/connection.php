<?php
class Connection {

    private $usuario = 'root';
    private $senha = '';
    private $caminho = 'localhost';
    private $banco = 'blog';
    private $connection;

    public function __construct() {
        $this->connection = mysqli_connect($this->caminho, $this->usuario, $this->senha) or die("Conexão falhou: " . mysqli_error($this->connection));

         mysqli_select_db($this->connection, $this->banco) or die("Seleção de BD falhou: " . mysqli_error($this->connection));

    }

    public function getConnection(){
        return $this->connection;
    }
}

?>