<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Área</title>
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
select {
    padding: 5px;
    margin: 5px;
}
input[type="text"] {
    width: 300px;
    padding: 5px;
    margin: 5px;
}
input[type="submit"] {
    background-color: #f85555;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
}
input[type="submit"]:hover {
    background-color: #f8555f;
}
p {
    color: #333;
    font-size: 18px;
    margin: 20px;
}
    </style>
</head>
<body>
    <form method="post" action="">
        <label for="shape">Selecciona una figura:</label>
        <select name="shape" id="shape">
            <option value="circle">Círculo</option>
            <option value="square">Cuadrado</option>
            <option value="rectangle">Rectángulo</option>
            <option value="triangle">Triángulo</option>
        </select>
        <br>
        <label for="input1">Ingrese el primer valor:</label>
        <input type="text" name="input1" id="input1">
        <br>
        <label for="input2">Ingrese el segundo valor:</label>
        <input type="text" name="input2" id="input2">
        <br>
        <input type="submit" value="Calcular Área">
    </form>
    <?php
    class Calculator {
        public function calculateArea($shape, $input1, $input2) {
            if (!is_numeric($input1) || !is_numeric($input2)) {
                return "Valores no válidos.";
            }
            switch ($shape) {
                case 'circulo':
                    $radius = $input1;
                    $area = round(pi() * $radius * $radius, 2);
                    break;
                case 'cuadrado':
                    $side = $input1;
                    $area = round($side * $side, 2);
                    break;
                case 'rectangulo':
                    $length = $input1;
                    $width = $input2;
                    $area = round($length * $width, 2);
                    break;
                case 'triangulo':
                    $base = $input1;
                    $height = $input2;
                    $area = round(0.5 * $base * $height, 2);
                    break;
                default:
                    return "Figura no válida.";
            }
            return $area;
        }
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $shape = $_POST['shape'];
        $input1 = $_POST['input1'];
        $input2 = $_POST['input2'];

        $calculator = new Calculator();
        $area = $calculator->calculateArea($shape, $input1, $input2);
        echo "<p>El área del $shape es: " . htmlspecialchars($area) . "</p>";
    }
    ?>
</body>
</html>
