<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/dao/ConexaoBD.php';

class UsuarioDao {
   
   public function inserirUsuario($usuario){            
      $query = "INSERT INTO usuario VALUES (NULL,?,?,?)";
      $con = ConexaoBD::getConexao();
      $stmt = $con->prepare($query);
      $stmt->bind_param("sss", $usuario['nome'], $usuario['email'], $usuario['senha']);
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         return true;
      }
      $erro = $stmt->error;
      $stmt->close();
      $con->close();
      return $erro;
   }
   
   public function getUsuarioByEmailSenha($usuario){
      $query = "SELECT * FROM usuario WHERE email = ? AND senha = ?";

      $con = ConexaoBD::getConexao();
      $stmt = $con->prepare($query);
      $stmt->prepare($query);
      $stmt->bind_param('ss', $usuario['email'], $usuario['senha']);
      if($stmt->execute()){
         $result = $stmt->get_result();
         $array = $result->fetch_assoc();
                     
         $stmt->close();
         $con->close();
         return $array;
      }
      $stmt->close();        
      $con->close();
      return NULL;    
   }
      
}
