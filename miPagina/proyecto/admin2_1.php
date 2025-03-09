<!--Incluimos nuestro cabecero genérico para todos-->
<?php
    include "header.php";
?>
<div class="altas">
    <?php
// Recibimos los datos enviados por el formulario
        $equipo=$_POST["equipo"];
        $puntos=$_POST["puntos"];

        $servidor="localhost:3333";
        $usuario="root";
        $password="";
        $basedatos="f1";

        $conexion=new mysqli($servidor, $usuario, $password, $basedatos);

// Verificar la conexión
        if ($conexion -> connect_error) {
            die("La conexión ha fallado: " . $conexion ->connect_error);
        } else {
            print "La conexion ha sido un éxito. ";
        }

// Consulta SQL para actualizar los puntos del equipo en la tabla de clasificación
        $sql="UPDATE clasificacion SET equipo = '$equipo', puntos = '$puntos' WHERE equipo = '$equipo'";

// Ejecutar la consulta y verificar si se actualizó correctamente
        if ($conexion->query($sql)==TRUE) {
            echo "Los datos se actualizarón correctamente en la base de datos";
        } else {
            echo "Ha ocurrido un Error: " . $conexion->error;
        }

    ?>
    <br><br>
<!-- Enlaces para volver a la página de administración o al inicio -->
    <a href="admin.php">Volver a admin</a><br><br>
    <a href="index.php">Volver al Inicio</a>
</div>
<!-- Incluimos nuestro pie de página genérico para todos -->
<?php
    include "footer.php";
?>