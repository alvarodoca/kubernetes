<?php
    include "header.php";
?>
<div class="altas">
<h1>!HAZTE SOCIO Y OBTEN VENTAJAS EXCLUSIVAS¡</h1>
    <form action="alta2.php" method="post">
      
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required><br><br>

        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni" required><br><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required><br><br>

        <label for="nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="nacimiento" name="nacimiento" required><br><br>

        <label for="contraseña">Establezca una contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" required><br><br>

        <label for="clase">Elija el nivel de Socio que desea:</label>
        <select name="clase" id="clase">
            <option value="vip">VIP: 1500€</option>
            <option value="premiun">PREMIUN: 1000€</option>
            <option value="deluxe">DELUXE: 800€</option>
            <option value="gold">GOLD: 600€</option>
            <option value="general">GENERAL: 200€</option>
            <option value="libre">LIBRE: ¡GRATIS!</option>
        </select>
        <br><br>

        <input type="submit" value="Enviar"><br><br>
        <input type="reset" value="Borrar">



    </form>
</div>
<?php
    include "footer.php";
?>