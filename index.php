<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Треугольник из чисел</title>
    <style>
        body {
            font-family: monospace;
            padding: 30px;
            background: #f9f9f9;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="number"] {
            padding: 10px;
            font-size: 16px;
            width: 100px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        .output {
            white-space: pre;
            background: #eee;
            padding: 20px;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<h1>Построить треугольник из чисел</h1>

<form method="get" action="triangle.php">
    <label for="n">Введите число:</label>
    <input type="number" name="n" id="n" required>
    <button type="submit">Построить</button>
</form>

</body>
</html>
