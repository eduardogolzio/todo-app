<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    

    $db = new Database();
    $conn = $db->getConnection();

    // Verifica se o usuário já existe
    $query = $conn->prepare('SELECT id FROM users WHERE username = ?');
    $query->bind_param('s', $username); // Use bind_param para SQL com strings
    $query->execute();
    $result = $query->get_result();  // Obtem o resultado da consulta

    // Verifica se existe um usuário com esse nome
    if ($result->num_rows > 0) {
        echo "<script>
                alert('Nome do usuário já existe');
                window.location.href='register.html';
            </script>";
        exit;
    }

    // Hash da senha
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insere um novo usuário
    $query = $conn->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
    $query->bind_param('ss', $username, $hashed_password); // Bind dos parâmetros
    if ($query->execute()) {
        header('Location: index.html');
        exit;
    }

    echo "<script>
            alert('Falha no registro');
            window.location.href='register.html';
        </script>";
}
?>