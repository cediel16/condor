<!--
<pre>
<?php print_r($this->input->post()) ?>
</pre>
-->
<?php echo ($this->session->flashdata('msj')!='') ? $this->session->flashdata('msj') : $msj; ?>

<?php echo form_open() ?>
<table class="table table-condensed table-hover">
    <thead>
        <tr>
            <th class="span4">Permiso</th>
            <th class="">Descripción</th>
            <th class="span1"></th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($permisos->result() as $row) { ?>
            <tr>
                <td><?php echo $row->permiso ?></td>
                <td><?php echo $row->descripcion ?></td>
                <td>
                    <span class="pull-right">
                        <?php echo form_checkbox(array('id' => 'permiso'.$i, 'name' => 'permiso'.$i, 'value' => $row->id, 'checked' => $row->checked)) ?>
                    </span>
                </td>
            </tr>
            <?php $i++; ?>
        <?php } ?>
    </tbody>
</table>
<div class="form-horizontal">
    <div class="form-actions">
        <?php echo form_submit('', 'Aceptar', 'class="btn btn-info"') ?>
        <?php echo anchor('roles', 'Cancelar', 'class="btn"') ?>
    </div>
</div>
<?php echo form_close() ?>