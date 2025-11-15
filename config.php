<?php
class Database {
    private $db;

    public function __construct() {
        // Dados para conexão com o MySQL
        $host = 'localhost';   // Host do MySQL
        $username = 'root';    // Usuário padrão do MySQL
        $password = '';        // Senha (vazia no XAMPP)
        $dbname = 'todo_app';  // Nome do banco de dados

        // Conectar ao MySQL (sem especificar o banco de dados para criar primeiro)
        $this->db = new mysqli($host, $username, $password);

        // Verificar se houve erro de conexão
        if ($this->db->connect_error) {
            die("Falha na conexão: " . $this->db->connect_error);
        }

        // Criar o banco de dados se não existir
        $this->createDatabase($dbname);

        // Agora, conectamos ao banco de dados que acabamos de garantir que existe
        $this->db = new mysqli($host, $username, $password, $dbname);

        // Verificar novamente a conexão com o banco de dados
        if ($this->db->connect_error) {
            die("Falha na conexão com o banco de dados: " . $this->db->connect_error);
        }

        $this->createTables();
    }

    private function createDatabase($dbname) {
        // Cria o banco de dados se não existir
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
        if ($this->db->query($sql) !== TRUE) {
            echo "Erro ao criar o banco de dados: " . $this->db->error;
        }
    }

    private function createTables() {
        // Criar tabela de usuários
        $sql1 = 'CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL
        )';
        
        if (!$this->db->query($sql1)) {
            echo "Erro ao criar tabela users: " . $this->db->error;
        }

        // Criar tabela de tarefas
        $sql2 = 'CREATE TABLE IF NOT EXISTS todos (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT,
            title TEXT NOT NULL,
            completed BOOLEAN DEFAULT 0,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id)
        )';
        
        if (!$this->db->query($sql2)) {
            echo "Erro ao criar tabela todos: " . $this->db->error;
        }
    }

    public function getConnection() {
        return $this->db;
    }
}

?>