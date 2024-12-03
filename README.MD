<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        code {
            background: #f9f2f4;
            color: #c7254e;
            padding: 2px 4px;
            border-radius: 4px;
        }
        pre {
            background: #f4f4f4;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <h1>Документация REST API для тестового задания</h1>
    <table>
        <thead>
            <tr>
                <th>Метод</th>
                <th>Описание</th>
                <th>URL</th>
                <th>Тело запроса</th>
                <th>Пример ответа</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><code>POST</code></td>
                <td>Создать пользователя</td>
                <td><code>/user</code></td>
                <td>
                    <pre>
    {
    "name": "Иван Иванов",
    "email": "ivan@example.com",
    "password": "securepassword"
    }
                    </pre>
                </td>
                <td>
                    <pre>
    {
    "message": "User created",
    "id": "unique_user_id"
    }                   
                    </pre>
                </td>
            </tr>
            <tr>
                <td><code>PUT</code></td>
                <td>Обновить информацию пользователя</td>
                <td><code>/user/{id}</code></td>
                <td>
                    <pre>
    {
    "name": "Иван Обновленный"
    }
                    </pre>
                </td>
                <td>
                    <pre>
    {
    "message": "User updated"
    }                   
                    </pre>
                </td>
            </tr>
            <tr>
                <td><code>DELETE</code></td>
                <td>Удалить пользователя</td>
                <td><code>/user/{id}</code></td>
                <td>—</td>
                <td>
                    <pre>
    {
    "message": "User deleted"
    }
                    </pre>
                </td>
            </tr>
            <tr>
                <td><code>POST</code></td>
                <td>Авторизация пользователя</td>
                <td><code>/auth</code></td>
                <td>
                    <pre>
    {
    "email": "ivan@example.com",
    "password": "securepassword"
    }
                    </pre>
                </td>
                <td>
                    <pre>
    {
    "message": "Authorization successful",
    "user_id": "unique_user_id"
    }
                    </pre>
                </td>
            </tr>
            <tr>
                <td><code>GET</code></td>
                <td>Получить информацию о пользователе</td>
                <td><code>/user/{id}</code></td>
                <td>—</td>
                <td>
                    <pre>
    {
    "name": "Иван Иванов",
    "email": "ivan@example.com"
    }
                    </pre>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
