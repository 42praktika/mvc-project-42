<?php class_exists('app\core\Template') or exit; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Введите данные</title>
</head>
<body>
 
<form action="<?= $action ?>" method="POST" style="display: flex; flex-direction: column; ">

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
    <label>Phone
        <input type="text" name="phone"/>
    </label>
    <input type="submit" value="Погнали">

</form>

</body>
</html>



