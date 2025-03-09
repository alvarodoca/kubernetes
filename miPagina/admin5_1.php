<?php
    include "header.php";
?>
<div class="altas">
    <?php
        $servidor="localhost";
        $usuario="root";
        $password="";
        $basedatos="f1";

        $conexion=new mysqli($servidor, $usuario, $password, $basedatos);    

        // Recibimos los datos del formulario
        $escuderia = $_POST["escuderia"];
        $coche = $_POST["coche"];
        $color = $_POST["color"];
        $piloto1 = $_POST["piloto1"];
        $piloto2 = $_POST["piloto2"];
        $director = $_POST["director"];

        // Gestión de la imagen
        $imagen = $_FILES['imagen']['name'];
        if (!empty($imagen)) {
            $imagen_tmp = $_FILES['imagen']['tmp_name'];
            $ruta_destino = "imagenes/" . basename($imagen);
            move_uploaded_file($imagen_tmp, $ruta_destino); // Subimos la imagen al directorio 'imagenes'
        }

        // Insertamos los datos en la base de datos
        $sql1 = "INSERT INTO escuderias(escuderia, coche, color, piloto1, piloto2, director, imagen) 
                 VALUES ('$escuderia', '$coche', '$color', '$piloto1', '$piloto2', '$director', '$imagen')";
        $sql2 = "INSERT INTO clasificacion(equipo, puntos) VALUES ('$escuderia', 0)";

        if ($conexion->query($sql1) === TRUE) {
            echo "Enhorabuena has registrado un nuevo equipo dentro de la F1, Mucha Suerte $escuderia!!!<br>";
        } else {
            echo "Ha ocurrido un Error: " . $conexion->error;
        }

        if ($conexion->query($sql2) === TRUE) {
            echo "TODO EN ORDEN";
        } else {
            echo "Ha ocurrido un Error: " . $conexion->error;
        }

    ?>
    <br><br>
    <a href="admin.php">Volver a admin</a><br><br>
    <a href="index.php">Volver al Inicio</a>
</div>

<?php
    include "footer.php";
?>
