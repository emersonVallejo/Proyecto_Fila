<?php
class SQL extends mysqli
{
   static $server= "emerson-pc";
   static $user = "fila";
   static $password = "fila";
   static $bd = "fila_proyecto";

   public function conectar()
   {            
       $conn = mysqli_connect(self::$server, self::$user,self::$password, self::$bd);
       
       if (!$conn) 
       {
           return HTML::mensaje("Fallo al contenctar a MySQL: (".mysqli_connect_errno().") ".mysqli_connect_error());
       }
       
       return $conn;
   }

   public function desconectar($conn)
   {            
       mysqli_close($conn);
   }
 
 
   public function ejecutarQuery($consulta)
   {         
       $conn = SQL::conectar();  
       $retorno = mysqli_query($conn, $consulta);      
       SQL::desconectar($conn);  
       if (!$retorno)  
       {
           return HTML::mensaje("Error al utilizar la funcion ejecutarQuery con la consulta ".$consulta);           
       }
       return $retorno;         
   }
   
   public static function filasEnArreglo($consulta)
   {       
       $filas = array();
       $resultado = self::ejecutarQuery($consulta); 
       while ($fila = mysqli_fetch_array($resultado, MYSQLI_NUM))
       {
           $filas[] = $fila;
       }
       return $filas;
   }
   public static function filasEnArreglo1($consulta)
   {       
       $filas = array();
       $resultado = self::ejecutarQuery($consulta); 
       while ($fila = mysqli_fetch_assoc($resultado))
       {
           $filas[] = $fila;
       }
       return $filas;
   }
   
   public function tablasEnArreglo($conn, $consulta)
   {
       $resultado = self::ejecutarQuery($conn, $consulta);           
       $tablas[] = mysqli_fetch_all($resultado, MYSQLI_NUM);
       return $tablas;
   }
   
   public static function seleccionar($campos, $tablas, $condicion="", $grupo="", $orden="", $limit="") 
   {
       $query = "SELECT ";
       
       if (!empty($campos))
       {
           $query .= $campos;
       }
       else
       {
           return HTML::mensaje("Error al utilizar la funcion seleccionar: no envio campos");
       }
       
       if (!empty($tablas))
       {
           $query .= " FROM ".$tablas;
       }
       else
       {
           return HTML::mensaje("Error al utilizar la funcion seleccionar: no envio tablas");
       }
       
       if (!empty($condicion))
       {
           $query .= " WHERE ".$condicion;
       }
                  
       if (!empty($grupo))
       {
           $query .= " GROUP BY ".$grupo;
       }      
       
       if (!empty($orden))
       {
           $query .= " ORDER BY ".$orden;
       }

       if (!empty($limit))
       {
           $query .= " LIMIT ".$limit;
       }

       return $query;
   }
   
   public function insertar($tabla, $campos, $valores, $condicion) 
   {
       $query = "INSERT INTO ";
       
       if (!empty($tabla))
       {
           $query .= $tablas;
       }
       else
       {
           return HTML::mensaje("Error al utilizar la funcion insertar: no envio tabla");
       }
       
       if (!empty($campos))
       {
           $query .= " (".$campos.")";
       }
       else
       {
           return HTML::mensaje("Error al utilizar la funcion insertar: no envio campos");
       }
       
       if (!empty($valores))
       {
           $query .= " VALUES(".$valores.")";
       }
       else
       {
           return HTML::mensaje("Error al utilizar la funcion insertar: no envio valores");
       }
       
       if (!empty($condicion))
       {
           $query .= " WHERE ".$condicion;
       }
       
       return $query;           
   }
   
   public function actualizar($tabla, $arreglo = array(""), $codicion="")
   {
       $query = "UPDATE ";
       
       if (!empty($tabla))
       {
           $query .= $tabla;
       }
       else
       {
           return HTML::mensaje("Error al utilizar la funcion actualizar: no envio tabla");
       }
       
       $query .= " SET";
       
       if (!empty($arreglo)) 
       {
           $datos = "";
           foreach ($arreglo as $campo => $valor) {
               $datos .= $campo." = '".$valor."', ";
           }
       } 
       else
       {
           return HTML::mensaje("Error al utilizar la funcion actualizar: no envio arreglo");
       }
       
       $query .= " ". substr ($datos, 0, strlen($datos) - 2);
       
       if (!empty($codicion))
       {
           $query .= $codicion;
       }

       return $query;           
   }    
}
?>