<?php
    include "header.php";
?>
<div class="alta2">
    <?php
        $servidor="localhost:3333";
        $usuario="root";
        $password="";
        $basedatos="f1";

        $conexion=new mysqli($servidor, $usuario, $password, $basedatos);    
        
        $nombre=$_POST["nombre"];
        $apellidos=$_POST["apellidos"];
        $dni=$_POST["dni"];
        $telefono=$_POST["telefono"];
        $nacimiento=$_POST["nacimiento"];
        $contraseña=$_POST["contraseña"];
        $clase=$_POST["clase"];


        $sql="INSERT INTO socios(dni, nombre, apellidos, telefono, fecha_nac, contraseña, clase) VALUES ('$dni', '$nombre', '$apellidos', '$telefono', '$nacimiento', '$contraseña', '$clase')";

        if ($conexion->query($sql)==TRUE) {
            echo "Enhorabuena te has registrado como socio $clase, disfruta de tus ventajas en el mundo de la F1";
        } else {
            echo "Ha ocurrido un Error: " . $conexion->error;
        }

    ?>
    <br><br>
    <a href="index.php">Volver al Inicio</a>
</div>

<?php
    include "footer.php";
?>