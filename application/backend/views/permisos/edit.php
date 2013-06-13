<?php
$rol_id = array(
    'rol_id' => $data['id']
);

$rol = array(
    'id' => 'rol',
    'name' => 'rol',
    'class' => 'span12',
    'value' => ($this->input->post('rol') == '') ? $data['rol'] : $this->input->post('rol')
);
?>
<?php echo $this->session->flashdata('msj'); ?>
<?php echo form_open() ?>
<?php echo form_hidden($rol_id) ?>

<div class="row-fluid">
    <div class="span6">
        <div class="form-horizontal">
            <div class="control-group">
                <label class="control-label">Rol</label>
                <div class="controls">
                    <?php echo form_input($rol) ?>
                    <?php echo form_error($rol['name']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-horizontal">
    <div class="form-actions">
        <?php echo form_submit('', 'Aceptar', 'class="btn btn-info"') ?>
        <?php echo anchor('roles/page', 'Cancelar', 'class="btn"') ?>
    </div>
</div>

<?php echo form_close() ?>