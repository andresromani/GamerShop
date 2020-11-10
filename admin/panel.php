<div class="cont-panel">

<?php
    if (isset($_GET['rta'])) {
        $rta = $_GET['rta'];
        echo mostrarMensaje($rta);
    }

    if (isset($_GET['producto_id']) && isset($_GET['accion'])) {
        if ($_GET['accion'] == "eliminar") {
            $producto_id = $_GET['producto_id'];
            $rta = eliminarProducto($producto_id);
            echo mostrarMensaje($rta);
        }
    }

    if (isset($_GET['producto_id']) && isset($_GET['estado'])) {
        $producto_id = $_GET['producto_id'];
        $estado = $_GET['estado'];
        camiarEstadoProducto($producto_id, $estado);
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
            <td style="width: 120px;">
                <a href="./?page=editarProducto&producto_id=<?php echo $producto['producto_id'] ?>"><img src="../img/iconos/edit-icon.png" alt="" style="width: 30px; height: 30px;"></a>
                <a href="./?page=panel&producto_id=<?php echo $producto['producto_id'] ?>&accion=eliminar" onclick="confirm('Seguro que desea eliminar el producto?')"><img src="../img/iconos/delete-icon.png" alt="" style="width: 30px; height: 30px;"></a>
                <?php
                if ($producto['estado'] == 1) {
                ?>
                <a href="./?page=panel&producto_id=<?php echo $producto['producto_id'] ?>&estado=0"><img src="../img/iconos/on-icon.jpg" alt="" style="width: 30px; height: 30px"></a>
                <?php
                }
                else {
                ?>
                <a href="./?page=panel&producto_id=<?php echo $producto['producto_id'] ?>&estado=1"><img src="../img/iconos/off-icon.jpg" alt="" style="width: 30px; height: 30px"></a>
                <?php
                }
                ?>
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