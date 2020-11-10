<?php
include "conexion.php";
include "../functions.php";

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];
$marca = $_POST['marca'];
$categoria_id;
$subcategoria_id = $_POST['subcategoria'];
$stock = $_POST['stock'];
$imagen = $_FILES['imagen'];

try {
    $sql = "SELECT categoria_id FROM subcategorias WHERE subcategoria_id = ?";
    $stmt = $conexion -> prepare($sql);
    $stmt -> bindParam(1, $subcategoria_id, PDO::PARAM_INT);
    $stmt -> execute();

    while ($categoria = $stmt -> fetch()) {
        $categoria_id = $categoria['categoria_id'];
    }
}
catch (PDOException $e) {
    "Error: " . $e -> getMessage();
}

if (false) {

}
else {
    if (isset($_POST['btnAgregar'])) {
        $rta = agregarProducto($nombre, $precio, $descripcion, $marca, $categoria_id, $subcategoria_id, $stock, $imagen);
        header("location: ./?page=panel&rta=$rta");
    }
    else if (isset($_POST['btnEditar'])) {
        $producto_id = $_POST['producto_id'];
        $imagenActual = $_POST['imagenActual'];
        $rta = editarProducto($producto_id, $nombre, $precio, $descripcion, $marca, $categoria_id, $subcategoria_id, $stock, $imagen, $imagenActual);
        header("location: ./?page=panel&rta=$rta");
    }
}
?>