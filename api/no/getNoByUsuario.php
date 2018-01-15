<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/dao/NoDao.php';

function getNoByUsuario(){
   $no = new NODao();
   $usuario['id_usuario'] = $_GET['id_usuario'];
   $resultado = $no->getNoByUsuario($usuario);
   echo json_encode($resultado);
}

getNoByUsuario();