<?= $this->layout('layout') ?>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
    <div class="container">
        <div class="row">
            <div class="col-6">

                <div class="form-group">

                    <h1>Formularios usables</h1>

                    <label for="nombre">Nombre</label>

                    <input type="text" class="form-control" name="nombre"
                        <?php //$error = new Errores(); $error->mostrarCampo('nombre'); ?>>

                    <?php //$error->mostrarErrorCampo('nombre', $errores) ?>
                </div>

                    <div class="form-group">

                    <label for="apellidos">Apellidos</label>

                    <input type="text" class="form-control" name="apellidos"
                    <?php //mostrar_campo('apellidos'); ?>>

                    <?php //mostrar_error_campo('apellidos', $errores) ?>
			    </div>

                <div class="form-group">

                    <label for="email">Email</label>

                    <input type="text" class="form-control" name="email"
                        <?php //$error->mostrarCampo('email'); ?>>

                    <?php //$error->mostrarErrorCampo('email', $errores) ?>
                </div>

                <div class="form-group">

                    <label for="nickname">Nickname</label>

                    <input type="text" class="form-control" name="nickname"
                    <?php //mostrar_campo('nickname'); ?>>

                    <?php //mostrar_error_campo('nickname', $errores) ?>
			    </div>

                <div class="form-group">

                    <label for="rol">Rol</label>

                    <select class="form-control" id="seleccion" name="cargo">

                        <option value="empleado">Empleado</option>
                        <option value="jefe">Jefe</option>

                    </select>

                </div>

                <div class="form-group">

                    <label for="clave1">Clave</label>

                    <input type="password" class="form-control" name="clave1">
                    <?php //$error->mostrarErrorCampo('clave', $errores) ?>
                </div>

                <div class="form-group">

                    <label for="clave2">Repetir Clave</label>
                    <input type="password" class="form-control" name="clave2">

                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Aceptar términos y condiciones</label>
                </div>
                <br>

                <button class="btn btn-primary" type="submit">Enviar</button>


            </div>
        </div>
    </div>
</form>