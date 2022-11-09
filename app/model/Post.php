<?php
require_once ('../../infra/connection.php');
class Post {
    public $postId;
    public $descricao;
    public $idUsuario;

    private $connection;

    public function __construct() {
        $this->connection = new Connection();
    }

    //setters
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }     

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    //getters
    public function getPostId() {
        return $this->postId;
    }

    public function getDescricao() {
        return $this->descricao;
    }   
    
    public function getIdsuario() {
        return $this->idUsuario;
    }    


    //consultas
    public function alteraUsuario($idUsuario, $nome, $sexo, $senha) {
        $sql = "UPDATE usuario SET ";

        if ($nome != NULL)
            $sql .= "nome = '$nome', ";
        if ($sexo != NULL)
            $sql .= "sexo = '$sexo', ";
        if ($senha != NULL)
            $sql .= "senha = '$senha', ";

        $sql .= "usuario_id = $idUsuario ";
        $sql .= "WHERE usuario_id = '$idUsuario';";
        
        return mysqli_query($this->connection->getConnection(), $sql);
    }

    public function cadastraPost($descricao, $usuarioId) {
        $this->descricao = $descricao;
        $this->usuarioId = $usuarioId;

        $sql = "INSERT INTO post (descricao, usuario_id) VALUES ('$descricao', '$usuarioId')";
        return mysqli_query($this->connection->getConnection(), $sql);
    }

    public function editaPost($id, $descricao, $usuarioId) {
        $this->postId = $id;
        $this->descricao = $descricao;
        $this->usuarioId = $usuarioId;

        $sql = "UPDATE post SET descricao = '$descricao' WHERE post_id = $id";
        return mysqli_query($this->connection->getConnection(), $sql);
    }
    

    public function excluirPost($idPost) {
        $sql = "DELETE FROM post WHERE post_id = '$idPost'";
        mysqli_query($this->connection->getConnection(), $sql);
    }
}
?>