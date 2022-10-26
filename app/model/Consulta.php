<?php
require_once ('../../infra/connection.php');

class Consulta {
    private $connection;

    public function __construct() {
        $this->connection = new Connection();
    }

    function consultaPosts() {
        $sql = "select post.post_id postId, post.descricao, usuario.nome, post.usuario_id from post left join usuario on usuario.usuario_id = post.usuario_id";
        return  mysqli_query($this->connection->getConnection(), $sql);
    }
}
