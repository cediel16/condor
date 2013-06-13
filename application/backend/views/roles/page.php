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
            <th class="span4">Rol</th>
            <th class="span2"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pagination->result() as $row) { ?>
            <tr>
                <td>
                    <?php echo $row->rol ?>
                </td>
                <td></td>
                <td>
                    <span class="pull-right">                        
                        <div class="btn-group">
                            <button data-toggle="dropdown" class="btn btn-mini dropdown-toggle"><i class="icon-cog"></i></button>
                            <ul class="dropdown-menu pull-right">
                                <li><?php echo anchor('roles/edit/' . $row->id, '<i class="icon-edit"></i> Editar', 'title="Editar el nombre del rol"') ?></li>
                                <li><?php echo anchor('roles/permisos/' . $row->id, '<i class="icon-check"></i> Permisos', 'title="Asignación de permisos"') ?></li>
                            </ul>
                        </div>
                    </span>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php echo $this->pagination->create_links(); ?>