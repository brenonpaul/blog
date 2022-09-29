<?php
require_once ('../../infra/connection.php');

class Consulta {
    private $connection;

    public function __construct() {
        $this->connection = new Connection();
    }

    function consultaPosts() {
        $sql = "select post.descricao, usuario.nome from post left join usuario on usuario.usuario_id = post.usuario_id";
        return  mysqli_query($this->connection->getConnection(), $sql);
    }
}
