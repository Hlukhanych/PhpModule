<?php

$data_file = 'data.csv';

if (isset($_GET['clear']) && $_GET['clear'] == 1) {
    file_put_contents($data_file, '');
    header('Location: list.php');
    exit();
}

$data = [];

if (file_exists($data_file)) {
    $file = fopen($data_file, 'r');
    while (($line = fgetcsv($file)) !== FALSE) {
        $data[] = [
            'id' => $line[0],
            'name' => $line[1],
            'teacher' => $line[2],
            'points' => $line[3]
        ];
    }
    fclose($file);
}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Список предметів</title>
</head>
<body>

<button onclick="location.href='index.php'">Повернутися назад</button>

<br> <br>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Назва</th>
        <th>Викладач</th>
        <th>Кількість балів</th>
    </tr>
    <?php foreach ($data as $subject): ?>
        <tr>
            <td><?= $subject['id'] ?></td>
            <td><?= $subject['name'] ?></td>
            <td><?= $subject['teacher'] ?></td>
            <td><?= $subject['points'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<br>

<form action="list.php" method="get">
    <input type="hidden" name="clear" value="1">
    <input type="submit" value="Очистити список предметів">
</form>

</body>
</html>