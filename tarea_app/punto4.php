<!DOCTYPE html>
<html>
<head>
    <title>Gestion</title>
    <link rel="stylesheet" href="punto4.css">
</head>
<body>
    <h1>Agregar Docente</h1>
    <form method="post" action="procesar_docente.php">
        <label for="codigo">Código:</label>
        <input type="text" name="codigo" required><br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>
        <label for="ocupacion">Ocupación:</label>
        <select name="ocupacion" required>
        </select><br>
        <input type="submit" value="Agregar Docente">
        </form>
</body>
</html>
            <?php
            // Conexión a la base de datos
            $conexion = new mysqli("localhost", "usuario", "contrasena", "asignaturas2_db");
            // Verificar la conexión
            if ($conexion->connect_error) {
                die("Error de conexión a la base de datos: " . $conexion->connect_error);
            }
            // Consulta para obtener las ocupaciones
            $query = "SELECT id, nombre FROM ocupaciones";
            $result = $conexion->query($query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
                }
            }
            // Cerrar la conexión a la base de datos
            $conexion->close();
            ?>
        </select><br>
        <input type="submit" value="Agregar Docente">
    </form>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conectar a la base de datos
    $conexion = new mysqli("localhost", "usuario", "contrasena", "asignaturas2_db");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }

    // Obtener datos del formulario
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $ocupacion = $_POST['ocupacion'];

    // Insertar el nuevo docente en la base de datos
    $sql = "INSERT INTO docentes (cod, nombre, idOcupacion) VALUES ('$codigo', '$nombre', $ocupacion)";

    if ($conexion->query($sql) === TRUE) {
        echo "Docente agregado con éxito.";
    } else {
        echo "Error al agregar docente: " . $conexion->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
}
?>

