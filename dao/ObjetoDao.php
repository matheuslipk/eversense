<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/dao/ConexaoBD.php';

class ObjetoDao {
  
   private $tabela = "objeto";
    
   public function inserirObjeto($objeto){            
      $query = "INSERT INTO $this->tabela VALUES (NULL,?,?,?)";
      $con = ConexaoBD::getConexao();
      $stmt = $con->prepare($query);
      $stmt->bind_param("iss", $objeto['id_ambiente'], $objeto['nome'], $objeto['descricao']);
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
   
   public function getObjetos(){
      $query = "SELECT * FROM $this->tabela";

      $con = ConexaoBD::getConexao();
      $stmt = $con->prepare($query);
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
   
   public function getObjetosByAmbiente($objeto){
      $query = "SELECT * FROM $this->tabela WHERE id_ambiente=?";

      $con = ConexaoBD::getConexao();
      $stmt = $con->prepare($query);
      $stmt->bind_param("i", $objeto['id_ambiente']);
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
