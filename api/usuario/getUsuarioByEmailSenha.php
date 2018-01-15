<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/dao/UsuarioDao.php';

function getUsuarioByEmailSenha(){
   $usuarioDao = new UsuarioDao();
   $usuario['email'] = $_GET['email'];
   $usuario['senha'] = $_GET['senha'];
   $resultado = $usuarioDao->getUsuarioByEmailSenha($usuario);
   echo json_encode($resultado);
}

getUsuarioByEmailSenha();