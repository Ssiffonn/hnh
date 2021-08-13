<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        Введите количество массивов (0-10): <input type="text" name="size" id="">
        <input type="submit" value="Отсортирвать" name="run">
    </form>

    <?php
        include "func.php";
        if(isset($_POST['run'])){
            if($_POST['size'] != '' && is_numeric($_POST['size'])){
                $n = $_POST['size'];
                $MainArr = createArr($n);
                echo "<br>";
                echo "Исходный массив: ";
                show($MainArr);
                $MainArr = sortArr($MainArr);
                echo "<br>";
                echo "<br>";
                echo "Отсортированный массив: ";
                show($MainArr);
            }
            else{
                echo "Ввуедите число";
            }
        }
    ?>
</body>
</html>