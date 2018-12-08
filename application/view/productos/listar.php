<?= $this->layout('layout') ?>

<div class="container">
    <div class="p-3 mb-2 bg-danger text-white" <?= isset($errores) ?  : 'hidden' ?>><?= isset($errores) ? $errores : '' ?></div>
    <h2>Todos los productos</h2>
    <?php if (count($productos) == 0) : ?>
        <p>No tenemos productos en la Base de Datos</p>
    <?php else : ?>
        <p>Tenemos <?= count($productos) ?> productos en la base de datos</p>

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

        <?php foreach ($productos as $producto) : ?>

            <tr>
            <td><?= $producto->nombre ?></td>
            <td><?= $producto->descripcion ?></td>
            <td><?= $producto->marca ?></td>
            <td><?= $producto->fecha_alta ?></td>
            <td><?= $producto->categoria_id ?></td>
                <td>
                    <a href="/productos/editar/<?= $producto->id ?>"><i class="fa fa-pencil-alt" style="font-size:25px"></i></a>
                    <?php if(\Mini\Core\Session::jefeIsLoggedIn()) : ?>
                    <a href="/productos/eliminar/<?= $producto->id ?>"><i class="fa fa-trash-alt" style="font-size:25px;color:red"></i></a>
                    <?php endif ?>
                </td>
            </tr>

        <?php endforeach ?>

            </tbody>
        </table>
    <?php endif ?>
</div>