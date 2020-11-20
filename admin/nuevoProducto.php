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
            <label for="categoría:">Categorías:</label>
            <select name="categoria" id="categoria">
            <?php
            try {
                $sql = "SELECT * FROM categorias";
                $stmt = $conexion -> prepare($sql);
                $stmt -> execute();

                while ($categoria = $stmt -> fetch()) {
                ?>
                <option value="<?php echo $categoria['categoria_id'] ?>"><?php echo $categoria['nombre'] ?></option>
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
            <label for="sub_categoria:">Sub-categorías:</label>
            <select name="subcategoria" id="subcategoria">
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
            <input type="submit" name="accion" value="Agregar" class="btnAgregar">
        </div>
    </form> 
</div>  