<?php
$user_id = array(
    'user_id' => $user['id']
);

$nombre = array(
    'id' => 'nombre',
    'name' => 'nombre',
    'class' => 'span12',
    'value' => ($this->input->post('nombre') == '') ? $user['nombre'] : $this->input->post('nombre'),
    'readonly' => ''
);

$email = array(
    'id' => 'email',
    'name' => 'email',
    'class' => 'span12',
    'placeholder' => 'correo@ejemplo.com',
    'value' => ($this->input->post('email') == '') ? $user['email'] : $this->input->post('email'),
    'readonly' => ''
);

$rol = array(
    'id' => 'rol[]',
    'name' => 'rol[]',
    'options' => $opt_roles,
    'selected' => $user['roles'],
    'extra' => 'class="span12" disabled',
);
?>
<?php echo $this->session->flashdata('msj'); ?>
<?php echo form_hidden($user_id) ?>

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
        <?php echo anchor('users/edit/' . $user['id'], 'Editar', 'class="btn btn-info"') ?>
        <?php echo anchor('users', 'Volver', 'class="btn"') ?>
    </div>
</div>