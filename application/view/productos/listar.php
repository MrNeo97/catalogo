<?= $this->layout('layout') ?>

<div class="container">
    <div class="p-3 mb-2 bg-danger text-white" <?= isset($errores) ?  : 'hidden' ?>><?= isset($errores) ? $errores : '' ?></div>
    <h2>Todos los productos</h2>
    <?php if ( ! isset($errores)) : ?>
        <!--<p>Tenemos <?php //count($productos) ?> productos en la base de datos</p>-->
    <?php endif ?>

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">

        <div class="col-6">

            <div class="form-group">

                <label for="busqueda"><h3>Buscar por:</h3></label>

                <select class="form-control" id="seleccion" name="parametro">

                    <option value="nombre">Nombre</option>
                    <option value="marca">Marca</option>
                    <option value="categoria">Categoria</option>

                </select>

            </div>
            <div class="form-group">

                <input type="text" class="form-control" name="buscar" placeholder="Buscar...">
                <p class="text-danger"><?php //isset($errorUser) ? $errorUser : '' ?></p>
            </div>
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
    </form>



        <table class="table" style="border 1px solid">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Marca</th>
                <th>Fecha de alta</th>
                <th>Categoría</th>
                <th>Acción</th>
            </tr>
            </thead>
            <tbody>

        <?php for ($i = 0; $i < count($productos); $i++) : ?>

            <tr>
                <td><?= $productos[$i]->nombre ?></td>
                <td><?= $productos[$i]->descripcion ?></td>
                <td><?= $productos[$i]->marca ?></td>
                <td><?= $productos[$i]->fecha_alta ?></td>
            <td><?= $categorias[$i][0]->nombre ?></td>
                <td>
                    <a href="/productos/editar/<?= $productos[$i]->id ?>"><i class="fa fa-pencil-alt" style="font-size:25px"></i></a>
                    <?php if(\Mini\Core\Session::jefeIsLoggedIn()) : ?>
                    <a href="/productos/eliminar/<?= $productos[$i]->id ?>"><i class="fa fa-trash-alt" style="font-size:25px;color:red"></i></a>
                    <?php endif ?>
                </td>
            </tr>

        <?php endfor ?>

            </tbody>
        </table>
</div>