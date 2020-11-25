<?php
include "admin/conexion.php";

function cargarPagina($vista) {
    if (file_exists($vista)) {
        $vista = $vista;
    }
    else {
        $vista = "404.php";
    }

    return $vista;
}

function mostrarMensaje($rta) {
    switch ($rta) {
        case "0x001":
            $mensaje = "<b style='color: green;'>producto insertado con éxito</b>";
        break;
        case "0x002":
            $mensaje = "<b style='color: red;'>Error: no se pudo insertar el producto</b>";
        break;
        case "0x003":
            $mensaje = "<b style='color: green;'>producto editado con éxito</b>";
        break;
        case "0x004":
            $mensaje = "<b style='color: red;'>Error: no se pudo editar el producto</b>";
        break;
        case "0x005":
            $mensaje = "<b style='color: green;'>producto eliminado con éxito</b>";
        break;
        case "0x006":
            $mensaje = "<b style='color: red;'>Error: no se pudo eliminar el producto</b>";
        break;
        case "0x009":
            $mensaje = "<b style='color: red;'>Error: email no registrado</b>";
        break;
        default:
            $mensaje = "<b style='color: red;'>Error: código no reconocido</b>";
        break;
    }

    return $mensaje;
}

function agregarProducto($nombre, $precio, $descripcion, $marca, $categoria_id, $subcategoria_id, $stock, $imagen) {
    global $conexion;

    //GUARDAR IMAGEN EN LA CARPETA
    $tmp_name = $imagen['tmp_name'];
    $uploads_dir = "../img/productos/";
    $name = $imagen['name'];
    move_uploaded_file($tmp_name, "$uploads_dir/$name");

    $estado = 1;

    try {
        $sql = "INSERT INTO productos (nombre, precio, descripcion, marca, categoria_id, subcategoria_id, stock, imagen, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion -> prepare($sql);
        $stmt -> bindParam(1, $nombre, PDO::PARAM_STR);
        $stmt -> bindParam(2, $precio, PDO::PARAM_STR);
        $stmt -> bindParam(3, $descripcion, PDO::PARAM_STR);
        $stmt -> bindParam(4, $marca, PDO::PARAM_STR);
        $stmt -> bindParam(5, $categoria_id, PDO::PARAM_INT);
        $stmt -> bindParam(6, $subcategoria_id, PDO::PARAM_INT);
        $stmt -> bindParam(7, $stock, PDO::PARAM_INT);
        $stmt -> bindParam(8, $name, PDO::PARAM_STR);
        $stmt -> bindParam(9, $estado, PDO::PARAM_INT);

        if ($stmt -> execute()) {
            return $rta = "0x001";
        }
        else {
            return $rta = "0x002";
        }
    }
    catch (PDOException $e) {
        echo "Error: " . $e -> getMessage();
    }
}

function editarProducto($producto_id, $nombre, $precio, $descripcion, $marca, $categoria_id, $subcategoria_id, $stock, $imagen, $imagenActual) {
    global $conexion;

    //GUARDAR IMAGEN EN LA CARPETA
    if ($imagen['type'] == "image/jpeg" || $imagen['type'] == "image/jpg" || $imagen['type'] == "image/png") {
        $tmp_name = $imagen['tmp_name'];
        $uploads_dir = "../img/productos/";
        $name = $imagen['name'];
        $imagenActual = $uploads_dir . $imagenActual;
        unlink($imagenActual);
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
    }
    else {  
        $name = $imagenActual; 
    }

    try {
        $sql = "UPDATE productos SET nombre = ?, precio = ?, descripcion = ?, marca = ?, categoria_id = ?, subcategoria_id = ?, stock = ?, imagen = ? WHERE producto_id = ?";
        $stmt = $conexion -> prepare($sql);
        $stmt -> bindParam(1, $nombre, PDO::PARAM_STR);
        $stmt -> bindParam(2, $precio, PDO::PARAM_STR);
        $stmt -> bindParam(3, $descripcion, PDO::PARAM_STR);
        $stmt -> bindParam(4, $marca, PDO::PARAM_STR);
        $stmt -> bindParam(5, $categoria_id, PDO::PARAM_INT);
        $stmt -> bindParam(6, $subcategoria_id, PDO::PARAM_INT);
        $stmt -> bindParam(7, $stock, PDO::PARAM_INT);
        $stmt -> bindParam(8, $name, PDO::PARAM_STR);
        $stmt -> bindParam(9, $producto_id, PDO::PARAM_INT);
        
        if ($stmt -> execute()) {
            return $rta = "0x003";
        }
        else {
            return $rta = "0x004";
        }
    }
    catch (PDOException $e) {
        echo "Error: " . $e -> getMessage();
    }
}

function eliminarProducto($producto_id) {
    global $conexion;

    try {
        $sql = "DELETE FROM productos WHERE producto_id = ?";
        $stmt = $conexion -> prepare($sql);
        $stmt -> bindParam(1, $producto_id, PDO::PARAM_INT);
        
        if ($stmt -> execute()) {
            return $rta = "0x005";
        }
        else {
            return $rta = "0x006";
        }
    }
    catch (PDOException $e) {
        echo "Error: " . $e -> getMessage();
    }
}

function camiarEstadoProducto($producto_id, $estado) {
    global $conexion;

    try {
        $sql = "UPDATE productos SET estado = ? WHERE producto_id = ?";
        $stmt = $conexion -> prepare($sql);
        $stmt -> bindParam(1, $estado, PDO::PARAM_INT);
        $stmt -> bindParam(2, $producto_id, PDO::PARAM_INT);
        $stmt -> execute();
    }
    catch (PDOException $e) {
        echo "Error: " . $e -> getMessage();
    }
}

function registrarUsuario($nombre, $apellido, $mail, $clave) {
    global $conexion;

    //ENCRIPTANDO LA CLAVE
    $clave = password_hash($clave, PASSWORD_DEFAULT);
    $codigo = 'abcdefghi%jklmnopqrstuvwxyzA%BCDEFGHIJKLMN/OPQRSTUVW.XYZ012345%6789*';
    $codigo = md5(str_shuffle($codigo));

    //CORREO ELECTRONICO
    $asunto = "Activar cuenta - Bienvenido";
    $cuerpo = "<img src=https://freelogo-assets.s3.amazonaws.com/sites/all/themes/freelogoservices/images/lps/lp1/l07_ES.png>";
    $cuerpo .= "<h1 style=color:pink>Activación de cuenta</h1>";
    $cuerpo .= "<b>Click en el siguiente enlace para activar su cuenta</b><br>";
    $cuerpo .= "<a style='background-color:lightpink;color:red;padding:20px;text-decoration:none;' href='https://miweb.com/activacionUsuario.php?correo=" . $email . "&codigo=" . $codigo . "&estado=1'>Activar usuario</a><br><br>chao blabla";
    $cabecera = "From:" . $email . "\r\n";
    $cabecera .= "MIME-Version: 1.0\r\n";
    $cabecera .= "Content-Type: text/html; charset=UTF-8\r\n";
    mail($email, $asunto, $cuerpo, $cabecera);

    try {
        $sql = "INSERT INTO usuarios (nombre, apellido, email, clave, codigo, estado) VALUES (?, ?, ?, ?, ?, 1)";
        $stmt = $conexion -> prepare($sql);
        $stmt -> bindParam(1, $nombre, PDO::PARAM_STR);
        $stmt -> bindParam(2, $apellido, PDO::PARAM_STR);
        $stmt -> bindParam(3, $mail, PDO::PARAM_STR);
        $stmt -> bindParam(4, $clave, PDO::PARAM_STR);
        $stmt -> bindParam(5, $codigo, PDO::PARAM_STR);

        if ($stmt -> execute()) {
            return $rta = "0x007";
        }
        else {
            return $rta = "0x008";
        }
    }
    catch (PDOException $e) {
        echo "Error: " . $e -> getMessage();
    }
}

function ingresar($mail, $clave) {
    global $conexion;

    try {
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conexion -> prepare($sql);
        $stmt -> bindParam(1, $mail, PDO::PARAM_STR);
        $stmt -> execute();
        $usuario = $stmt -> fetch();

        if ($usuario) {
            if ($usuario['estado'] == 1) {
                $claveC = $usuario['clave'];

                if (password_verify($clave, $claveC)) {
                    $_SESSION['email'] = $usuario['email'];
                    $_SESSION['nombre'] = $usuario['nombre'];
                    
                    header('location: ./?');
                }
                else {
                    header('location: ./?page=login&rta=0x011');
                }
            }
            else {
                header('location: ./?page=login&rta=0x010');
            }
        }
        else {
            header('location: ./?page=login&rta=0x009');
        }
    }
    catch (PDOException $e) {
        echo "Error: " . $e -> getMessage();
    }
}
?>