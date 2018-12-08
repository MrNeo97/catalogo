<!-- navigation -->
<div class="navigation">
    <a href="<?php echo URL; ?>">Inicio</a>
    <?php if(\Mini\Core\Session::jefeIsLoggedIn()) : ?>
        <a href="<?php echo URL; ?>login/registro">Registro de Usuarios</a>
    <?php endif ?>
    <a href="<?php echo URL; ?>productos/crear">Crear Producto</a>
    <a href="<?php echo URL; ?>productos/listar">Ver Productos</a>
</div>