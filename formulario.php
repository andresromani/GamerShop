<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="form-cont">
        <a href="./?page=inicio"><i class="fas fa-angle-left"></i> VOLVER</a>

        <h2>Formulario de contacto</h2>

        <form action="./?page=validar" method="POST">
            <input type="text" placeholder="Nombre" class="nombre">
            <br>
            <br>
            <input type="text" placeholder="Apellido" style="width: 230px;">
            <br>
            <br>
            <input type="mail" placeholder="Mail" style="width: 300px;">
            <br>
            <br>
            <textarea name="textarea" rows="10" cols="50" placeholder="Comentarios"></textarea>
            <br>
            <br>
            <input class="boton" type="submit" name="accion" value="Enviar">
        </form>
    </div>
</body>
</html>