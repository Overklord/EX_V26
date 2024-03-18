<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #adcfff;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #003399;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #003399;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #003399;
        }
        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Результаты Росийских спортсменов!</h1>
        <p>Лучшее место для авторизации</p>
    </div>
    <div class="container">
        <h2>Вход</h2>
        <?php
        session_start();
        include 'functions.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $user = loginUser($username, $password);
            if ($user) {
                $_SESSION['userId'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['userRole'] = checkUserRole($user['id']); // Получаем и сохраняем роль пользователя
                $_SESSION['message'] = "Вы успешно вошли в систему!";
                header("location: index.php"); // Перенаправляем пользователя на главную страницу после успешной авторизации
            } else {
                echo "<p class='error-message'>Неверное имя пользователя или пароль.</p>";
            }
        }
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="loginForm" onsubmit="return validateLoginForm()">
            <label>Имя пользователя:</label><br>
            <input type="text" name="username" required><br>
            <label>Пароль:</label><br>
            <input type="password" name="password" required><br><br>
            <input type="submit" value="Войти">
        </form>
    </div>
</body>
<script>
    function validateLoginForm() {
        var username = document.forms["loginForm"]["username"].value;
        var password = document.forms["loginForm"]["password"].value;
        
        if (username == "" || password == "") {
            alert("Пожалуйста, заполните все поля.");
            return false;
        }
        return true;
    }
</script>

</html>
