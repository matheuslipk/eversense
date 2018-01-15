<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/dao/ConexaoBD.php';

class NoDao {
  
   private $tabela = "no";
    
   public function inserirNo($no){            
      $query = "INSERT INTO $this->tabela VALUES (NULL,?,?,?,?,?)";
      $con = ConexaoBD::getConexao();
      $stmt = $con->prepare($query);
      $stmt->bind_param("isssi", $no['id_usuario'], $no['ip'], $no['nome'], $no['descricao']
            , $no['id_ambiente']);
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
   
   public function getNoByUsuario($no){
      $query = "SELECT * FROM viewNo WHERE id_usuario=?";

      $con = ConexaoBD::getConexao();
      $stmt = $con->prepare($query);
      $stmt->prepare($query);
      $stmt->bind_param('i', $no['id_usuario']);
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
   
   public function getNoByAmbiente($no){
      $query = "SELECT * FROM viewNo WHERE id_ambiente=?";

      $con = ConexaoBD::getConexao();
      $stmt = $con->prepare($query);
      $stmt->prepare($query);
      $stmt->bind_param('i', $no['id_ambiente']);
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
