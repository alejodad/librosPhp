<?php

require '../modelo/CategoriaModelo.php';
require '../cad/conexion.php';
require '../cad/CategoriaCad.php';

$uno = new CategoriaModelo();

$uno->setNombreCategoria($_POST['nombre']);

print_r($_POST);


session_start();
if (CategoriaCad::registrarObjeto($uno)) {
	$_SESSION['msj'] = "se hizo";
}else{
	$_SESSION['msj'] = "no se hizo";
}

if(isset($_POST["accion"])){
    
   $co=@$_POST["codigo"]; 
   $nom=@$_POST["nombre"];
   require_once 'cad/CategoriaCad.php';
   if($_POST["accion"]=="Registrar"){
        if(CategoriaCad::registrar($nom)){
            $me= "Registrada";
        }else {
            $me= "No registrada";
        }
   }else if($_POST["accion"]=="Eliminar"){
        if(CategoriaCad::eliminar($co)){
            $me= "Eliminada";
        }else {
            $me= "No eliminada";
        }
   }
}

header("location:../index.php ");