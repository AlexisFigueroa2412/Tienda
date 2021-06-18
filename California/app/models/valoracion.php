<?php

 class  Comentarios extends Validator{
    private $idValoracion = null;
    private $cliente = null;
    private $producto = null;
    private $comentario = null;
    private $calificacion = null;




     public function setIdValoracion($value)
     {
        if($this->validateNaturalNumber($value)){
            $this->idValoracion = $value;
            return true;
        }else{
            return false;
        }
     }

     public function setCalificacion($value)
     {
        if($this->validateNaturalNumber($value)){
            $this->calificacion = $value;
            return true;
        }else{
            return false;
        }
     }

     public function setComentario($value)
     {
        if ($value) {
            if ($this->validateString($value, 1, 250)) {
                $this->comentario = $value;
                return true;
            } else {
                return false;
            }
        } else {
            $this->comentario = null;
            return true;
        }
     }

     public function setProducto($value)
     {
         if($this->validateNaturalNumber($value))
         {
             $this->producto = $value;
             return true;
         }else{
             return false;
         }
     }

     public function getIdValoracio()
     {
         return $this->idValoracion;
     }
     public function getComentario()
     {
         return $this->comentario;
     }

     public function getProducto()
     {
         return $this->producto;
     }

      public function StartCommentary()
      {
          
          $sql='SELECT "id_cliente","tbDetalle_pedido"."id_producto"
          FROM "tbDetalle_pedido"
          INNER JOIN "tbPedidos" ON "tbPedidos"."id_pedido" = "tbDetalle_pedido"."id_pedido"         
          WHERE "id_producto" = ? AND "id_cliente" = ? ';
          $params= array($this->producto,$_SESSION['id_cliente']);
          if($data = Database::getRow($sql,$params)){
              return true;
          }else{
              return false;
          }
      }

     public function CreateRow()
     {   

         $sql='INSERT INTO "tbValoracion" ("id_cliente","id_producto","comentario","calificacion")
                Values (?,?,?,?)';
         $params = array($this->calificacion,$this->comentario,$this->producto,$_SESSION['id_cliente']);
         return Database::executeRow($sql,$params);       
                 
     }

     public function readOne()
  {
      $sql = 'SELECT "id_valoracion","comentario","calificacion"
              FROM "tbValoracion"  
              WHERE "id_valoracion" = ?';
      $params = array($this->idValoracion);
      return Database::getRow($sql,$params);
  }

  public function readComents()
  {
       $sql = 'SELECT "nombreCliente","comentarioProducto"
               FROM "tbValoracion"
               INNER JOIN "tbClientes" ON "tbValoracion"."id_cliente" = "tbClientes"."id_cliente" 
               WHERE "id_producto" = ? ';
       $params = array($this->producto);
       return Database::getRows($sql,$params);
  }

  public function readAll()
  {
      $sql= 'SELECT "id_valoracion","comentario","calificacion","nombre_producto"
      FROM "tbValoracion"
      INNER JOIN "tbClientes"  ON "tbValoracion"."id_cliente" = "tbClientes"."id_cliente"
      INNER JOIN "tbProductos"  ON "tbValoracion"."id_producto" = "tbProductos"."id_producto"';
      $params = null;        
      return Database::getRows($sql,$params);
             
  }
     public function deleteRow()
     {
         $sql = 'DELETE FROM "tbValoracion" WHERE "id_valoracion" = ?';
         $params = array($this->idValoracion);
         return Database::executeRow($sql,$params);
     }

     public function searchRows($value)
     {
         $sql = 'SELECT "id_valoracion","nombre_cliente","comentario","calificacion","nombre_producto"
                FROM "tbValoracion"
                INNER JOIN "tbClientes"  ON "tbValoracion"."id_cliente" = "tbClientes"."id_cliente"
                INNER JOIN "tbProductos"  ON "tbValoracion"."id_producto" = "tbProductos"."id_producto"
                WHERE "nombre_cliente" ILIKE ? OR "comentario" ILIKE ? OR "nombre_producto" ILIKE ?';
         $params=array("%$value%","%$value%","%$value%");
         return Database::getRows($sql,$params);
     }


 }