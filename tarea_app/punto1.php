<html>
<head>
    <style>
body {
    font-family: Arial, sans-serif;
    text-align: center;
    background-color: #f2f2f2;
    margin: 0;
    padding: 20px;
}
.message {
    font-weight: bold;
}
.number {
    font-size: 1.2em;
    padding: 5px;
    border: 1px solid #333;
    background-color: #fff;
    margin: 5px;
    display: inline-block;
}
.group {
    margin-top: 20px;
}
</style>
</head>
<body>
<?php
echo "Generando números...<br /><br>";
$nros_a_generar = 10;
$numbers = [];
echo "Los números son... <br>";
for ($i = 0; $i < $nros_a_generar; $i++) {
    $numbers[] = mt_rand(1, 100);
    echo "[ " . $numbers[$i] . " ]";
}
sort($numbers);
echo "<br/><br>";
echo "Clasificando pares e impares...<br /><br>";
$impares = [];
$pares = [];
foreach ($numbers as $number) {
    if ($number % 2 == 0) {
        $pares[] = $number;
    } else {
        $impares[] = $number;
    }
}
rsort($pares);
sort($impares);
echo "Números pares: [ " . implode(", ", $pares) . " ]<br>";
echo "Números impares: [ " . implode(", ", $impares) . " ]";
?>
</body>
</html>