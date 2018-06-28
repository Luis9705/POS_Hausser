<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/ventas.controlador.php";
require_once "controladores/tiendas.controlador.php";
require_once "controladores/uso.controlador.php";
require_once "controladores/unidad.controlador.php";
require_once "controladores/tamanio.controlador.php";
require_once "controladores/materia_prima.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "modelos/tiendas.modelo.php";
require_once "modelos/uso.modelo.php";
require_once "modelos/unidad.modelo.php";
require_once "modelos/tamanio.modelo.php";
require_once "modelos/materia_prima.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();