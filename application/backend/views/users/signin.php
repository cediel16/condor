<?php
$email = array(
    'id' => 'email',
    'name' => 'email',
    'placeholder' => 'Correo electrónico',
    'class' => 'input-block-level'
);

$pass = array(
    'id' => 'pass',
    'name' => 'pass',
    'placeholder' => 'Contraseña',
    'class' => 'input-block-level'
);

$submit = array(
    'id' => 'submit',
    'name' => 'submit',
    'value' => 'Entrar',
    'extra' => 'class="btn btn-info"'
);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?php echo link_tag('assets/css/boostrap.css') ?>
        <?php echo link_tag('assets/css/boostrap-responsive.css') ?>
        <title>Iniciar sesión</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span4 offset2">
                    asd
                </div>
                <div class="span4">
                    <?php echo form_open() ?>
                    <h2 class="form-signin-heading">Iniciar sesión</h2>
                    <?php echo form_input($email) ?>
                    <?php echo form_input($pass) ?>
                    <?php echo (form_error($email['name']) == '') ? form_error($pass['name']) : form_error($email['name']) ?>
                    <?php echo form_submit($submit['name'], $submit['value'], $submit['extra']) ?>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div> <!-- /container -->
    </body>
</html>
