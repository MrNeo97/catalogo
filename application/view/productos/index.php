<?= $this->layout('layout') ?>

<div class="container-fluid">
    <br><h2>Productos</h2>

    <?php foreach ($productos as $producto) : ?>

        <div class="container">
            <h3><?= $producto->nombre ?></h3>
            <p><?= $producto->descripcion ?></p>
            <p><a href="/productos/producto/<?= $producto->id ?>">[Leer más]</a></p>
        </div>

    <?php endforeach ?>
</div>
