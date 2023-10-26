<!DOCTYPE html>
<html>
<head>
    <title>Notas</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    text-align: center;
    margin: 20px;
}

h1 {
    color: #333;
}

form {
    margin: 20px;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="number"] {
    width: 300px;
    padding: 5px;
    margin: 5px;
}

input[type="submit"] {
    background-color: #ad4747;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #ad4747;
}

p {
    color: #333;
    font-size: 18px;
    margin: 20px;
}
</style>
</head>
<body>
<form method="post">
    <label for="nombre_materia">Nombre de la Materia:</label>
    <input type="text" name="nombre_materia" required><br><br>
    <label for="cantidad_notas">Cantidad de Notas:</label>
    <input type="number" name="cantidad_notas" required><br><br>
    <label for="nota_minima">Nota Mínima en el Rango:</label>
    <input type="number" name="nota_minima" required><br><br>
    <label for="nota_maxima">Nota Máxima en el Rango:</label>
    <input type="number" name="nota_maxima" required><br><br>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre_materia = $_POST["nombre_materia"];
        $cantidad_notas = $_POST["cantidad_notas"];
        $nota_minima = $_POST["nota_minima"];
        $nota_maxima = $_POST["nota_maxima"];
        $total_notas = 0;

        for ($i = 1; $i <= $cantidad_notas; $i++) {
            $nota = $_POST["nota" . $i]; // Agregar campo de entrada para las notas en el formulario.
            
            if ($nota < $nota_minima || $nota > $nota_maxima) {
                echo "La nota $i está fuera del rango permitido.<br>";
            } else {
                $total_notas += $nota;
            }
        }

        if ($total_notas > 0) {
            $promedio = $total_notas / $cantidad_notas;
            $nota_min_aprobar = ($nota_minima + $nota_maxima) / 2 + 0.5;
            echo "El promedio de notas en $nombre_materia es: $promedio<br>";
            echo "La nota mínima para aprobar es: $nota_min_aprobar<br>";

            if ($promedio >= $nota_min_aprobar) {
                echo "Aprobaste pa.";
            } else {
                echo "Reprobaste, anda a vender Bon-ice.";
            }
        }
    }
    ?>
    <input type="submit" value="Calcular Promedio">
</form>
</body>
</html>