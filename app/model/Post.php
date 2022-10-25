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


    public function excluirUsuario($idUsuario) {
        $sql = "DELETE FROM post WHERE usuario_id = '$idUsuario'";
        mysqli_query($this->connection->getConnection(), $sql);

        $sql = "DELETE FROM usuario WHERE usuario_id = '$idUsuario'";
        return mysqli_query($this->connection->getConnection(), $sql);
    }

    public function cadastraPost($descricao, $usuarioId) {
        $this->descricao = $descricao;
        $this->usuarioId = $usuarioId;

        $sql = "INSERT INTO post (descricao, usuario_id) VALUES ('$descricao', '$usuarioId')";
        die($sql);
        return mysqli_query($this->connection->getConnection(), $sql);
    }
}
?>