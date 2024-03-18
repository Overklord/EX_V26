<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О нас</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #003399;
            padding: 20px 0;
            color: white;
            text-align: center;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        nav {
            margin-top: 20px;
            text-align: center;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .content {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<header>
    <div class="container">
        <h1>Результаты Росийских спортсменов!</h1>
        <nav>
            <?php if (!isset($_SESSION['userId'])): ?>
                <a href="index.php">Главная</a>
                <a href="about.php">О нас</a>
                <a href="contacts.php">Контакты</a>
                <a href="login.php">Вход</a>
                <a href="register.php">Регистрация</a>
            <?php elseif ($_SESSION['userRole'] === 'admin'): ?>
                <a href="index.php">Главная</a>
                <a href="admin_panel.php">Админ панель</a>
                <a href="logout.php">Выход</a>
            <?php else: ?>
                <a href="index.php">Главная</a>
                <a href="about.php">О нас</a>
                <a href="contacts.php">Контакты</a>
                <a href="olimp.php">Результаты Олимпиад</a>
                <a href="logout.php">Выход</a>
            <?php endif; ?>
        </nav>
    </div>
</header>

    <div class="content">
        <div class="container">
            <div style="border: 2px solid #ccc; padding: 20px; border-radius: 10px;">
                <h2 style="font-size: 24px; color: #333; text-align: center; margin-bottom: 20px;">О нас</h2>
                <p style="font-size: 16px; line-height: 1.6; color: #555; margin-bottom: 15px;">Добро пожаловать на страницу "О нас"! Мы стремимся создать удобный и полезный ресурс, который поможет каждому узнать о значимых спортивных достижениях России, а также погрузиться в историю и культуру нашей страны через призму спорта.</p>
                <p style="font-size: 16px; line-height: 1.6; color: #555; margin-bottom: 15px;"> Наша команда работает над тем, чтобы система была доступной, информативной и вдохновляющей для всех, кто интересуется спортом и его историей в России.</p>
                <img src="1.jpg" alt="О нас 1" style="width: 30%; margin-top: 20px;">
                <p style="font-size: 16px; line-height: 1.6; color: #555; margin-top: 20px;">Присоединяйтесь к нам!</p>
                <img src="2.jpg" alt="О нас 2" style="width: 30%; margin-top: 20px;">
            </div>
            <?php if (!isset($_SESSION['userId'])): ?>
                <p style="margin-top: 20px; font-size: 16px; line-height: 1.6; color: #555;">Чтобы увидеть дополнительные разделы сайта, пожалуйста, <a href="login.php" style="color: #3498db; text-decoration: underline;">войдите</a> или <a href="register.php" style="color: #3498db; text-decoration: underline;">зарегистрируйтесь</a>.</p>
            <?php endif; ?>
        </div>
    </div>


</body>
</html>
