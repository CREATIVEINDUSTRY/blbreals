<?php


require ('admin/models/Model.php');
require ('admin/models/ProyectosModel.php');
require ('admin/views/ProyectosDescription.php');


$proyecto = new ProyectosView();

 


   $proyecto->get($_GET['proyecto_id']);


