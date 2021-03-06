<?php
session_start();
require_once('header.php');

if (isset($_SESSION['userLogged'])) {
    require_once('nav.php');
}
?>

<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <?php if ($value == 0) { ?>
                <h2 class="mb-4">Registrar Nuevo Estudiante</h2>
            <?php } ?>
            <?php if ($value == 1) { ?>
                <h2 class="mb-4">Registrar Nueva Empresa</h2>
            <?php } ?>
            <?php if ($value == 2) { ?>
                <h2 class="mb-4">Registrar Nuevo Usuario</h2>
            <?php } ?>
            <?php
            if ($alert) { ?>
                <div class="alert alert-<?php echo $alert->getType() ?> text-center fwbold" role="alert"><?php echo $alert->getMessage() ?></div>
            <?php } ?>
            <form action="<?php echo FRONT_ROOT ?>User/Add" method="POST" class="bg-light-alpha p-5">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" value="" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Contraseña</label>
                            <input type="password" name="password" value="" class="form-control" required>
                        </div>
                    </div>
                </div>
                <?php if (isset($_SESSION['userLogged'])) { ?>
                    <button type="submit" name="value" class="btn btn-dark ml-auto d-block" value='0'>Agregar estudiante</button>
                    <br>
                    <button type="submit" name="value" class="btn btn-dark ml-auto d-block" value='1'>Agregar compañia</button>
                <?php
                } else { ?>
                    <?php if ($value == 0) { ?>
                        <button type="submit" name="value" class="btn btn-dark ml-auto d-block" value='0'>Continuar</button>
                        <a href="<?php echo FRONT_ROOT ?>Home">Volver a iniciar sesion</a>
                    <?php } ?>
                    <?php if ($value == 1) { ?>
                        <button type="submit" name="value" class="btn btn-dark ml-auto d-block" value='1'>Continuar</button>
                        <a href="<?php echo FRONT_ROOT ?>Home">Volver a iniciar sesion</a>
                    <?php } ?>
                <?php } ?>
            </form>
        </div>
    </section>
</main>