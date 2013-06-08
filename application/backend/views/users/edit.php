<?php
$nombre = array(
    'id' => 'nombre',
    'name' => 'nombre',
    'class' => 'span12',
    'value' => $this->input->post('nombre')
);

$email = array(
    'id' => 'email',
    'name' => 'email',
    'class' => 'span12',
    'placeholder' => 'correo@ejemplo.com',
    'value' => $this->input->post('email')
);

$rol = array(
    'id' => 'rol[]',
    'name' => 'rol[]',
    'options' => $opt_roles,
    'selected' => '',
    'extra' => 'class="span12"'
);
?>
<?php echo $this->session->flashdata('msj'); ?>
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
                <label class="control-label">Rol</label>
                <div class="controls">
                    <?php echo form_multiselect($rol['name'], $rol['options'], $rol['selected'], $rol['extra']) ?>
                    <?php echo form_error($rol['name']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-horizontal">
    <div class="form-actions">
        <?php echo form_submit('', 'Aceptar', 'class="btn btn-info"') ?>
        <?php echo anchor('users', 'Cancelar', 'class="btn"') ?>
    </div>
</div>


<?php echo form_close() ?>