<?php
    include "header.php";
?>
<div class="altas">
    <?php
        $id=$_GET["id"];

        $servidor="localhost";
        $usuario="root";
        $password="";
        $basedatos="f1";

        $conexion=new mysqli($servidor, $usuario, $password, $basedatos);
        if ($conexion -> connect_error) {
            die("La conexión ha fallado: " . $conexion ->connect_error);
        } else {
            print "La conexion ha sido un éxito. ";
        }
// Para borrar
        $sql1="DELETE FROM clasificacion WHERE id_escuderia = '$id'";
        $sql2="DELETE FROM escuderias WHERE id = '$id'";

        if ($conexion->query($sql2)==TRUE) {
            echo "Los datos se actualizarón correctamente en la base de datos";
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
