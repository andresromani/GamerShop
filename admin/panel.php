<div class="cont-panel">

<?php
    if (isset($_GET['rta'])) {
        $rta = $_GET['rta'];
        echo mostrarMensaje($rta);
    }
?>

<table class="panel">
    <tr class="titulo-panel">
        <td>ID</td>
        <td>Nombre</td>
        <td>Precio</td>
        <td>Descripción</td>
        <td>Marca</td>
        <td>Categoría</td>
        <td>Sub-categoría</td>
        <td>Stock</td>
        <td>Imagen</td>
        <td>Estado</td>
        <td>Acciones</td>
    </tr>

    <?php
    try {
        $sql = "SELECT p.producto_id, p.nombre, p.precio, p.descripcion, p.marca, c.nombre AS categoria, s.nombre AS subcategoria, p.stock, p.imagen, p.estado FROM productos AS p INNER JOIN categorias AS c ON p.categoria_id = c.categoria_id INNER JOIN subcategorias AS s ON p.subcategoria_id = s.subcategoria_id";
        $pdst = $conexion -> prepare($sql);
        $pdst -> execute();

        while ($producto = $pdst -> fetch()) {
        ?>

        <tr>
            <td><?php echo $producto['producto_id'] ?></td>
            <td><?php echo $producto['nombre'] ?></td>
            <td><?php echo $producto['precio'] ?></td>
            <td><?php echo $producto['descripcion'] ?></td>
            <td><?php echo $producto['marca'] ?></td>
            <td><?php echo $producto['categoria'] ?></td>
            <td><?php echo $producto['subcategoria'] ?></td>
            <td><?php echo $producto['stock'] ?></td>
            <td><?php echo $producto['imagen'] ?></td>
            <td><?php echo $producto['estado'] ?></td>
            <td>
                <a href="./?page=editarProducto&producto_id=<?php echo $producto['producto_id'] ?>">editar</a>
                <a href="#">eliminar</a>
                <a href="#">on</a>
                <a href="#">off</a>
            </td>
        </tr>

        <?php
        }
    }
    catch (PDOException $e) {
        echo "Error: " + $e -> getMessage();
    }
    ?>
</table>
</div>