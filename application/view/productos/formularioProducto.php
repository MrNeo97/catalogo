<?php $this->layout('layout') ?>

<?php //$this->insert('partials/feedback', ['feedback' => $feedback]) ?>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
    <div class="container">
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

                </div>
                <br>

                <div class="form-group">

                    <label for="descripcion">Descripción</label>

                    <input type="text" class="form-control" name="descripcion"
                           value="<?= isset($datos['descripcion']) ? $datos['descripcion'] : '' ?>">

                </div>
                <br>

                <div class="form-group">

                    <label for="marca">Marca</label>

                    <input type="text" class="form-control" name="marca"
                        value="<?= isset($datos['marca']) ? $datos['marca'] : '' ?>">

                </div>
                <br>

                <div class="form-group">

                    <label for="categoria">Categoría</label>

                    <select class="form-control" id="seleccion" name="categoria">

                        <option value="1">Electrodomesticos</option>
                        <option value="2">Juguetes</option>
                        <option value="3">Herramientas</option>
                        <option value="4">Videojuegos</option>
                        <option value="5">Libros</option>

                    </select>

                </div>
                <br>

                <button class="btn btn-primary" type="submit">Enviar</button>


            </div>
        </div>
    </div>
</form>

