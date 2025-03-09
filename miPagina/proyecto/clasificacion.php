<?php
    include "header.php";
?>

<?php
    $servidor = "localhost:3333";
    $usuario = "root";
    $password = "";
    $basedatos = "f1";

    $conexion = new mysqli($servidor, $usuario, $password, $basedatos);

    $consultar = "SELECT * FROM clasificacion ORDER BY puntos DESC";
    $registros = $conexion->query($consultar);
?>
<div class="altas">
    <p><h1>Clasificación General De Equipos</h1></p>
    <table border="1">
        <tbody>
            <tr>
                <th>POSICION</th>
                <th>EQUIPO</th>
                <th>PUNTOS</th>
            </tr>

            <?php
                $posicion = 1;
                while ($registro = $registros->fetch_row()) {
            ?>
            <tr>
                <td><?php echo $posicion++; ?></td>
                <td><?php echo $registro[1]; ?></td>
                <td><?php echo $registro[2]; ?></td>

            </tr>
            <?php } ?>
        </tbody>
    </table>
    <br><br>
    <a href="index.php">Volver al Inicio</a>
</div>

<?php
    include "footer.php";
?>