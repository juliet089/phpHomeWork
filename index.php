<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Приветствие и проверка возраста</title>
  <style>
    html, body {
      height: 100%;
      margin: 0;
    }
    body {
      display: flex;
      align-items: center; /* вертикальное центрирование */
      justify-content: center; /* горизонтальное центрирование */
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
    }
    .card {
      background: white;
      padding: 24px;
      border-radius: 8px;
      box-shadow: 0 2px 12px rgba(220, 108, 173, 1);
      max-width: 420px;
      width: 100%;
    }
    .card h1 {
      margin-top: 0;
      font-size: 20px;
    }
    form {
      display: grid;
      gap: 8px;
      margin-top: 8px;
    }
    label {
        width: 400px;
      display: grid;
      grid-template-columns: auto 1fr;
      gap: 8px;
      align-items: center;
    }
    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    button {
      padding: 10px 12px;
      border: none;
      border-radius: 6px;
      background-color: rgba(255, 67, 177, 1);
      color: white;
      cursor: pointer;
    }
    .result {
      margin-top: 12px;
      padding: 8px 12px;
      border-radius: 6px;
      background-color: #65ccffff;
      border: 1px solid #d6eaff;
    }
  </style>
</head>
<body>
<?php
$name = isset($_GET['name']) ? $_GET['name'] : '';
$age  = isset($_GET['age']) ? $_GET['age'] : '';

$show = ($name !== '' && $age !== '' && ctype_digit($age) && (int)$age > 0);
?>

  <div class="card">
    <?php if ($show): ?>
      <div class="result">
        <?php 
          $age_int = (int)$age;
          echo "<p><b>Привет, " . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . "!</b></p>";
          if ($age_int >= 18)
            {echo '<p>Поздравляю! Ты уже взрослый! <img src="https://media.tenor.com/YEte6uU1KyUAAAAi/cool-emoji.gif" style="width:5%">
              </p>';}
          elseif ($age_int < 18) 
            {echo '<p>Чудесный возраст! Ещё много приключений впереди! <img src="https://media.tenor.com/l5hFk1q720QAAAAi/emoji-wink.gif" style="width:5%">
              </p>';}
        else {echo "<p></p>";}
        ?>
      </div>
    <?php endif; ?>

    <form method="get" action="">
      <h1>Введите имя и возраст</h1>
      <label>
        Имя: <input type="text" name="name" value="">
      </label>
      <label>
        Возраст: <input type="number" name="age" min="1" value="">
      </label>
      <button type="submit">Отправить</button>
    </form>
  </div>
</body>
</html>