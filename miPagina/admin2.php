<!--Incluimos nuestro cabecero genérico para todos-->
<?php
    include "header.php";
?>

<?php
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $basedatos = "f1";

    $conexion = new mysqli($servidor, $usuario, $password, $basedatos);
    
// Obtener el nombre del equipo desde la URL
    $id=$_GET["id"];

// Consulta SQL para obtener la información del equipo específico
    $consultar = "SELECT * FROM clasificacion WHERE id_escuderia = '$id'";
    $registros = $conexion->query($consultar);

// Obtener el registro correspondiente a la consulta
    $registro = mysqli_fetch_row($registros);

?>


<div class="altas">
    <br><br>

<!-- Formulario para editar los puntos del equipo -->
    <form action="admin2_1.php" method="post">
        <label for="equipo">EQUIPO:</label>
        <input type="text" id="equipo" name="equipo" value="<?php echo $registro[1]; ?>" required readonly><br><br>

        <label for="puntos">PUNTOS:</label>
        <input type="number" id="puntos" name="puntos" value="<?php echo $registro[2]; ?>" required min="0"><br><br>

        <input type="submit" value="Enviar"><br><br>
        <input type="reset" value="Borrar">
    </form>

    <br><br>
    <a href="admin.php">Volver a admin</a><br><br>
    <a href="index.php">Volver al Inicio</a>
</div>

<!-- Incluimos nuestro pie de página genérico para todos -->
<?php
    include "footer.php";
?>
