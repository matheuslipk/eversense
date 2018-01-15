<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/dao/AmbienteDao.php';

function getAmbienteByUsuario(){
   $ambiente = new AmbienteDao();
   $usuario['id_usuario'] = $_GET['id_usuario'];
   $resultado = $ambiente->getAmbienteByUsuario($usuario);
   echo json_encode($resultado);
}

getAmbienteByUsuario();