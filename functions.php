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
        "Error: " . $e -> getMessage();
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
        "Error: " . $e -> getMessage();
    }
}
?>