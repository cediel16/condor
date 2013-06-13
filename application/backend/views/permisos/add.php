<?php
$permiso = array(
    'id' => 'permiso',
    'name' => 'permiso',
    'class' => 'span12',
    'value' => $this->input->post('permiso')
);

$descripcion = array(
    'id' => 'descripcion',
    'name' => 'descripcion',
    'class' => 'span12',
    'value' => $this->input->post('descripcion'),
    'rows'=>4
);
?>
<?php echo $this->session->flashdata('msj'); ?>
<?php echo form_open() ?>
<div class="row-fluid">
    <div class="span6">
        <div class="form-horizontal">
            <div class="control-group">
                <label class="control-label">Permiso</label>
                <div class="controls">
                    <?php echo form_input($permiso) ?>
                    <?php echo form_error($permiso['name']) ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Descripción</label>
                <div class="controls">
                    <?php echo form_textarea($descripcion) ?>
                    <?php echo form_error($descripcion['name']) ?>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="form-horizontal">
    <div class="form-actions">
        <?php echo form_submit('', 'Aceptar', 'class="btn btn-info"') ?>
        <?php echo anchor('permisos', 'Cancelar', 'class="btn"') ?>
    </div>
</div>


<?php echo form_close() ?>