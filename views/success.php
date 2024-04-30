<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Успех!</title>
    <style>
        table, th, td {
            border: 1px solid;
        }
    </style>
</head>
<body>
<H1 style="color: forestgreen">Успех!</H1>

<H1>Список пользователей: </H1>

<table>
    <thead>
    <tr>
        <th>Имя</th>
        <th>Фамилия</th>
        <th>Возраст</th>
        <th>Работа</th>
        <th>E-Mail</th>
        <th>Телефон</th>
    </tr>
    </thead>
    <tbody>
    <?php
    /** @var Collection $users */
    /** @var mixed $context */
    $users = $context["users"] ?? [];

    /** @var User $user */

    use app\core\Collection;
    use app\models\User;

    foreach ($users->getNextRow() as $user) :
        ?>
        <tr>
            <td><?= $user->getFirstName() ?></td>
            <td><?= $user->getSecondName() ?></td>
            <td><?= $user->getAge() ?></td>
            <td><?= $user->getJob() ?></td>
            <td><?= $user->getEmail() ?></td>
            <td><?= $user->getPhone() ?></td>

        </tr>

    <?php
    endforeach;
    ?>
    </tbody>
</table>

<a href="/">На главную</a>
</body>
</html>