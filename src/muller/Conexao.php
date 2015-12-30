<?php

namespace muller;

class Conexao implements IConexao{
    
    private $host;
    private $db;
    private $user;
    private $password;
    
    public function __construct($host,$db,$user,$password) {
        $this->host = $host;
        $this->db = $db;
        $this->user = $user;
        $this->password = $password;
    }
    
    public function conectar() {
        return new \PDO("mysql:host={$this->host};dbname={$this->db}",$this->user, $this->password);
    }
}
