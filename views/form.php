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
<form action="handle" method="POST">

    <label>Имя
        <input type="text" name="firstname"/>
    </label>
    <label>Фамилия
        <input type="text" name="lastname"/>
    </label>
    <label>Возраст
        <input type="text" name="age"/>
    </label>
    <label>Место работы
        <input type="text" name="job"/>
    </label>
    <input type="submit" value="Погнали">

</form>
</body>
</html>
