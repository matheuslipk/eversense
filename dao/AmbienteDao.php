<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/dao/ConexaoBD.php';

class AmbienteDao {
  
   private $tabela = "ambiente";
    
   public function atualizarAmbiente($ambiente){            
      $query = "UPDATE $this->tabela SET nome=?, descricao=? WHERE id=? AND id_usuario=?";
      $con = ConexaoBD::getConexao();
      $stmt = $con->prepare($query);
      $stmt->bind_param("ssii", $ambiente['nome'], $ambiente['descricao'], 
              $ambiente['id'], $ambiente['id_usuario']);
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
   
   public function inserirAmbiente($ambiente){            
      $query = "INSERT INTO $this->tabela VALUES (NULL,?,?,?)";
      $con = ConexaoBD::getConexao();
      $stmt = $con->prepare($query);
      $stmt->bind_param("iss", $ambiente['id_usuario'], $ambiente['nome'], $ambiente['descricao']);
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
   
   public function getAmbienteByUsuario($usuario){
      $query = "SELECT * FROM $this->tabela WHERE id_usuario=?";

      $con = ConexaoBD::getConexao();
      $stmt = $con->prepare($query);
      $stmt->prepare($query);
      $stmt->bind_param('i', $usuario['id_usuario']);
      if($stmt->execute()){
         $result = $stmt->get_result();
         $array = $result->fetch_all(MYSQLI_ASSOC);
                     
         $stmt->close();
         $con->close();
         return $array;
      }
      $stmt->close();        
      $con->close();
      return NULL;    
   }
      
}
