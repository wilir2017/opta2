<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>CREAR</title>
    </head>
    <body>
        <center>
            <h1>CREAR ESTUDIANTE</h1>
            <form action="../controller/Controller.php">
                <input type="hidden" value="guardar" name="opcion">
                Cedula: <input type="text" name="cedula" required="true"><br>
                Apellidos: <input type="text" name="apellidos" required="true"><br>
                Nombres: <input type="text" name="nombres" required="true"><br>
                Direccion: <input type="text" name="direccion" required="true"><br>
                Telefono: <input type="text" name="telefono" required="true"><br>
                <input type="submit" value="CREAR">
            </form>
        </center>
    </body>
</html>
