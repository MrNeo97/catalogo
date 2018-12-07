<?php $this->layout('layout') ?>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
    <div class="container">

        <p class="text-danger"><?= isset($datos) ? var_dump($datos) : '' ?></p>
        <div class="row">
            <div class="col-6">

                <?php if (isset($accion) && $accion == 'editar') : ?>
                    <input type="hidden" name="id" value="<?= $datos['id']?>">
                <?php endif ?>

                <div class="form-group">

                    <h1>Crear producto</h1>

                    <label for="nombre">Nombre</label>

                    <input type="text" class="form-control" name="nombre"
                           value="<?= isset($datos['nombre']) ? $datos['nombre'] : '' ?>">

                    <p class="text-danger"><?= isset($errores['nombre']) ? $errores['nombre'] : '' ?></p>

                </div>
                <br>

                <div class="form-group">

                    <label for="descripcion">Descripción</label>

                    <input type="text" class="form-control" name="descripcion"
                           value="<?= isset($datos['descripcion']) ? $datos['descripcion'] : '' ?>">

                    <p class="text-danger"><?= isset($errores['descripcion']) ? $errores['descripcion'] : '' ?></p>

                </div>
                <br>

                <div class="form-group">

                    <label for="marca">Marca</label>

                    <input type="text" class="form-control" name="marca"
                        value="<?= isset($datos['marca']) ? $datos['marca'] : '' ?>">

                    <p class="text-danger"><?= isset($errores['marca']) ? $errores['marca'] : '' ?></p>

                </div>
                <br>

                <div class="form-group">

                    <label for="categoria">Categoría</label>

                    <select class="form-control" id="seleccion" name="categoria_id">

                        <option value="1" <?php if(isset($datos['categoria_id']) && $datos['categoria_id'] == 1) {  echo 'selected'; } ?>>Electrodomesticos</option>
                        <option value="2" <?php if(isset($datos['categoria_id']) && $datos['categoria_id'] == 2) {  echo 'selected'; } ?>>Juguetes</option>
                        <option value="3" <?php if(isset($datos['categoria_id']) && $datos['categoria_id'] == 3) {  echo 'selected'; } ?>>Herramientas</option>
                        <option value="4" <?php if(isset($datos['categoria_id']) && $datos['categoria_id'] == 4) {  echo 'selected'; } ?>>Videojuegos</option>
                        <option value="5" <?php if(isset($datos['categoria_id']) && $datos['categoria_id'] == 5) {  echo 'selected'; } ?>>Libros</option>

                    </select>

                    <p class="text-danger"><?= isset($errores['categoria_id']) ? $errores['categoria_id'] : '' ?></p>

                </div>
                <br>

                <button class="btn btn-primary" type="submit">Enviar</button>


            </div>
        </div>
    </div>
</form>

