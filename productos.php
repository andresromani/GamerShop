<div class="cont-productos">
    <ul class="categorias">
    <?php
    try {
        $sql = "SELECT * FROM categorias";
        $stmt = $conexion -> prepare($sql);
        $stmt -> execute();

        while ($categoria = $stmt -> fetch()) {
        ?>
        <li>
            <button class="category"><?php echo $categoria['nombre'] ?></button>
            <ul class="subcategorias show">
            <?php
            $categoria_id = $categoria['categoria_id'];
            $sql2 = "SELECT * FROM subcategorias WHERE categoria_id = ?";
            $stmt2 = $conexion -> prepare($sql2);
            $stmt2 -> bindParam(1, $categoria_id, PDO::PARAM_INT);
            $stmt2 -> execute();

            while ($subcategoria = $stmt2 -> fetch()) {
            ?>
            <li><a href="./?page=productos&subcategoria_id=<?php echo $subcategoria['subcategoria_id'] ?>"><?php echo $subcategoria['nombre'] ?></a></li>
            <?php
            }
            ?>
            </ul>
        </li>
        <?php
        }
    }
    catch (PDOException $e) {
        echo "Error: " . $e.getMessage();
    }
    ?>
    </ul>

    <div class="productos">
        <?php
        if (isset($_GET['subcategoria_id'])) {
            try {
                $subcategoria_id = $_GET['subcategoria_id'];
                $sql = "SELECT * FROM productos WHERE subcategoria_id = ?";
                $stmt = $conexion -> prepare($sql);
                $stmt -> bindParam(1, $subcategoria_id, PDO::PARAM_INT);
                $stmt -> execute();

                while ($producto = $stmt -> fetch()) {
        ?>
        <article>
            <img src="img/productos/<?php echo $producto['imagen'] ?>" alt="">
            <h3><?php echo $producto['nombre'] ?></h3>
            <?php
            if ($producto['stock'] > 0) {
            ?>
            <span class="stock">En stock</span>
            <?php
            }
            else {
            ?>
            <span class="stock">Sin stock</span>
            <?php
            }
            ?>
            <div class="botonesProducto">
                <span class="precio"><?php echo $producto['precio'] ?></span>
                <a href="#">Carrito</a>
            </div>
        </article>
        <?php
                }
            }
            catch (PDOException $e) {
                echo "Error: " . $e.getMessage();
            }
        }
        ?>
    </div>
</div>