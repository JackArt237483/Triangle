<?php
header('Content-Type: application/json');

function canFormIsoscelesTriangle($n) {
    $rows = 0;
    $sum = 0;

    while ($sum < $n) {
        $rows++;
        $sum += 2 * $rows - 1;
    }

    return ($sum === $n) ? $rows : false;
}

function buildTriangle($n) {
    $rows = canFormIsoscelesTriangle($n);

    if ($rows === false) {
        return ["error" => "Невозможно построить треугольник"];
    }

    $triangle = [];
    $current = 1;
    for ($i = 1; $i <= $rows; $i++) {
        $count = 2 * $i - 1;
        $row = [];
        for ($j = 0; $j < $count; $j++) {
            $row[] = $current++;
        }
        $triangle[] = $row;
    }

    return ["triangle" => $triangle];
}

if (isset($_GET['n']) && is_numeric($_GET['n'])) {
    $n = intval($_GET['n']);
    echo json_encode(buildTriangle($n));
} else {
    echo json_encode(["error" => "Введите корректное число"]);
}
