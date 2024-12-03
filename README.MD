<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
