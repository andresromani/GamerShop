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
            <label for="subcategoría:">Sub-categoría:</label>
            <select type="text" name="subcategoria" id="subcategoria">
            <?php
                $subcategoria_id = $producto['subcategoria_id'];
                $sql2 = "SELECT * FROM subcategorias WHERE subcategoria_id = ?";
                $stmt2 = $conexion -> prepare($sql2);
                $stmt2 -> bindParam(1, $subcategoria_id, PDO::PARAM_STR);
                $stmt2 -> execute();

                while ($subcategoria = $stmt2 -> fetch()) {
                ?>
                <option value="<?php echo $subcategoria['subcategoria_id'] ?>" selected><?php echo $subcategoria['nombre'] ?></option>
                <?php
                }

                $sql3 = "SELECT * FROM subcategorias";
                $stmt3 = $conexion -> prepare($sql3);
                $stmt3 -> execute();

                while ($subcategoria = $stmt3 -> fetch()) {
                ?>
                <option value="<?php echo $subcategoria['subcategoria_id'] ?>"><?php echo $subcategoria['nombre'] ?></option>
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
            <input type="submit" name="btnEditar" value="editar" class="btnAgregar">
        </div>
    </form> 
</div>  