<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #adcfff;
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

        .carousel {
            width: 60%; 
            overflow: hidden;
            position: relative;
            border-radius: 10px;
            margin: 0 auto; 
        }

        .carousel-inner {
            display: flex;
            transition: transform 0.5s ease;
        }

        .carousel-item {
            flex: 0 0 100%;
            max-width: 100%;
            height: 500px; 
        }

        img {
            width: 100%;
            height: auto;
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
            <h2 style="text-align: center;">Добро пожаловать на главную страницу</h2>
            <h3 style="text-align: center;">На этом сайте Вы сможете ознакомиться с результатами Наших спортсменов на всемирных Олимпийских играх!</h3>
            <div class="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item">
                        <img src="1.jpg" alt="Image 1">
                    </div>
                    <div class="carousel-item">
                        <img src="2.jpg" alt="Image 2">
                    </div>
                    <div class="carousel-item">
                        <img src="3.jpg" alt="Image 3">
                    </div>
                    <!-- Добавьте больше изображений, если нужно -->
                </div>
            </div>
            <?php if (!isset($_SESSION['userId'])): ?>
                <p>Чтобы увидеть дополнительные разделы сайта, пожалуйста, <a href="login.php">войдите</a> или <a href="register.php">зарегистрируйтесь</a>.</p>
            <?php endif; ?>
        </div>
    </div>

    <script>
        const carouselItems = document.querySelectorAll('.carousel-item');
        let currentIndex = 0;

        setInterval(() => {
            currentIndex = (currentIndex + 1) % carouselItems.length;
            const offset = currentIndex * -100;
            document.querySelector('.carousel-inner').style.transform = `translateX(${offset}%)`;
        }, 2000); // Измените время смены изображений, если нужно
    </script>

</body>
</html>
