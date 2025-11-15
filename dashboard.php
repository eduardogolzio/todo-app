<?php
    session_start();
    require_once 'config.php';

    // Verifica se o usuário está logado
    if (!isset($_SESSION['user_id'])) {
        header('Location: index.html');
        exit;
    }

    $db = new Database();
    $conn = $db->getConnection();
    $user_id = $_SESSION['user_id'];

    $action = $_GET['action'] ?? $_POST['action'] ?? '';

    switch ($action) {
        case 'list':
            // Lista todas as tarefas do usuário
            $query = $conn->prepare('SELECT * FROM todos WHERE user_id = ? ORDER BY created_at DESC');
            $query->bind_param('i', $user_id);
            $query->execute();
            $result = $query->get_result();
            
            $todos = [];
            while ($row = $result->fetch_assoc()) {
                $todos[] = $row;
            }
            
            header('Content-Type: application/json');
            echo json_encode($todos);
            break;

        case 'add':
            // Adiciona nova tarefa
            $title = $_POST['title'] ?? '';
            
            if (!empty($title)) {
                $query = $conn->prepare('INSERT INTO todos (user_id, title) VALUES (?, ?)');
                $query->bind_param('is', $user_id, $title);
                
                if ($query->execute()) {
                    http_response_code(201);
                    echo json_encode(['message' => 'Todo criado com sucesso']);
                } else {
                    http_response_code(500);
                    echo json_encode(['error' => 'Erro ao criar todo']);
                }
            }
            break;

        case 'toggle':
            // Marca/desmarca tarefa como completa
            $id = $_POST['id'] ?? 0;
            $completed = $_POST['completed'] ?? 0;
            
            if ($id) {
                $query = $conn->prepare('UPDATE todos SET completed = ? WHERE id = ? AND user_id = ?');
                $query->bind_param('iii', $completed, $id, $user_id);
                
                if ($query->execute()) {
                    echo json_encode(['message' => 'Todo atualizado com sucesso']);
                } else {
                    http_response_code(500);
                    echo json_encode(['error' => 'Erro ao atualizar todo']);
                }
            }
            break;

        case 'delete':
            // Deleta tarefa
            $id = $_POST['id'] ?? 0;
            
            if ($id) {
                $query = $conn->prepare('DELETE FROM todos WHERE id = ? AND user_id = ?');
                $query->bind_param('ii', $id, $user_id);
                
                if ($query->execute()) {
                    echo json_encode(['message' => 'Todo deletado com sucesso']);
                } else {
                    http_response_code(500);
                    echo json_encode(['error' => 'Erro ao deletar todo']);
                }
            }
            break;

        case 'update':
            // Atualiza o título da tarefa
            $id = $_POST['id'] ?? 0;
            $title = $_POST['title'] ?? '';
            
            if ($id && $title) {
                $query = $conn->prepare('UPDATE todos SET title = ? WHERE id = ? AND user_id = ?');
                $query->bind_param('sii', $title, $id, $user_id);
                
                if ($query->execute()) {
                    echo json_encode(['message' => 'Todo atualizado com sucesso']);
                } else {
                    http_response_code(500);
                    echo json_encode(['error' => 'Erro ao atualizar todo']);
                }
            }
            break;
    }
?>