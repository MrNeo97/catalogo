<?= $this->layout('layout') ?>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
    <div class="container">
        <div class="row">
            <div class="col-6">

                <div class="form-group">

                    <h1>Formularios usables</h1>

                    <label for="nombre">Nombre</label>

                    <input type="text" class="form-control" name="nombre"
                           value="<?= isset($datos['nombre']) ? $datos['nombre'] : '' ?>">

                    <p class="text-danger"><?= isset($errores['nombre']) ? $errores['nombre'] : '' ?></p>
                </div>

                    <div class="form-group">

                    <label for="apellidos">Apellidos</label>

                    <input type="text" class="form-control" name="apellidos"
                           value="<?= isset($datos['apellidos']) ? $datos['apellidos'] : '' ?>">

                        <p class="text-danger"><?= isset($errores['apellidos']) ? $errores['apellidos'] : '' ?></p>
			    </div>

                <div class="form-group">

                    <label for="email">Email</label>

                    <input type="text" class="form-control" name="email"
                           value="<?= isset($datos['email']) ? $datos['email'] : '' ?>">

                    <p class="text-danger"><?= isset($errores['email']) ? $errores['email'] : '' ?></p>
                </div>

                <div class="form-group">

                    <label for="nickname">Nickname</label>

                    <input type="text" class="form-control" name="nickname"
                           value="<?= isset($datos['nickname']) ? $datos['nickname'] : '' ?>">

                    <p class="text-danger"><?= isset($errores['nickname']) ? $errores['nickname'] : '' ?></p>
			    </div>

                <div class="form-group">

                    <label for="rol">Rol</label>

                    <select class="form-control" id="seleccion" name="cargo">

                        <option value="empleado" <?php if(isset($datos['cargo']) && $datos['cargo'] == 'empleado') {  echo 'selected'; } ?>>Empleado</option>
                        <option value="jefe" <?php if(isset($datos['cargo']) && $datos['cargo'] == 'jefe') {  echo 'selected'; } ?>>Jefe</option>

                    </select>

                    <p class="text-danger"><?= isset($errores['cargo']) ? $errores['cargo'] : '' ?></p>

                </div>

                <div class="form-group">

                    <label for="clave1">Clave</label>

                    <input type="password" class="form-control" name="clave1">

                    <p class="text-danger"><?= isset($errores['clave']) ? $errores['clave'] : '' ?></p>
                </div>

                <div class="form-group">

                    <label for="clave2">Repetir Clave</label>
                    <input type="password" class="form-control" name="clave2">

                </div>

                <br>

                <button class="btn btn-primary" type="submit">Enviar</button>


            </div>
        </div>
    </div>
</form>