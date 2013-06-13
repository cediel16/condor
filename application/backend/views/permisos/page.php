<?php
$busqueda = $this->session->userdata('busqueda');
$buscar = array(
    'id' => 'buscar',
    'name' => 'buscar',
    'placeholder' => 'Buscar',
    'value' => $busqueda['buscar']
);
?>

<?php echo $this->session->flashdata('msj'); ?>
<div class="row-fluid form-search-pagination">
    <?php echo form_open() ?>
    <div class="pull-right">
        <?php echo form_input($buscar) ?>
    </div>
    <?php echo form_close() ?>
</div>
<table class="table table-condensed table-hover">
    <thead>
        <tr>
            <th class="span3">Permiso</th>
            <th class="span4">Descripción</th>
            <th class="span2"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pagination->result() as $row) { ?>
            <tr>
                <td>
                    <?php echo $row->permiso ?>
                </td>
                <td>
                    <?php echo $row->descripcion ?>
                </td>
                <td>
                    <span class="pull-right">      
                        <?php echo anchor('permisos/edit/' . $row->id, '<i class="icon-edit"></i>', 'title="Editar" class="btn btn-mini"') ?> 
                    </span>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php echo $this->pagination->create_links(); ?>