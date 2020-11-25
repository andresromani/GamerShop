<!DOCTYPE html>
<html lang="en">
    <div class="form-cont">
        <a href="./?page=inicio"><i class="fas fa-angle-left"></i> VOLVER</a>

        <h2>Crear cuenta nueva</h2>

        <form action="./?page=validar" method="POST">
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="nombre" style="width: 150px;">
            <br>
            <br>
            <input type="text"name="apellido" id="apellido"  placeholder="Apellido" style="width: 230px;">
            <br>
            <br>

            <input type="mail" name="mail" id="mail"  placeholder="Mail" style="width: 300px;">
            <br> <br>
            
            <input type="password" name="clave" id="clave"  placeholder="Contraseña" style="width: 200px;">
            <br>
            <br>
            <input class="boton" type="submit" name="accion" value="Registrarme"><br>
            <a href="./?page=login">Ya tengo una cuenta</a><br>

        </form>
    </div>