<?= $this->layout('layout') ?>

<div class="container-fluid">

    <div class="container">

        <h2><?= $producto->nombre ?></h2>

        <p><?= $producto->descripcion ?></p>

        <hr>

        <p>Marca: <?= $producto->marca ?></p>
        <p>Fecha de creación: <?= $producto->fecha_alta ?></p>
        <p>Categoría: <?= $producto->categoria_id ?></p>
        <p>Creado por: <?= $producto->usuario_id ?></p>
    </div>

</div>

