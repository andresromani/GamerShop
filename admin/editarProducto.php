<div class="form-contenedor">
    <h1>Editar producto</h1>

    <form action="validar.php" method="POST" enctype="multipart/form-data" class="form">
        <?php
        try {
            $producto_id = $_GET['producto_id'];
            $sql = "SELECT * FROM productos WHERE producto_id = ?";
            $stmt = $conexion -> prepare($sql);
            $stmt -> bindParam(1, $producto_id, PDO::PARAM_INT);
            $stmt -> execute();

            while ($producto = $stmt -> fetch()) {
        ?>
    
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $producto['nombre'] ?>">
        </div>

        <div>
            <label for="precio">Precio:</label>
            <input type="text" name="precio" id="precio" value="<?php echo $producto['precio'] ?>">
        </div>

        <div>
            <label for="descripcion">Descripción:</label>
            <input type="text" name="descripcion" id="descripcion" value="<?php echo $producto['descripcion'] ?>">
        </div>

        <div>
            <label for="marca">Marca:</label>
            <input type="text" name="marca" id="marca" value="<?php echo $producto['marca'] ?>">
        </div>

        <div>
            <label for="categoría:">Categoría:</label>
            <select type="text" name="categoria" id="categoria">
            <?php
                $categoria_id = $producto['categoria_id'];
                $sql2 = "SELECT * FROM categorias WHERE categoria_id = ?";
                $stmt2 = $conexion -> prepare($sql2);
                $stmt2 -> bindParam(1, $categoria_id, PDO::PARAM_STR);
                $stmt2 -> execute();

                while ($categoria = $stmt2 -> fetch()) {
                ?>
                <option value="<?php echo $categoria['categoria_id'] ?>" selected><?php echo $categoria['nombre'] ?></option>
                <?php
                }

                $sql3 = "SELECT * FROM categorias";
                $stmt3 = $conexion -> prepare($sql3);
                $stmt3 -> execute();

                while ($categoria = $stmt3 -> fetch()) {
                ?>
                <option value="<?php echo $categoria['categoria_id'] ?>"><?php echo $categoria['nombre'] ?></option>
                <?php
                }
            ?>
            </select>
        </div>

        <div>
            <label for="sub_categorias">Sub-categorias</label>
            <select name="subcategoria" id="subcategoria">
            <?php
                $subcategoria_id = $producto['subcategoria_id'];
                $sql2 = "SELECT * FROM subcategorias WHERE subcategoria_id = ?";
                $stmt2 = $conexion -> prepare($sql2);
                $stmt2 -> bindParam(1, $subcategoria_id, PDO::PARAM_STR);
                $stmt2 -> execute();

                while ($sub_categoria = $stmt2 -> fetch()) {
                ?>
                <option value="<?php echo $sub_categoria['categoria_id'] ?>" selected><?php echo $sub_categoria['nombre'] ?></option>
                <?php
                }
            ?>
            </select>
        </div>

        <div>
            <label for="stock">Stock:</label>
            <input type="text" name="stock" id="stock" value="<?php echo $producto['stock'] ?>">
        </div>

        <div>
            <label for="imagen">Imagen:</label><br>
            <img src="../img/productos/<?php echo $producto['imagen'] ?>" alt="">
            <input type="hidden" name="imagenActual" value="<?php echo $producto['imagen'] ?>">
            <input type="file" name="imagen" id="imagen" value="<?php echo $producto['imagen'] ?>">
        </div>

        <input type="hidden" name="producto_id" value="<?php echo $producto['producto_id'] ?>">
        <?php
            }
        }
        catch (PDOException $e) {
            "Error: " . $e -> getMessage();
        }
        ?>

        <div>
            <input type="submit" name="accion" value="Editar" class="btnAgregar">
        </div>
    </form> 
</div>  