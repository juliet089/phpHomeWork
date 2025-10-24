<?php
$result = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем значения из формы
    $name     = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email    = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Валидация email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p>Некорректный email!</p>";
    } else {
        // Формируем ассоциативный массив
        $result = [
            'name'     => $name,
            'email'    => $email,
            'password' => $password
        ];

    }
}
?>


<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Регистрация</title>
    <style>
        /* Центрирование формы по экрану */
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }
        .container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(220, 108, 173, 1);
        }
        form label {
            display: block;
            margin-bottom: 12px;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 420px;
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            background: rgba(255, 67, 177, 1);
            color: white;
            cursor: pointer;
        }
        button:hover {
            background: rgba(255, 67, 177, 1, );
        }
        .message {
            margin-bottom: 12px;
            color: #d33;
        }
        pre {
            background: #65ccffff;
            padding: 10px;
            border-radius: 4px;
            overflow: auto;
        }
    </style>
</head>
<body>
<div class="container">
    <?php
    echo "<pre>" . print_r($result, true) . "</pre>";
    ?>
<form method="post" action="">
    <label>
        Имя:<br>
        <input type="text" name="name" required>
    </label>

    <label>
        Email:<br>
        <input type="email" name="email" required>
    </label>

    <label>
        Пароль:<br>
        <input type="password" name="password" required>
    </label>

    <button type="submit">Зарегистрироваться</button>
</form>
</div>
</body>
</html>