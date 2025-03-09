<!-- Incluimos el archivo de cabecera común a todas las páginas -->
<?php
    include "header.php";
?>

<?php
    // Datos de conexión a la base de datos
    $servidor = "localhost:3333";
    $usuario = "root";
    $password = "";
    $basedatos = "f1";

    // Creamos la conexión con la base de datos
    $conexion = new mysqli($servidor, $usuario, $password, $basedatos);
    
    // Obtenemos la escudería a editar a través del parámetro GET
    $id = $_GET["id"];
    
    // Consulta SQL para obtener los datos de la escudería seleccionada
    $consultar = "SELECT * FROM escuderias WHERE id = '$id'";
    $registros = $conexion->query($consultar);
    
    // Obtenemos el resultado como un array
    $registro = mysqli_fetch_row($registros);
?>

<div class="altas">
    <br><br>
    <!-- Formulario para editar la escudería -->
    <form action="admin3_1.php" method="post" enctype="multipart/form-data">
        <!-- Campo oculto para enviar el ID -->
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <!-- Campo para mostrar el nombre actual de la escudería (solo lectura) -->
        <label for="escuderia">ESCUDERIA:</label>
        <input type="text" id="escuderia" name="escuderia" value="<?php echo $registro[1]; ?>" readonly><br><br>

        <!-- Campo para editar el modelo de coche de la escudería -->
        <label for="coche">COCHE:</label>
        <input type="text" id="coche" name="coche" value="<?php echo $registro[2]; ?>" required><br><br>

        <!-- Campo para subir una imagen -->
        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen"><br><br>

        <!-- Mostrar la imagen actual si existe -->
        <?php if (!empty($registro[3])): ?>
            <p>Imagen actual:</p>
            <img src="imagenes/<?php echo $registro[3]; ?>" alt="Imagen de la escudería" style="max-width: 200px;"><br><br>
        <?php endif; ?>

        <!-- Campo para editar el color de la escudería -->
        <label for="color">COLOR:</label>
        <input type="text" id="color" name="color" value="<?php echo $registro[4]; ?>" required><br><br>

        <!-- Campo para editar el primer piloto de la escudería -->
        <label for="piloto1">PILOTO1:</label>
        <input type="text" id="piloto1" name="piloto1" value="<?php echo $registro[5]; ?>" required><br><br>

        <!-- Campo para editar el segundo piloto de la escudería -->
        <label for="piloto2">PILOTO2:</label>
        <input type="text" id="piloto2" name="piloto2" value="<?php echo $registro[6]; ?>" required><br><br>

        <!-- Campo para editar el director de la escudería -->
        <label for="director">DIRECTOR:</label>
        <input type="text" id="director" name="director" value="<?php echo $registro[7]; ?>" required><br><br>

        <!-- Botón para enviar el formulario -->
        <input type="submit" value="Enviar"><br><br>
        
        <!-- Botón para resetear el formulario -->
        <input type="reset" value="Borrar">
    </form>

    <br><br>
    <!-- Enlaces para regresar a las páginas principales -->
    <a href="admin.php">Volver a admin</a><br><br>
    <a href="index.php">Volver al Inicio</a>
</div>

<!-- Incluimos el archivo de pie de página común -->
<?php
    include "footer.php";
?>
