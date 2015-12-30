<?php

namespace muller;

class Produtos {
    private $db;
    private $id;
    private $nome;
    private $unidade;
    private $id_fornecedor;

    public function __construct(IConexao $conexao) {
        $this->db = $conexao->conectar();
    }

    public function listar() {
        $query = "SELECT produtos.id,produtos.nome,produtos.unidade,produtos.id_fornecedores,fornecedores.nome as fornecedor FROM produtos"
                . " LEFT JOIN fornecedores ON fornecedores.id = produtos.id_fornecedores";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function get($id) {
        $query = "SELECT produtos.id,produtos.nome,produtos.unidade,produtos.id_fornecedores,fornecedores.nome as fornecedor FROM produtos"
                . " LEFT JOIN fornecedores ON fornecedores.id = produtos.id_fornecedores"
                . " WHERE produtos.id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        $this->id = $result['id'];
        $this->nome = $result['nome'];
        $this->unidade = $result['unidade'];
        $this->id_fornecedor = $result['id_fornecedores'];
    }

    public function salvar() {
        if ($this->id == 0) {
            $query = "INSERT INTO produtos(id_fornecedores,nome,unidade) values(:id_fornecedores,:nome,:unidade)";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":id_fornecedores", $this->id_fornecedor);
            $stmt->bindValue(":nome", $this->nome);
            $stmt->bindValue(":unidade", $this->unidade);
            $stmt->execute();
        } else {
            $query = "UPDATE produtos SET id_fornecedores = :id_fornecedores, nome = :nome,unidade = :unidade WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":id", $this->id);
            $stmt->bindValue(":id_fornecedores", $this->id_fornecedor);
            $stmt->bindValue(":nome", $this->nome);
            $stmt->bindValue(":unidade", $this->unidade);
            $stmt->execute();
        }
    }

    public function remover($id) {
        $query = "DELETE FROM produtos WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    public function setUnidade($unidade) {
        $this->unidade = $unidade;
        return $this;
    }

    public function setIdFornecedor($id_fornecedor) {
        $this->id_fornecedor = $id_fornecedor;
        return $this;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getUnidade() {
        return $this->unidade;
    }

    public function getIdFornecedor() {
        return $this->id_fornecedor;
    }

}
