<!-- navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Catalogo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <?php $url= $_SERVER["REQUEST_URI"] ?>

            <li class="nav-item <?php if($url == '/login/registro') : echo 'active'?><?php endif ?>">
                <a class="nav-link" href="<?php echo URL; ?>login/registro">Registro Usuarios<span class="sr-only"></span></a>
            </li>
            <li class="nav-item <?php if($url == '/productos/crear') : echo 'active'?><?php endif ?>">
                <a class="nav-link" href="<?php echo URL; ?>productos/crear">Crear Producto</a>
            </li>
            <li class="nav-item <?php if($url == '/productos/listar') : echo 'active'?><?php endif ?>">
                <a class="nav-link" href="<?php echo URL; ?>productos/listar">Ver Productos</a>
            </li>
        </ul>
    </div>
</nav>