<?php


require ('admin/models/Model.php');
require ('admin/models/ProyectosModel.php');
require ('admin/views/ProyectosHome.php');


$proyecto = new ProyectosView();


    $proyecto ->get_state(1);

