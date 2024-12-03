<?php
header('Content-Type: application/json');

define('USER_DATA_FILE', 'users.json');

function loadUsers() {
    if (!file_exists(USER_DATA_FILE)) {
        return [];
    }
    return json_decode(file_get_contents(USER_DATA_FILE), true) ?: [];
}

function saveUsers($users) {
    file_put_contents(USER_DATA_FILE, json_encode($users, JSON_PRETTY_PRINT));
}

function getRequestBody() {
    return json_decode(file_get_contents('php://input'), true);
}

$requestMethod = $_SERVER['REQUEST_METHOD'];
$path = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
$action = $path[0] ?? null;

switch ($action) {
    case 'user':
        $users = loadUsers();
        $requestData = getRequestBody();
        $id = $path[1] ?? null;

        if ($requestMethod === 'POST') {
            $id = uniqid();
            $users[$id] = $requestData;
            saveUsers($users);
            echo json_encode(['message' => 'User created', 'id' => $id]);
        } elseif ($requestMethod === 'PUT' && $id) {
            if (!isset($users[$id])) {
                http_response_code(404);
                echo json_encode(['error' => 'User not found']);
                exit;
            }
            $users[$id] = array_merge($users[$id], $requestData);
            saveUsers($users);
            echo json_encode(['message' => 'User updated']);
        } elseif ($requestMethod === 'DELETE' && $id) {
            if (!isset($users[$id])) {
                http_response_code(404);
                echo json_encode(['error' => 'User not found']);
                exit;
            }
            unset($users[$id]);
            saveUsers($users);
            echo json_encode(['message' => 'User deleted']);
        } elseif ($requestMethod === 'GET' && $id) {
            if (!isset($users[$id])) {
                http_response_code(404);
                echo json_encode(['error' => 'User not found']);
                exit;
            }
            echo json_encode($users[$id]);
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid request']);
        }
        break;

    case 'auth':
        if ($requestMethod === 'POST') {
            $users = loadUsers();
            foreach ($users as $id => $user) {
                if ($user['email'] === $requestData['email'] && $user['password'] === $requestData['password']) {
                    echo json_encode(['message' => 'Authorization successful', 'user_id' => $id]);
                    exit;
                }
            }
            http_response_code(401);
            echo json_encode(['error' => 'Invalid email or password']);
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid request']);
        }
        break;

    default:
        http_response_code(404);
        echo json_encode(['error' => 'Endpoint not found']);
        break;
}
