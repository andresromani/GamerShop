<?php
if (isset($_POST['accion']) && $_POST['accion'] == 'Registrarme') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $mail = $_POST['mail'];
    $clave = $_POST['clave'];

    if (false) {

    }
    else {
        $rta = registrarUsuario($nombre, $apellido, $mail, $clave);
        header('location: ./?page=login&rta=' . $rta);
    }
}
else if (isset($_POST['accion']) && $_POST['accion'] == 'Ingresar') {
    $mail = $_POST['mail'];
    $clave = $_POST['clave'];

    if (false) {

    }
    else {
        ingresar($mail, $clave);
    }
}