<?= $this->layout('layout') ?>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
    <div class="container">
        <div class="row">
            <div class="col-6">

                <div class="form-group">

                    <label for="busqueda"><h2>Método de inicio:</h2></label>

                    <select class="form-control" id="seleccion" name="parametro">

                        <option value="mail">Email</option>
                        <option value="nickname">Nickname</option>

                    </select>

                </div>

                <div class="form-group">

                    <h1>Login</h1>
                    <label for="email"></label>
                    <input type="text" class="form-control" name="user" placeholder="Introduce tu usuario">
                    <p class="text-danger"><?= isset($errorUser) ? $errorUser : '' ?></p>
                </div>
                <div class="form-group">

                    <label for="clave"></label>

                    <input type="password" class="form-control" name="clave" placeholder="Contraseña">
                    <p class="text-danger"><?= isset($errorPass) ? $errorPass : '' ?></p>

                </div>

                <button class="btn btn-primary" type="submit">Enviar</button>


            </div>
        </div>
    </div>
</form>
