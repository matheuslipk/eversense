<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root."/dao/UsuarioDao.php";

function logicaInserirUsuario(){
   $usuarioDao = new UsuarioDao();
   $usuario['nome'] = $_GET['nome'];
   $usuario['email'] = $_GET['email'];
   $usuario['senha'] = $_GET['senha'];
   $resultado = $usuarioDao->inserirUsuario($usuario);
   echo $resultado;
}

logicaInserirUsuario();