<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $titulo ?? 'MINI3' ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo URL; ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo URL; ?>font/css/all.min.css" rel="stylesheet">


</head>
<body>
<!--<div class="logo"></div>-->

<!-- navigation -->
<?php if(\Mini\Core\Session::userIsLoggedIn() && \Mini\Core\Session::jefeIsLoggedIn()) : $this->insert('partials/menu') ?>

    <?php elseif(\Mini\Core\Session::userIsLoggedIn()) : $this->insert('partials/menuempleado') ?>

    <?php else : $this->insert('partials/menulogin') ?>

<?php endif ?>

<?= $this->section('content') ?>

<?php if(\Mini\Core\Session::userIsLoggedIn()) : ?>

    <footer>
        <a class="btn btn-danger" href="/login/cerrarSesion" role="button">Cerrar Sesión</a>
    </footer>

<?php endif ?>

<div class="footer text-center">
    <p>Copyright© Catalogo 2018</p>
</div>

<!-- jQuery, loaded in the recommended protocol-less way -->
<!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<!-- define the project's URL (to make AJAX calls possible, even when using this in sub-folders etc) -->
<script>
    var url = "<?php echo URL; ?>";
</script>

<!-- our JavaScript -->
<script src="<?php echo URL; ?>js/application.js"></script>
</body>
</html>