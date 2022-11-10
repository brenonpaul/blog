<?php
require_once ('../../infra/connection.php');
class Usuario {
    public $idUsuario;
    public $nome;
    public $sexo;
    private $senha;

    private $connection;

    public function __construct() {
        $this->connection = new Connection();
    }

    //setters
    public function setNome($nome) {
        $this->nome = $nome;
    }     

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    //getters
    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getNome() {
        return $this->nome;
    }   
    
    public function getSexo() {
        return $this->sexo;
    }    

    private function getSenha() {
        return $this->senha;
    }

    //consultas
    public function loginUsuario($nome, $senha) {
        $sql = "SELECT usuario_id, nome, senha, sexo, tipo_usuario from usuario WHERE nome = '$nome' AND senha = '$senha'";
        return mysqli_query($this->connection->getConnection(), $sql);
    }

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

    public function cadastraUsuario($nome, $sexo, $senha) {
        $this->nome = $nome;
        $this->sexo = $sexo;
        $this->senha = $senha;

        $sql = "INSERT INTO usuario (nome, sexo, senha) VALUES ('$nome', '$sexo', '$senha')";
        return mysqli_query($this->connection->getConnection(), $sql);
    }

    public function alteraUsuarioAdmin($novaIdUsuario, $nome, $sexo, $antigaIdUsuario) {
        $sql = "UPDATE usuario SET ";

        if ($sexo != NULL)
            $sql .= "sexo = '$sexo', ";
        if ($sexo != NULL)
            $sql .= "usuario_id = '$novaIdUsuario', ";
        if ($nome != NULL)
            $sql .= "nome = '$nome' ";

        $sql .= "WHERE usuario_id = '$antigaIdUsuario';";
  
        return mysqli_query($this->connection->getConnection(), $sql);
    }
}
?>