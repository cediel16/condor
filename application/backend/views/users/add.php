<?php
$nombre = array(
    'id' => 'nombre',
    'name' => 'nombre',
    'class' => 'span12'
);

$email = array(
    'id' => 'email',
    'name' => 'email',
    'class' => 'span12',
    'placeholder' => 'correo@ejemplo.com'
);

$pass1 = array(
    'id' => 'pass1',
    'name' => 'pass1',
    'class' => 'span12'
);

$pass2 = array(
    'id' => 'pass2',
    'name' => 'pass2',
    'class' => 'span12'
);
?>
<?php echo form_open() ?>
<div class="row-fluid">
    <div class="span6">
        <div class="form-horizontal">
            <div class="control-group">
                <label class="control-label">Nombre</label>
                <div class="controls">
                    <?php echo form_input($nombre) ?>
                    <?php echo form_error($nombre['name']) ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Correo electrónico</label>
                <div class="controls">
                    <?php echo form_input($email) ?>
                    <?php echo form_error($email['name']) ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Contraseña</label>
                <div class="controls">
                    <?php echo form_input($pass1) ?>
                    <?php echo form_error($pass1['name']) ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Confirmar contraseña</label>
                <div class="controls">
                    <?php echo form_input($pass2) ?>
                    <?php echo form_error($pass2['name']) ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Roles</label>
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox"> Remember me
                    </label>
                </div>
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox"> Remember me
                    </label>
                </div>
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox"> Remember me
                    </label>
                </div>
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox"> Remember me
                    </label>
                </div>
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox"> Remember me
                    </label>
                </div>
            </div>            
        </div>
    </div>
</div>
<div class="form-horizontal">
    <div class="form-actions">
        <input type="submit" class="btn btn-info" value="Aceptar" name="aceptar">
    </div>
</div>


<?php echo form_close() ?>