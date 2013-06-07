<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?php echo link_tag('assets/css/boostrap.css') ?>
        <?php echo link_tag('assets/css/boostrap-responsive.css') ?>
        <?php echo link_tag('assets/css/style.css') ?>
        <title>Condor Admin</title>
    </head>
    <body>
        <header>
            <div class="banner">
                <ul>
                    <li>Control de documentos</li>
                    <li>
                        <div class="btn-group">
                            <a class="btn btn-mini" href="">as</a>
                            <a href="" class="btn btn-mini"><i class="icon-off"></i></a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="navbar navbar-inverse navbar-static-top">
                <div class="navbar-inner">
                    <div class="container-fluid">
                        <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="nav-collapse collapse">
                            <ul class="nav">
                                <li><a href="<?php echo site_url() ?>/documentos">Documentos</a></li>
                                <?php //if (sesiones::is_has_permission('unidades.acceso') || sesiones::is_has_permission('cargos.acceso') || sesiones::is_has_permission('rutas.acceso') || sesiones::is_has_permission('estaciones.acceso')) { ?>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Definiciones <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <?php //if (sesiones::is_has_permission('unidades.acceso')) { ?>
                                        <li><a href="<?php echo site_url() ?>/unidades">Unidades</a></li>
                                        <?php //} ?>
                                        <?php //if (sesiones::is_has_permission('cargos.acceso')) { ?>
                                        <li><a href="<?php echo site_url() ?>/cargos">Cargos</a></li>
                                        <?php //} ?>
                                        <?php //if (sesiones::is_has_permission('rutas.acceso')) { ?>
                                        <li><a href="<?php echo site_url() ?>/rutas">Rutas de documentos</a></li>
                                        <?php //} ?>
                                        <?php //if (sesiones::is_has_permission('estaciones.acceso')) { ?>
                                        <li><a href="<?php echo site_url() ?>/estaciones">Estaciones</a></li>
                                        <?php //} ?>
                                    </ul>
                                </li>
                                <?php //} ?>
                            </ul>
                            <ul class="nav pull-right">
                                <?php //if (sesiones::is_has_permission('usuarios.acceso') || sesiones::is_has_permission('roles.acceso') || sesiones::is_has_permission('permisos.acceso')) { ?>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Administración de acceso<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <?php //if (sesiones::is_has_permission('usuarios.acceso')) { ?>
                                        <li><?php echo anchor('users', 'Usuarios') ?></li>
                                        <?php //} ?>
                                        <?php //if (sesiones::is_has_permission('roles.acceso')) { ?>
                                        <li><a href="<?php echo site_url() ?>/roles">Roles</a></li>
                                        <?php //} ?>
                                        <?php //if (sesiones::is_has_permission('permisos.acceso')) { ?>
                                        <li><a href="<?php echo site_url() ?>/permisos">Permisos</a></li>
                                        <?php //} ?>
                                    </ul>
                                </li>
                                <?php //} ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section class="container-fluid content-main">
            <div class="content-header">
                <ul>
                    <li class="content-title"><?php echo $title ?></li>
                    <li class="content-options"><?php echo $options ?></li>
                </ul>
            </div>
            <div class="content-body">
                <?php echo $content ?>
            </div>
        </section>
        <?php echo script_tag('assets/js/jquery.js') ?>
        <?php echo script_tag('assets/js/bootstrap.js') ?>
    </body>
</html>