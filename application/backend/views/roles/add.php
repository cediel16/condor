<?php
$rol = array(
    'id' => 'rol',
    'name' => 'rol',
    'class' => 'span12',
    'value' => $this->input->post('rol')
);
?>
<?php echo $this->session->flashdata('msj'); ?>
<?php echo form_open() ?>
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
        <?php echo anchor('roles', 'Cancelar', 'class="btn"') ?>
    </div>
</div>


<?php echo form_close() ?>