<?php
session_start();



// Обработка сброса сессии
if (isset($_GET['reset_session']) && $_GET['reset_session'] == 'true') {
    session_unset();
    session_destroy();
    // Перенаправляем, чтобы убрать параметр из URL и перезагрузить чистую сессию
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Инициализируем счётчик посещений, если он ещё не установлен.
$_SESSION['visits'] = $_SESSION['visits'] ?? 0;

$message = "";

// Определяем сообщение до увеличения счётчика
if ($_SESSION['visits'] === 0) {
    $message = "Добро пожаловать!";
} else {
    $message = "С возвращением!";
}

// Увеличиваем счётчик посещений после определения сообщения
$_SESSION['visits']++;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Система Посещений</title>
    <style>
        a {text-decoration: none;  color: white;}
        h1 {color: #ff43b1ff;}
        body { font-family: sans-serif; text-align: center; margin-top: 50px; 
        background-image: url('https://effects1.ru/gallery/GIF/salyut-PNG/iskra-3-0.gif'); }
        .reset-link { margin-top: 20px; }
        button { 
            width: 300px;
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            background: #65ccffff;
            cursor: pointer;
        }
        button:hover {background-color: #ff43b1ff;}
    </style>
</head>
<body>
    <h1><?= htmlspecialchars($message) ?></h1>
    <!-- Выводим счётчик прямо из переменной сессии -->
    <p>Вы посетили эту страницу **<?= htmlspecialchars($_SESSION['visits']) ?>** раз.</p>
    <p class="reset-link">
        <button><a href="?reset_session=true">Сбросить счётчик посещений</a></button>
    </p>
    <img src="https://media.tenor.com/cvl8Df226BoAAAAi/smiley-smiley-face.gif" style="width: 600px;">
</body>
</html>