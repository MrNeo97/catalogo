<?= $this->layout('layout') ?>


<div class="container">
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
            </tr>

        <?php endforeach ?>

            </tbody>
        </table>
    <?php endif ?>
</div>