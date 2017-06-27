<?php


require ('admin/models/Model.php');
require ('admin/models/ProyectosModel.php');
require ('admin/views/ProyectosTipo.php');


$proyecto = new ProyectosView();

 


   $proyecto->get_tipo();


