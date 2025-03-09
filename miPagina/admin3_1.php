<!--Incluimos nuestro cabecero genérico para todos-->
<?php
    include "header.php";
?>
<div class="altas">
    
    <?php
    // Recibimos los datos enviados por el formulario
    $escuderia = $_POST["escuderia"];
    $coche = $_POST["coche"];
    $color = $_POST["color"];
    $piloto1 = $_POST["piloto1"];
    $piloto2 = $_POST["piloto2"];
    $director = $_POST["director"];

    // Conexión a la base de datos
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $basedatos = "f1";

    $conexion = new mysqli($servidor, $usuario, $password, $basedatos);
    if ($conexion->connect_error) {
        die("La conexión ha fallado: " . $conexion->connect_error);
    }

    // Procesar la imagen subida
    $imagen = $_FILES['imagen']['name']; // Nombre del archivo
    $ruta_destino = ""; // Ruta de destino inicializada

    if (!empty($imagen)) {
        $imagen_tmp = $_FILES['imagen']['tmp_name']; // Archivo temporal
        $ruta_destino = "imagenes/" . basename($imagen); // Ruta completa
        move_uploaded_file($imagen_tmp, $ruta_destino); // Mover la imagen a la carpeta
    }

    // Construimos la consulta SQL
    if (!empty($imagen)) {
        $sql1 = "UPDATE escuderias 
                 SET escuderia = '$escuderia', coche = '$coche', color = '$color', 
                     piloto1 = '$piloto1', piloto2 = '$piloto2', director = '$director', 
                     imagen = '$imagen' 
                 WHERE escuderia = '$escuderia'";
    } else {
        $sql1 = "UPDATE escuderias 
                 SET escuderia = '$escuderia', coche = '$coche', color = '$color', 
                     piloto1 = '$piloto1', piloto2 = '$piloto2', director = '$director' 
                 WHERE escuderia = '$escuderia'";
    }

    // Ejecutamos la consulta y mostramos el resultado
    if ($conexion->query($sql1) === TRUE) {
        echo "Los datos se actualizaron correctamente en la base de datos.";
    } else {
        echo "Ha ocurrido un error: " . $conexion->error;
    }

    $conexion->close();
    ?>
    <br><br>
    <a href="admin.php">Volver a admin</a><br><br>
    <a href="index.php">Volver al Inicio</a>
</div>
<!-- Incluimos nuestro pie de página genérico -->
<?php
    include "footer.php";
?>
