<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Треугольник</title>
    <style>
        body {
            background: #111;
            color: #0f0;
            font-family: monospace;
            padding: 20px;
            text-align: center;
        }
        input, button {
            font-size: 16px;
            padding: 6px 12px;
            margin-bottom: 15px;
        }
        .row {
            display: flex;
            justify-content: center;
            margin: 5px 0;
        }
        .cell {
            width: 40px;
            height: 40px;
            margin: 2px;
            background: #222;
            border: 1px solid #0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h2>Равнобедренный треугольник из чисел</h2>

<input type="number" id="numberInput" placeholder="Введите число" required>
<button onclick="buildTriangle()">Построить</button>

<div id="triangleOutput"></div>

<script>
    function buildTriangle() {
        const n = document.getElementById("numberInput").value;
        fetch(`triangle.php?n=${n}`)
            .then(response => response.json())
            .then(data => {
                const container = document.getElementById("triangleOutput");
                container.innerHTML = "";

                if (data.error) {
                    container.innerHTML = `<p style="color: red;">${data.error}</p>`;
                    return;
                }

                data.triangle.forEach(row => {
                    const rowDiv = document.createElement("div");
                    rowDiv.className = "row";
                    row.forEach(num => {
                        const cell = document.createElement("div");
                        cell.className = "cell";
                        cell.textContent = num;
                        rowDiv.appendChild(cell);
                    });
                    container.appendChild(rowDiv);
                });
            });
    }
</script>

</body>
</html>

