<?php
    include "header.php";
?>

<div class="altas">

<?php
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $basedatos = "f1";

    $conexion = new mysqli($servidor, $usuario, $password, $basedatos);

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['dni']) && isset($_POST['contraseña'])) {
            $dni = $_POST['dni'];
            $contraseña = $_POST['contraseña'];

            
            $sql = "SELECT * FROM socios WHERE dni = '$dni'";
            $result = $conexion->query($sql);

            if ($result->num_rows > 0) {
                $usuario = $result->fetch_assoc();
                if ($usuario['contraseña'] === $contraseña) {
                    echo "Bienvenido, " . $usuario['nombre'] . ".";
                } else {
                    echo "Contraseña incorrecta.";
                }
            } else {
                echo "El DNI no está registrado.";
            }
        } else {
            echo "Por favor ingrese su DNI y contraseña.";
        }
    }
?>

<h1>¿ERES SOCIO? Inicia sesión</h1>
<form action="usuarios.php" method="post">
    <label for="dni">DNI:</label>
    <input type="text" id="dni" name="dni" required><br><br>

    <label for="contraseña">Contraseña:</label>
    <input type="password" id="contraseña" name="contraseña" required><br><br>

    <input type="submit" value="Enviar"><br><br>
    <input type="reset" value="Borrar">
</form>

</div>

<?php
    include "footer.php";
?>
