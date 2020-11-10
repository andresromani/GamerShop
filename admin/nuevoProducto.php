<div class="form-contenedor">
    <h1>Nuevo producto</h1>

    <form action="validar.php" method="POST" enctype="multipart/form-data" class="form">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre">
        </div>

        <div>
            <label for="precio">Precio:</label>
            <input type="text" name="precio" id="precio">
        </div>

        <div>
            <label for="descripcion">Descripción:</label>
            <input type="text" name="descripcion" id="descripcion">
        </div>

        <div>
            <label for="marca">Marca:</label>
            <input type="text" name="marca" id="marca">
        </div>

        <div>
            <label for="subcategoría:">Sub-categoría:</label>
            <select type="text" name="subcategoria" id="subcategoria">
            <?php
            try {
                $sql = "SELECT * FROM subcategorias";
                $stmt = $conexion -> prepare($sql);
                $stmt -> execute();

                while ($subcategoria = $stmt -> fetch()) {
                ?>
                <option value="<?php echo $subcategoria['subcategoria_id'] ?>"><?php echo $subcategoria['nombre'] ?></option>
                <?php
                }
            }
            catch (PDOException $e) {
                "Error: " . $e -> getMessage();
            }
            ?>
            </select>
        </div>

        <div>
            <label for="stock">Stock:</label>
            <input type="text" name="stock" id="stock">
        </div>

        <div>
            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" id="imagen">
        </div>

        <div>
            <input type="submit" name="btnAgregar" value="agregar" class="btnAgregar">
        </div>
    </form> 
</div>  