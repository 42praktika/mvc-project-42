<?php
setlocale(LC_TIME, "ru-RU");
echo "Добрый вечер, сегодня " . date("l j F");
?>

<html lang="ru">
<head>
    <title>Введите данные</title>
    <meta charset="UTF-8"/>
</head>
<body>
<form action="handle" method="POST" style="display: flex; flex-direction: column; ">

    <label>Имя
        <input type="text" name="first_name"/>
    </label>
    <label>Фамилия
        <input type="text" name="second_name"/>
    </label>
    <label>Возраст
        <input type="text" name="age"/>
    </label>
    <label>Место работы
        <input type="text" name="job"/>
    </label>
    <label>EMail
        <input type="text" name="email"/>
    </label>
    <input type="submit" value="Погнали">

</form>
</body>
</html>
