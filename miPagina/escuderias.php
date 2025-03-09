<?php
    include "header.php";
?>

<?php
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $basedatos = "f1";

    $conexion = new mysqli($servidor, $usuario, $password, $basedatos);

    $consultar = "SELECT * FROM escuderias";
    $registros = $conexion->query($consultar);
?>
<div class="altas">
<p><h1>Escuderias De La F1</h1></p>
<table border="1">
    <tbody>
        <tr>
            <th>ESCUDERIA</th>
            <th>COCHE</th>
            <th>IMAGEN</th>
            <th>COLOR</th>
            <th>PILOTO 1</th>
            <th>PILOTO 2</th>
            <th>DIRECTOR</th>
        </tr>

        <?php
            while ($registro = $registros->fetch_row()) {
        ?>
        <tr>
            <td><?php echo $registro[1]; ?></td>
            <td><?php echo $registro[2]; ?></td>
            <td><?php echo '<img width="100px" src="imagenes/'.$registro[3].'">';?></td>
            <td><?php echo $registro[4]; ?></td>
            <td><?php echo $registro[5]; ?></td>
            <td><?php echo $registro[6]; ?></td>
            <td><?php echo $registro[7]; ?></td>
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
