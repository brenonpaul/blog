<?php
require_once ('../../infra/connection.php');

class Consulta {
    private $connection;

    public function __construct() {
        $this->connection = new Connection();
    }

    function consultaPosts($id=null) {
       
        if($id == null)
            $sql = "select post.post_id postId, post.descricao, usuario.nome, post.usuario_id from post left join usuario on usuario.usuario_id = post.usuario_id";
        else 
            $sql = "select post.post_id postId, post.descricao, usuario.nome, post.usuario_id from post left join usuario on usuario.usuario_id = post.usuario_id where post.post_id = $id";

        return  mysqli_query($this->connection->getConnection(), $sql);
    }
}
