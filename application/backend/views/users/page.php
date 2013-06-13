<?php
$busqueda = $this->session->userdata('busqueda');
$buscar = array(
    'id' => 'buscar',
    'name' => 'buscar',
    'placeholder' => 'Buscar',
    'value' => $busqueda['buscar']
);
?>

<div class="row-fluid form-search-pagination">
    <?php echo form_open() ?>
    <div class="pull-right">
        <?php echo form_input($buscar) ?>
    </div>
    <?php echo form_close() ?>
</div>
</form>
<table class="table table-condensed table-hover">
    <thead>
        <tr>
            <th class="span4">Nombre</th>
            <th class="span4">Correo electrónico</th>
            <th>Roles</th>
            <th class="span2">Status</th>
            <th class="span2"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pagination->result() as $row) { ?>
            <tr>
                <td>
                    <?php echo $row->nombre ?>
                </td>
                <td>
                    <?php echo $row->email ?>
                </td>
                <td></td>
                <td>Activo</td>
                <td>
                    <span class="pull-right">
                        <?php echo anchor('users/view/' . $row->id, '<i class="icon-eye-open"></i>','class="btn btn-mini" title="Ver usuario"') ?>
                        <div class="btn-group">
                            <button data-toggle="dropdown" class="btn dropdown-toggle btn-mini">
                                <i class="icon-cog"></i>
                            </button>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <?php echo anchor('users/edit/' . $row->id, '<i class="icon-edit"></i> Editar') ?>
                                </li>
                            </ul>
                        </div>
                    </span>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php echo $this->pagination->create_links(); ?>