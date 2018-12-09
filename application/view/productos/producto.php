<?= $this->layout('layout') ?>

<div class="container-fluid">

    <div class="container">

        <h2><?= $producto->nombre ?></h2>

        <p><?= $producto->descripcion ?></p>

        <hr>

        <p>Marca: <?= $producto->marca ?></p>
        <p>Fecha de creación: <?= $producto->fecha_alta ?></p>
        <p>Categoría: <?= $categoria[0]->nombre ?></p>
        <p>Creado por: <?= ucwords($usuario[0]->nombre) ?></p>
    </div>

</div>

