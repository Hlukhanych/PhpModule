<?php

$data_file = 'data.csv';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $teacher = $_POST['teacher'];
    $points = $_POST['points'];

    $new_subject = [
        'id' => $id,
        'name' => $name,
        'teacher' => $teacher,
        'points' => $points
    ];

    $file = fopen($data_file, 'a');
    fputcsv($file, $new_subject);
    fclose($file);

    header('Location: list.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Додати предмет</title>
</head>
<body>

<form action="index.php" method="post">
    ID: <input type="text" name="id"><br>
    Назва: <input type="text" name="name"><br>
    Викладач: <input type="text" name="teacher"><br>
    Кількість балів: <input type="text" name="points"><br>
    <input type="submit" value="Додати">
</form>

</body>
</html>