<?php

namespace muller;

class Fornecedor {

    private $db;
    private $id;
    private $nome;
    private $email;

    public function __construct(IConexao $conexao) {
        $this->db = $conexao->conectar();
    }

    public function listar() {
        $query = "SELECT * FROM fornecedores";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function get($id) {
        $query = "SELECT * FROM fornecedores WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        $this->setId($result['id']);
        $this->setNome($result['nome']);
        $this->setEmail($result['email']);
    }

    public function salvar() {
        if ($this->id == 0) {
            $query = "INSERT INTO fornecedores(nome,email) values(:nome,:email)";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":nome", $this->nome);
            $stmt->bindValue(":email", $this->email);
            $stmt->execute();
        } else {
            $query = "UPDATE fornecedores set nome = :nome,email = :email WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":id", $this->id);
            $stmt->bindValue(":nome", $this->nome);
            $stmt->bindValue(":email", $this->email);
            $stmt->execute();
        }
    }

    public function remover($id) {
        $query = "DELETE FROM fornecedores WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }
    
    public function podeRemover($id){
        $query = "SELECT * FROM produtos WHERE id_fornecedores = :id";
        $stmt  = $this->db->prepare($query);
        $stmt->bindValue(":id",$id);
        $stmt->execute();
        $res = $stmt->fetch(\PDO::FETCH_ASSOC);
        if($stmt->rowCount()  == 0){
            return true;
        } else{
            return false;
        }
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

}
