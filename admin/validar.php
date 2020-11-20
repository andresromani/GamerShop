<?php
include "conexion.php";
include "../functions.php";


if (isset($_POST['accion']) && $_POST['accion'] == "Agregar") {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $marca = $_POST['marca'];
    $categoria_id = $_POST['categoria'];
    $subcategoria_id = $_POST['subcategoria'];
    $stock = $_POST['stock'];
    $imagen = $_FILES['imagen'];

    if (false) {

    }
    else {
        $rta = agregarProducto($nombre, $precio, $descripcion, $marca, $categoria_id, $subcategoria_id, $stock, $imagen);
        header("location: ./?page=panel&rta=$rta");
    }
}
else if (isset($_POST['accion']) && $_POST['accion'] == "Editar") {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $marca = $_POST['marca'];
    $categoria_id = $_POST['categoria'];
    $subcategoria_id = $_POST['subcategoria'];
    $stock = $_POST['stock'];
    $imagen = $_FILES['imagen'];

    if (false) {

    }
    else {
        $producto_id = $_POST['producto_id'];
        $imagenActual = $_POST['imagenActual'];
        $rta = editarProducto($producto_id, $nombre, $precio, $descripcion, $marca, $categoria_id, $subcategoria_id, $stock, $imagen, $imagenActual);
        header("location: ./?page=panel&rta=$rta");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoria_id = $_POST['categoria_id'];
    $subcategorias = array();

    try {
        $sql = "SELECT * FROM subcategorias WHERE categoria_id = ?";
        $stmt = $conexion -> prepare($sql);
        $stmt -> bindParam(1, $categoria_id, PDO::PARAM_INT);
        $stmt -> execute();

        $i = 0;
        while ($subcategoria = $stmt -> fetch()) {
            $subcategorias[$i][0] = $subcategoria['subcategoria_id'];
            $subcategorias[$i][1] = $subcategoria['nombre'];
            $subcategorias[$i][2] = $subcategoria['categoria_id'];
            $i++;
        }
    }
    catch (PDOException $e) {
        echo "Error: " . $e -> getMessage();
    }

    echo json_encode($subcategorias);
}
?>