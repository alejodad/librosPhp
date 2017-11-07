<?php

//require '../modelo/CategoriaModelo.php';
class CategoriaCad {
    
    
    public static function registrarObjeto(CategoriaModelo $una) {
        require_once 'conexion.php';
        
        $query = "insert into tbl_categoria values (NULL,'".$una->getNombreCategoria()."')";
        
        return conexion::conectar()->query($query);  
    }
    
    public static function registrar($categoria) {
        require_once 'conexion.php';
        $query = "insert into tbl_categoria values (NULL,'$categoria')";
        return conexion::conectar()->query($query);         
    }
    
    public static function eliminar($cod) {
        $query="delete from tbl_categoria where idCategoria ='$cod'";
        require_once 'conexion.php';
        return conexion::conectar()->query($query);
    }
    
    public static  function modificar($cod,$name) {        
        $query="update  tbl_categoria  set nombre='$name' where codigo =$cod";
        require_once 'conexion.php';
        return conexion::conectar()->query($query);
    }
    
    public static function listarCategorias() {
        $datos;
        $query="select * from tbl_categoria";
        require_once 'conexion.php';
        $resultado = conexion::conectar()->query($query);
        while ( $fila = mysqli_fetch_object($resultado)) {
        $datos[] = $fila;
    } 
        return $datos;
    }
    
    public static function bucarUnaCategoria($param) {
        $query = "select * from tbl_categoria where codigo = '$param'";
        require_once 'conexion.php';
        $resultado = conexion::conectar()->query($query);
        $datos=null;
//    while ( $fila = mysqli_fetch_object($resultado)) {
//        $datos[] = $fila;
//    }

    return $resultado;
    }
}
