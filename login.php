<?php
    session_start();
    require_once 'config.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $db = new Database();
        $conn = $db->getConnection();

        // Busca usuário e senha no banco
        $query = $conn->prepare('SELECT id, password FROM users WHERE username = ?');
        $query->bind_param('s', $username);
        $query->execute();
        $result = $query->get_result();

        if ($user = $result->fetch_assoc()) {
            // Verifica se a senha está correta
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: dashboard.html');
                exit;
            }
        }

        // Login falhou
        echo "<script>
                alert('Usuário ou senha inválidos');
                window.location.href='index.html';
            </script>";
    }
?>