<?php

function canFormIsoscelesTriangle($n) {
    $rows = 0;
    $sum = 0;

    while ($sum < $n) {
        $rows++;
        $sum += 2 * $rows - 1;
    }

    return ($sum === $n) ? $rows : false;
}

function generateTriangle($n, $webMode = false) {
    $rows = canFormIsoscelesTriangle($n);
    if ($rows === false) {
        return $webMode ? "Невозможно построить треугольник" : "Невозможно построить треугольник\n";
    }

    $current = 1;
    $output = "";

    for ($i = 1; $i <= $rows; $i++) {
        $count = 2 * $i - 1;
        $spaces = $rows - $i;
        $spaceChar = $webMode ? "&nbsp;" : " ";
        $lineBreak = $webMode ? "<br>" : "\n";

        $output .= str_repeat($spaceChar, $spaces * 2);
        for ($j = 0; $j < $count; $j++) {
            $output .= $current++ . " ";
        }
        $output .= $lineBreak;
    }

    return $webMode ? "<pre>$output</pre>" : $output;
}

// --- CLI режим ---
if (php_sapi_name() === 'cli') {
    $n = (int)($argv[1] ?? 0);
    echo generateTriangle($n);
    exit;
}

// --- WEB режим ---
if (isset($_GET['n']) && is_numeric($_GET['n'])) {
    $n = (int)$_GET['n'];
    echo generateTriangle($n, true);
} else {
    echo "<pre>Введите корректное число в параметре 'n'. Например: ?n=9</pre>";
}
